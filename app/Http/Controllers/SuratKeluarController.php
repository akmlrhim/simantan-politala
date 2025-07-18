<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use App\Http\Requests\StoreSuratKeluarRequest;
use App\Http\Requests\UpdateSuratKeluarRequest;
use Barryvdh\DomPDF\Facade\Pdf as Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuratKeluarController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$title = 'Surat Keluar';
		$suratKeluar = DB::table('surat_keluar')->paginate(10);

		return view('surat_keluar.index', compact('title', 'suratKeluar'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$data['title'] = 'Tambah Surat Keluar';
		return view('surat_keluar.create', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StoreSuratKeluarRequest $request)
	{
		DB::beginTransaction();

		try {
			SuratKeluar::create([
				'nomor_surat' => $request->nomor_surat,
				'hal' => $request->hal,
				'tanggal_surat' => $request->tanggal_surat,
				'isi_surat' => $request->isi_surat,
				'created_by' => Auth::user()->id,
			]);

			DB::commit();
			return redirect()->route('surat-keluar.index')->with('success', 'Surat keluar berhasil ditambahkan !');
		} catch (\Exception $e) {
			DB::rollBack();
			return redirect()->back()->with('error', 'Terjadi kesalahan !');
		}
	}

	/**
	 * Display the specified resource.
	 */
	public function show(SuratKeluar $suratKeluar)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(SuratKeluar $suratKeluar)
	{
		$title = 'Edit Surat Keluar';

		return view('surat_keluar.edit', compact('title', 'suratKeluar'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateSuratKeluarRequest $request, SuratKeluar $suratKeluar)
	{
		DB::beginTransaction();

		try {
			$suratKeluar->update([
				'nomor_surat' => $request->nomor_surat,
				'hal' => $request->hal,
				'tanggal_surat' => $request->tanggal_surat,
				'isi_surat' => $request->isi_surat,
			]);

			DB::commit();
			return redirect()->route('surat-keluar.index')->with('success', 'Surat keluar berhasil diperbarui !');
		} catch (\Exception $e) {
			DB::rollBack();
			return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui surat keluar !');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(SuratKeluar $suratKeluar)
	{
		DB::beginTransaction();

		try {
			$suratKeluar->delete();
			DB::commit();
			return redirect()->route('surat-keluar.index')->with('success', 'Surat keluar berhasil dihapus !');
		} catch (\Exception $e) {
			DB::rollBack();
			return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus surat keluar !');
		}
	}

	public function file($id)
	{
		$data = SuratKeluar::find($id);

		if (!$data) {
			return redirect()->back()->with('error', 'Surat tidak ditemukan !');
		}

		$pdf = Pdf::loadView('surat_keluar.file', compact('data'));
		$pdf->setPaper('A4', 'portrait');
		return $pdf->stream('surat_keluar_' . $data->nomor_surat . '.pdf');
	}
}
