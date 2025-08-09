<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreSuratMasukRequest;
use App\Http\Requests\UpdateSuratMasukRequest;
use App\Models\TelahanStaf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Throwable;
use Barryvdh\DomPDF\Facade\Pdf as Pdf;

class SuratMasukController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$search = request()->query('search');
		$query = DB::table('surat_masuk');

		if ($search) {
			$query->where(function ($q) use ($search) {
				$q->where('perihal', 'like', '%' . $search . '%')
					->orWhere('asal_surat', 'like', '%' . $search . '%')
					->orWhere('nomor_surat', 'like', '%' . $search . '%');
			});
		}

		$title = 'Surat Masuk';
		$suratMasuk = $query->paginate(10)->appends(['search' => $search]);

		return view('surat_masuk.index', compact('title', 'suratMasuk', 'search'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$title = 'Tambah Surat Masuk';
		return view('surat_masuk.create', compact('title'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StoreSuratMasukRequest $request)
	{
		DB::beginTransaction();

		try {
			if ($request->hasFile('file_surat')) {
				$file_surat = $request->file('file_surat');
				$filename = time() . '.' . $file_surat->getClientOriginalExtension();

				Storage::disk('public')->put('surat_masuk/' . $filename, file_get_contents($file_surat));
			}

			SuratMasuk::create([
				'perihal' => $request->perihal,
				'asal_surat' => $request->asal_surat,
				'nomor_surat' => $request->nomor_surat,
				'tanggal_diterima' => $request->tanggal_diterima,
				'tanggal_surat' => $request->tanggal_surat,
				'file_surat' => $filename,
				'status' => 'Pending',
				'created_by' => Auth::user()->id
			]);

			DB::commit();
			return redirect()->route('surat-masuk.index')->with('success', 'Surat masuk berhasil ditambahkan !');
		} catch (\Throwable $e) {

			DB::rollBack();
			return redirect()->back()->with('error', 'Terjadi kesalahan !');
		}
	}

	/**
	 * Display the specified resource.
	 */
	public function show(SuratMasuk $suratMasuk)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(SuratMasuk $suratMasuk)
	{
		$title = 'Edit Surat Masuk';

		return view('surat_masuk.edit', compact('title', 'suratMasuk'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateSuratMasukRequest $request, SuratMasuk $suratMasuk)
	{
		DB::beginTransaction();

		try {
			if ($request->hasFile('file_surat')) {
				$file = $request->file('file_surat');

				if ($file->isValid()) {
					if ($suratMasuk->file_surat && Storage::disk('public')->exists('surat-masuk/' . $suratMasuk->file_surat)) {
						Storage::disk('public')->delete('surat-masuk/' . $suratMasuk->file_surat);
					}

					$filename = time() . '.' . $file->getClientOriginalExtension();
					$file->storeAs('surat-masuk', $filename, 'public');
					$suratMasuk->file_surat = $filename;
				}
			}

			$suratMasuk->update([
				'perihal' => $request->perihal,
				'asal_surat' => $request->asal_surat,
				'nomor_surat' => $request->nomor_surat,
				'tanggal_diterima' => $request->tanggal_diterima,
				'tanggal_surat' => $request->tanggal_surat,
			]);

			DB::commit();
			return redirect()->route('surat-masuk.index')->with('success', 'Surat masuk berhasil di edit !');
		} catch (Throwable $e) {
			DB::rollBack();
			return redirect()->back()->with('error', 'Terjadi kesalahan saat mengupdate surat masuk !');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(SuratMasuk $suratMasuk)
	{
		DB::beginTransaction();

		try {
			if ($suratMasuk->file_surat) {
				Storage::disk('public')->delete('surat_masuk/' . $suratMasuk->file_surat);
			}

			$suratMasuk->delete();
			DB::commit();
			return redirect()->back()->with('success', 'Surat masuk dihapus !');
		} catch (Throwable $e) {
			DB::rollBack();
			return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus surat masuk !');
		}
	}

	public function telahanStaf($id)
	{
		$data = TelahanStaf::where('surat_masuk_id', $id)
			->first();

		$title = 'Telaahan Staf';
		// return view('surat_masuk.telahan_staf', [
		// 	'data' => $surat,
		// 	'title' => $title,
		// ]);
		$pdf = Pdf::loadView('surat_masuk.telahan_staf', compact('data', 'title'));
		$pdf->setPaper('A4', 'portrait');
		$filename = 'telahan_staf' . preg_replace('/[\/\\\\]/', '-', $data->nomor_surat) . '.pdf';
		return $pdf->stream($filename);
	}
}
