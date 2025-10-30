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
		$query = User::with('jabatan')
			->where('users.id', '!=', Auth::user()->id);

		if ($search) {
			$query->where('users.nama', 'like', '%' . $search . '%');
		}

		$users = $query->paginate(10)->appends(['search' => $search]);
		$title = 'Users';

		return view('users.index', compact('title', 'users', 'search'));
	}


	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$title = 'Tambah Users';
		$jabatan = Jabatan::pluck('nama', 'id');

		return view('users.create', compact('title', 'jabatan'));
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
			return redirect()->route('users.index')->with('success', 'Users berhasil ditambahkan.');
		} catch (\Exception $e) {
			DB::rollBack();
			return redirect()->back()->withInput()->with('error', 'Gagal menambahkan Users');
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(User $user)
	{
		$title = 'Edit Users';
		$jabatan = Jabatan::pluck('nama', 'id');

		return view('users.edit', compact('title', 'user', 'jabatan'));
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
			return redirect()->route('users.index')->with('success', 'Users berhasil diubah.');
		} catch (\Exception $e) {
			DB::rollBack();
			return redirect()->back()->withInput()->with('error', 'Gagal mengubah data Users.');
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

			return redirect()->back()->with('success', 'Users berhasil dihapus.');
		} catch (\Exception $e) {
			DB::rollBack();
			return redirect()->back()->withInput()->with('error', 'Gagal menghapus Users.');
		}
	}
}
