<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use App\Http\Requests\StoreDisposisiRequest;
use App\Http\Requests\UpdateDisposisiRequest;
use App\Models\DisposisiPenerima;
use App\Models\Jabatan;
use App\Models\SuratMasuk;
use Illuminate\Support\Facades\DB;
use Throwable;

class DisposisiController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $title = 'Disposisi';
    $disposisi = Disposisi::paginate(10, ['*'], 'disposisi_page')
      ->withQueryString();

    $suratMasuk = SuratMasuk::paginate(5, ['*'], 'suratmasuk_page')
      ->withQueryString();

    return view('disposisi.index', compact('title', 'disposisi', 'suratMasuk'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
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

    $suratMasuk = SuratMasuk::get();
    $jabatan = Jabatan::pluck('nama', 'id');

    return view('disposisi.create', compact('title', 'suratMasuk', 'jabatan', 'instruksiList'));
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
        'instruksi_disposisi' => json_encode($request->instruksi_disposisi)
      ]);

      foreach ($request->kepada_jabatan_id as $jabatanId) {
        DisposisiPenerima::create([
          'disposisi_id' => $disposisi->id,
          'kepada_jabatan_id' => $jabatanId,
          'status' => 'Terkirim'
        ]);
      }

      DB::commit();
      return redirect()->route('disposisi.index')
        ->with('success', 'Disposisi Berhasil dibuat !');
    } catch (Throwable $e) {
      DB::rollBack();
      return redirect()->back()->with('error', 'Terjadi kesalahan !');
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(Disposisi $disposisi)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Disposisi $disposisi)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateDisposisiRequest $request, Disposisi $disposisi)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Disposisi $disposisi)
  {
    //
  }
}
