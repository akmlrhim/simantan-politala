<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Jabatan;

class UserController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$search = request()->query('search');
		$query = DB::table('users')
			->join('jabatan', 'users.jabatan_id', '=', 'jabatan.id')
			->select(
				'users.*',
				'users.id as user_id',
				'users.nama as nama_lengkap',
				'jabatan.nama as nama_jabatan',
				'jabatan.id as jabatan_id'
			)
			->where('users.id', '!=', Auth::user()->id);

		if ($search) {
			$query->where('users.nama', 'like', '%' . $search . '%');
		}

		$users = $query->paginate(10)->appends(['search' => $search]);
		$title = 'Pengguna';

		return view('users.index', compact('title', 'users', 'search'));
	}


	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$title = 'Tambah Pengguna';
		$jabatan = Jabatan::pluck('nama', 'id');

		return view('users.create', compact('title'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(StoreUserRequest $request)
	{
		DB::beginTransaction();

		try {
			User::create(
				[
					'nama' => $request->nama,
					'email' => $request->email,
					'nip' => $request->nip,
					'jabatan_id' => $request->jabatan_id,
					'password' => Hash::make($request->password),
					'foto' => 'default.png',
					'role' => $request->role,
				]
			);

			DB::commit();
			return redirect()->route('users.index')->with('success', 'Pengguna berhasil ditambahkan !');
		} catch (\Exception $e) {
			DB::rollBack();
			return redirect()->back()->withInput()->with('error', 'Gagal menambahkan pengguna');
		}
	}

	/**
	 * Display the specified resource.
	 */
	public function show(User $user)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(User $user)
	{
		$title = 'Edit pengguna';

		return view('users.edit', compact('title', 'user'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UpdateUserRequest $request, User $user)
	{
		DB::beginTransaction();

		try {
			$user->update([
				'nama' => $request->nama,
				'email' => $request->email,
				'jabatan' => $request->jabatan,
				'nip' => $request->nip,
				'role' => $request->role,
			]);

			DB::commit();
			return redirect()->route('users.index')->with('success', 'Pengguna berhasil diubah !');
		} catch (\Exception $e) {
			DB::rollBack();
			return redirect()->back()->withInput()->with('error', 'Gagal mengubah data pengguna !');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(User $user)
	{
		DB::beginTransaction();

		try {
			$user->delete();
			DB::commit();

			return redirect()->back()->with('success', 'Pengguna berhasil dihapus !');
		} catch (\Exception $e) {
			DB::rollBack();
			return redirect()->back()->withInput()->with('error', 'Gagal menghapus pengguna !');
		}
	}
}
