<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
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
      'foto' => 'nullable|mimes:png,jpg,webp|max:2048'
    ]);

    DB::beginTransaction();

    try {
      $user = User::findOrFail(Auth::id());

      $user->nama = $request->nama;
      $user->nip = $request->nip;
      $user->email = $request->email;

      if ($request->hasFile('foto')) {
        if ($user->foto && $user->foto !== 'default.jpg' && Storage::disk('public')->exists('foto_profil/' . $user->foto)) {
          Storage::disk('public')->delete('foto_profil/' . $user->foto);
        }

        $file = $request->file('foto');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('foto_profil', $filename, 'public');
        $user->foto = $filename;
      }

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

  public function activityLog()
  {
    $title = 'Log Aktivitas';
    $logs = ActivityLog::with('user')
      ->latest()
      ->take(10)
      ->where('user_id', Auth::id())
      ->get();

    return view('profil.log-aktivitas', compact('title', 'logs'));
  }

  public function deleteActivityLog()
  {
    $log = ActivityLog::where('user_id', Auth::id())->first();

    $log->delete();
    return redirect()->route('profil.log-aktivitas')->with('success', 'Log aktivitas berhasil dihapus.');
  }
}
