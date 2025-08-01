<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
	public function index()
	{
		$title = 'Login Page';

		return view('login', compact('title'));
	}

	public function login(Request $request)
	{
		$request->validate([
			'email' => 'required|email',
			'password' => 'required|min:8'
		]);

		$user = User::where('email', $request->email)->first();

		if (!$user) {
			return redirect()->back()
				->withInput()
				->with('error', 'Pengguna tidak ditemukan !');
		}

		if (!Hash::check($request->password, $user->password)) {
			return back()->withInput()->withErrors(['password' => 'Password anda salah']);
		}

		Auth::login($user);
		$request->session()->regenerate();

		return redirect()->route('dashboard')
			->with('success', 'Login berhasil !');
	}

	public function logout(Request $request)
	{
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		$request->session()->flush();

		return redirect()->route('login')
			->with('info', 'Anda telah logout !');
	}
}
