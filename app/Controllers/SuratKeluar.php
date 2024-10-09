<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SuratKeluar extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Surat Keluar'
        ];
        return view('surat_keluar/index', $data);
    }
}
