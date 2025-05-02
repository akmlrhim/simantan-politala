<?php

namespace App\Controllers;

use App\Models\KlasifikasiSurat;
use Hermawan\DataTables\DataTable;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class KlasifikasiSuratController extends BaseController
{

	protected $klasifikasi;

	public function __construct()
	{
		$this->klasifikasi = new KlasifikasiSurat();
	}

	public function index()
	{
		$data = [
			'title' => 'Jenis Surat',
			'kl_surat' => $this->klasifikasi->findAll()
		];

		return view('klasifikasi-surat/index', $data);
	}

	public function show($id = false)
	{
		if ($id == false) {
			$db = db_connect();
			$builder = $db->table('klasifikasi_surat')
				->select('id, nama');

			return DataTable::of($builder)
				->add('action', function ($row) {
					return '
                <a class="btn btn-warning btn-sm" href="' . base_url('klasifikasi-surat/' . $row->id) . '"><i class="fas fa-pencil-alt"></i></a>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal' . $row->id . '">
                    <i class="fas fa-trash"></i>
                </button>';
				})
				->addNumbering('no')
				->toJson(true);
		}
	}

	public function create()
	{
		$data = [
			'title' => 'Tambah Jenis Surat',
		];
		return view('klasifikasi-surat/create', $data);
	}

	public function save()
	{
		$validation = $this->validate([
			'nama' => [
				'label' => 'Nama Surat',
				'rules' => 'required|is_unique[klasifikasi_surat.nama]',
				'errors' => [
					'required' => '{field} harus diisi.',
					'is_unique' => '{field} sudah terdaftar.'
				]
			],
		]);

		if (!$validation) {
			return redirect()->back()->withInput()->with('toastr', [
				'type' => 'error',
				'message' => implode('<br>', $this->validator->getErrors())
			]);
		}

		$data = [
			'nama' => esc($this->request->getPost('nama')),
			'keterangan' => esc($this->request->getPost('keterangan'))
		];

		$this->klasifikasi->insert($data);

		return redirect()->to(base_url('klasifikasi-surat'))->with('toastr', [
			'type' => 'success',
			'message' => 'Data Berhasil disimpan!'
		]);
	}

	public function edit($id)
	{
		$data = [
			'title' => 'Edit Jenis Surat',
			'kl_surat' => $this->klasifikasi->find($id)
		];

		return view('klasifikasi-surat/edit', $data);
	}

	public function update($id)
	{
		$validation = $this->validate([
			'nama' => [
				'label' => 'Nama Surat',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} harus diisi.',
				]
			],
		]);

		if (!$validation) {
			return redirect()->back()->withInput()->with('toastr', [
				'type' => 'error',
				'message' => implode('<br>', $this->validator->getErrors())
			]);
		}

		$data = [
			'nama' => esc($this->request->getPost('nama')),
			'keterangan' => esc($this->request->getPost('keterangan'))
		];

		$this->klasifikasi->update($id, $data);
		return redirect()->to(base_url('klasifikasi-surat'))->with('toastr', [
			'type' => 'success',
			'message' => 'Data Berhasil diubah!'
		]);
	}

	public function delete($id)
	{
		$this->klasifikasi->delete($id);
		return redirect()->to(base_url('klasifikasi-surat'))->with('toastr', [
			'type' => 'success',
			'message' => 'Data Berhasil dihapus!'
		]);
	}
}
