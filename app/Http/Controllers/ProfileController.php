<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ActivityLog;
use App\Services\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

  protected $uploadService;

  public function __construct(UploadService $upload)
  {
    $this->uploadService = $upload;
  }

  public function index()
  {
    $title = 'Profil Saya';
    return view('profil.index', compact('title'));
  }

  public function updateProfil(Request $request)
  {
    $request->validate([
      'nama' => 'required',
      'nip' => 'required|numeric|digits_between:10,18',
      'email' => 'required|email',
      'foto' => 'nullable|mimes:png,jpg,webp|max:2048',
      'ttd' => 'nullable|mimes:png,jpg,webp|max:2048'
    ]);

    DB::beginTransaction();

    try {
      $user = User::findOrFail(Auth::id());

      $user->nama = $request->nama;
      $user->nip = $request->nip;
      $user->email = $request->email;

      $user->foto = $this->uploadService->uploadFoto($request->file('foto'), $user->foto);

      $user->save();
      DB::commit();

      return redirect()->route('dashboard')->with('success', 'Profil berhasil diperbarui.');
    } catch (\Exception $e) {
      DB::rollBack();
      return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui profil.');
    }
  }

  public function updatePassword(Request $request)
  {
    $request->validate([
      'current_password' => 'required',
      'new_password' => 'required|min:8|confirmed',
    ]);

    $user = User::findOrFail(Auth::id());

    if (!Hash::check($request->current_password, $user->password)) {
      return back()->withErrors([
        'current_password' => 'Password saat ini tidak valid.',
      ])->withInput()->withFragment('password-section');
    }

    if ($request->current_password === $request->new_password) {
      return back()->withErrors([
        'new_password' => 'Password baru tidak boleh sama dengan password saat ini.',
      ])->withInput()->withFragment('password-section');
    }

    $user->update([
      'password' => Hash::make($request->new_password),
    ]);

    return redirect()->route('dashboard')->with('success', 'Kata sandi berhasil diperbarui.');
  }
}
