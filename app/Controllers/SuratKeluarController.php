<?php

namespace App\Controllers;

use App\Models\SuratKeluar;
use App\Models\KlasifikasiSurat;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SuratKeluarController extends BaseController
{
    protected $suratKeluar;
    protected $klasifikasi;

    public function __construct()
    {
        $this->suratKeluar = new SuratKeluar();
        $this->klasifikasi = new KlasifikasiSurat();
    }

    public function index()
    {
        $data['title'] = 'Surat Keluar';
        $data['surat_keluar'] = $this->suratKeluar->findAll();
        return view('surat-keluar/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Surat Keluar';
        $data['klasifikasi'] = $this->klasifikasi->findAll();
        return view('surat-keluar/create', $data);
    }

    public function save()
    {
        $validationRule = $this->validate([
            'nomor_surat' => [
                'label' => 'Nomor Surat',
                'rules' => 'required|is_unique[surat_keluar.nomor_surat]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'tanggal_surat' => [
                'label' => 'Tanggal Surat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'klasifikasi_id' => [
                'label' => 'Klasifikasi Surat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'isi' => [
                'label' => 'Isi Surat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ]
        ]);

        if (!$validationRule) {
            return redirect()->back()->withInput()->with('toastr', [
                'type' => 'error',
                'message' => implode('<br>', $this->validator->getErrors())
            ]);
        }

        $data = [
            'nomor_surat' => esc($this->request->getPost('nomor_surat')),
            'tanggal_surat' => esc($this->request->getPost('tanggal_surat')),
            'klasifikasi_id' => esc($this->request->getPost('klasifikasi_id')),
            'isi' => $this->request->getPost('isi'),
        ];

        $this->suratKeluar->insert($data);

        return redirect()->to(base_url('surat-keluar'))->with('toastr', [
            'type' => 'success',
            'message' => 'Data berhasil disimpan'
        ]);
    }
}
