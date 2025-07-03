<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Http\Requests\StoreJabatanRequest;
use App\Http\Requests\UpdateJabatanRequest;
use Illuminate\Support\Facades\DB;

class JabatanController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$title = 'Jabatan';
		$jabatan = DB::table('jabatan')->paginate(10);

		return view('jabatan', compact('title', 'jabatan'));
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
	public function store(StoreJabatanRequest $request)
	{
		DB::beginTransaction();

		try {
			Jabatan::create([
				'nama' => $request->nama,
			]);

			DB::commit();

			return redirect()->back()->with('success', 'Jabatan berhasil ditambahkan!');
		} catch (\Exception $e) {
			DB::rollBack();

			return redirect()->back()
				->withInput()
				->with('error', 'Terjadi kesalahan, silakan coba lagi.');
		}
	}


	/**
	 * Display the specified resource.
	 */
	public function show(Jabatan $jabatan)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Jabatan $jabatan)
	{
		return response()->json($jabatan);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateJabatanRequest $request, Jabatan $jabatan)
	{
		DB::beginTransaction();

		try {
			$jabatan->update(['nama' => $request->nama]);
			DB::commit();

			return redirect()->back()->with('success', 'Jabatan berhasil diubah !');
		} catch (\Exception $e) {
			DB::rollBack();
			return redirect()->back()->with('error', 'Gagal menambahkan data !');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Jabatan $jabatan)
	{
		DB::beginTransaction();

		try {
			$jabatan->delete();
			DB::commit();

			return redirect()->back()->with('success', 'Jabatan berhasil dihapus !');
		} catch (\Exception $e) {
			DB::rollBack();
			return redirect()->back()->with('error', 'Gagal menghapus jabatan !');
		}
	}
}
