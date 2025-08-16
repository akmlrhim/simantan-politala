<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Jabatan;
use App\Models\Disposisi;
use App\Models\SuratMasuk;
use App\Models\DisposisiPenerima;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreDisposisiRequest;
use App\Http\Requests\UpdateDisposisiRequest;

class DisposisiController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $title = 'Disposisi';
    $suratMasuk = SuratMasuk::with('disposisi')->paginate(10);

    return view('disposisi.index', compact('title', 'suratMasuk'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create($id)
  {
    $title = 'Tambah Disposisi';

    $instruksiList = [
      "Untuk diagendakan",
      "Untuk diketahui",
      "Mohon dapat mendampingi",
      "Mohon dipelajari",
      "Mohon menyiapkan bahan",
      "Mohon disiapkan konsep jawaban",
      "Mohon dapat mewakili",
      "Mohon saran / pertimbangan",
      "Mohon menugaskan perwakilan",
      "Silahkan diputuskan",
      "Tidak bisa hadir / izin",
      "Disetujui",
      "Mohon ditindaklanjuti sesuai ketentuan",
      "Diarsipkan",
      "Mohon dikoordinasikan"
    ];

    $suratMasuk = SuratMasuk::findOrFail($id);
    $jabatan = Jabatan::pluck('nama', 'id');

    return view('disposisi.create', compact(
      'title',
      'suratMasuk',
      'jabatan',
      'instruksiList',
    ));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreDisposisiRequest $request)
  {
    DB::beginTransaction();

    try {
      $disposisi = Disposisi::create([
        'surat_masuk_id' => $request->surat_masuk_id,
        'nomor_agenda' => $request->nomor_agenda,
        'tingkat_surat' => $request->tingkat_surat,
        'instruksi_disposisi' => $request->instruksi_disposisi,
        'catatan' => $request->catatan,
        'created_by' => Auth::user()->id
      ]);

      foreach ($request->kepada_jabatan_id as $jabatanId) {
        DisposisiPenerima::create([
          'disposisi_id' => $disposisi->id,
          'kepada_jabatan_id' => $jabatanId,
          'status' => 'Terkirim'
        ]);
      }

      DB::commit();
      return redirect()->route('disposisi.index')->with('success', 'Disposisi Berhasil dibuat.');
    } catch (Throwable $e) {
      DB::rollBack();
      return redirect()->back()->with('error', 'Terjadi kesalahan.');
    }
  }

  /**
   * Display the specified resource.
   */
  public function detail($id)
  {
    $title = 'Detail Disposisi';
    $disposisi = Disposisi::findOrFail($id);

    return view('disposisi.detail', compact('title', 'disposisi'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit($id)
  {
    $title = 'Edit Disposisi';
    $instruksiList = [
      "Untuk diagendakan",
      "Untuk diketahui",
      "Mohon dapat mendampingi",
      "Mohon dipelajari",
      "Mohon menyiapkan bahan",
      "Mohon disiapkan konsep jawaban",
      "Mohon dapat mewakili",
      "Mohon saran / pertimbangan",
      "Mohon menugaskan perwakilan",
      "Silahkan diputuskan",
      "Tidak bisa hadir / izin",
      "Disetujui",
      "Mohon ditindaklanjuti sesuai ketentuan",
      "Diarsipkan",
      "Mohon dikoordinasikan"
    ];

    $disposisi = Disposisi::findOrFail($id);
    $jabatan = Jabatan::pluck('nama', 'id');

    return view('disposisi.edit', compact(
      'title',
      'disposisi',
      'jabatan',
      'instruksiList'
    ));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateDisposisiRequest $request, Disposisi $disposisi)
  {
    DB::beginTransaction();

    try {
      $disposisi->update([
        'nomor_agenda' => $request->nomor_agenda,
        'tingkat_surat' => $request->tingkat_surat,
        'instruksi_disposisi' => $request->instruksi_disposisi,
        'catatan' => $request->catatan
      ]);

      $existJabatan = $disposisi->disposisiPenerima()
        ->pluck('kepada_jabatan_id')
        ->toArray();

      $newJabatan = array_diff($request->kepada_jabatan_id, $existJabatan);

      foreach ($newJabatan as $jabatanId) {
        DisposisiPenerima::create([
          'disposisi_id' => $disposisi->id,
          'kepada_jabatan_id' => $jabatanId,
          'status' => 'Terkirim'
        ]);
      }

      DB::commit();
      return redirect()
        ->route('disposisi.index')
        ->with('success', 'Disposisi berhasil diperbarui.');
    } catch (Throwable $e) {
      DB::rollback();
      return redirect()
        ->back()
        ->withInput()
        ->with('error', 'Terjadi kesalahan saat memperbarui disposisi.');
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Disposisi $disposisi)
  {
    //
  }
}
