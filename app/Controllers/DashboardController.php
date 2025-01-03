<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Dashboard',
			'user' => (new \App\Models\User())->countAll(),
			'kl_surat' => (new \App\Models\KlasifikasiSurat())->countAll(),
			'surat_masuk' => (new \App\Models\SuratMasuk())->countAll(),
			'jabatan' => (new \App\Models\Jabatan())->countAll(),
			'surat_keluar' => (new \App\Models\SuratKeluar())->countAll(),
		];
		return view('dashboard/index', $data);
	}
}
