<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Disposisi;
use App\Models\Jabatan;
use App\Models\JenisSurat;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
	public function index()
	{
		$title = 'Dashboard';
		$stats = [
			'users' => User::count(),
			'jabatan' => Jabatan::count(),
			'jenis_surat' => JenisSurat::count(),
			'surat_masuk' => SuratMasuk::count(),
			'surat_keluar' => SuratKeluar::count(),
			'telahan_staf' => SuratMasuk::where('status', 'Selesai')->count(),
			'disposisi' => Disposisi::count()
		];

		return view('dashboard', compact(
			'title',
			'stats',
		));
	}
}
