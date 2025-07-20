<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreSuratMasukRequest;
use App\Http\Requests\UpdateSuratMasukRequest;

class SuratMasukController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$title = 'Surat Masuk';
		$suratMasuk = DB::table('surat_masuk')->paginate(10);

		return view('surat_masuk.index', compact('title', 'suratMasuk'));
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
		//
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateSuratMasukRequest $request, SuratMasuk $suratMasuk)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(SuratMasuk $suratMasuk)
	{
		//
	}
}
