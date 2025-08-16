<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use App\Http\Requests\StoreJenisSuratRequest;
use App\Http\Requests\UpdateJenisSuratRequest;
use Illuminate\Support\Facades\DB;

class JenisSuratController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$title = 'Jenis Surat';
		$jenisSurat = DB::table('jenis_surat')->paginate(10);

		return view('jenis-surat', compact('title', 'jenisSurat'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StoreJenisSuratRequest $request)
	{
		DB::beginTransaction();

		try {
			JenisSurat::create([
				'nama' => $request->nama
			]);

			DB::commit();
			return redirect()->back()->with('success', 'Jenis surat berhasil ditambahkan.');
		} catch (\Exception $e) {
			DB::rollBack();
			return redirect()->back()->with('error', 'Terjadi kesalahan.');
		}
	}

	/**
	 * Display the specified resource.
	 */
	public function show(JenisSurat $jenisSurat)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(JenisSurat $jenisSurat)
	{
		return response()->json($jenisSurat);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateJenisSuratRequest $request, JenisSurat $jenisSurat)
	{
		DB::beginTransaction();

		try {
			$jenisSurat->update(['nama' => $request->nama]);
			DB::commit();

			return redirect()->back()->with('success', 'Jenis surat berhasil diubah.');
		} catch (\Exception $e) {
			DB::rollBack();
			return redirect()->back()->with('error', 'Terjadi kesalahan.');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(JenisSurat $jenisSurat)
	{
		DB::beginTransaction();

		try {
			$jenisSurat->delete();

			DB::commit();
			return redirect()->back()->with('success', 'Jenis surat berhasil dihapus.');
		} catch (\Exception $e) {
			DB::rollBack();
			return redirect()->back()->with('error', 'Terjadi kesalahan.');
		}
	}
}
