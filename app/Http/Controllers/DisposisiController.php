<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use App\Http\Requests\StoreDisposisiRequest;
use App\Http\Requests\UpdateDisposisiRequest;
use App\Models\SuratMasuk;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DisposisiController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $title = 'Disposisi';
    $disposisi = DB::table('disposisi')
      ->join('surat_masuk', 'disposisi.surat_masuk_id', '=', 'surat_masuk.id')
      ->select('disposisi.*', 'surat_masuk.perihal')
      ->paginate(10);

    return view('disposisi.index', compact('title', 'disposisi'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $title = 'Tambah Disposisi';
    $suratMasuk = SuratMasuk::all();
    $users = User::all();

    return view('disposisi.create', compact('title', 'suratMasuk', 'users'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreDisposisiRequest $request)
  {
    //
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
