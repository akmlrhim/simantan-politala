<?php

namespace App\Controllers;

use App\Models\SuratKeluar;
use App\Models\KlasifikasiSurat;
use Hermawan\DataTables\DataTable;
use App\Controllers\BaseController;
use Carbon\Carbon;
use CodeIgniter\HTTP\ResponseInterface;
use Dompdf\Dompdf;

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

	public function show($id = false)
	{
		if ($id == false) {
			$db = db_connect();
			$builder = $db->table('surat_keluar AS sk')
				->select('id, nomor_surat, tanggal_surat, perihal, isi');

			return DataTable::of($builder)
				->add('action', function ($row) {
					return '
						<a href="' . base_url('surat-keluar/' . $row->id) . '" class="btn btn-warning btn-sm" title="Edit">
								<i class="fas fa-pencil-alt"></i>
						</a>
						<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal' . $row->id . '" title="Hapus">
								<i class="fas fa-trash"></i>
						</button>
				';
				})

				->add('tanggal_surat', function ($row) {
					$tanggal = $row->tanggal_surat;
					return date('d-m-Y', strtotime($tanggal));
				})

				->add('file', function ($row) {
					return '<a href="' . base_url('surat-keluar/pdf/' . $row->id) . '" target="_blank" class="btn btn-sm btn-primary">Lihat Dokumen</a>';
				})
				->addNumbering('no')
				->toJson(true)
			;
		}
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
			'perihal' => [
				'label' => 'Perihal',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} harus diisi'
				]
			],
			'isi' => [
				'label' => 'Isi Surat',
				'rules' => 'required|string|check_isi',
				'errors' => [
					'required' => '{field} harus diisi',
					'check_isi' => '{field} harus diisi'
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
			'perihal' => esc($this->request->getPost('perihal')),
			'isi' => $this->request->getPost('isi'),
			'created_by' => session()->get('id_user')
		];

		$this->suratKeluar->insert($data);

		return redirect()->to(base_url('surat-keluar'))->with('toastr', [
			'type' => 'success',
			'message' => 'Data berhasil disimpan'
		]);
	}

	public function edit($id)
	{
		$data = [
			'title' => 'Edit Surat Keluar',
			'surat_keluar' => $this->suratKeluar->find($id),
			'klasifikasi' => $this->klasifikasi->findAll()
		];

		return view('surat-keluar/edit', $data);
	}

	public function update($id)
	{
		$validationRule = $this->validate([
			'nomor_surat' => [
				'label' => 'Nomor Surat',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} harus diisi',
				]
			],
			'tanggal_surat' => [
				'label' => 'Tanggal Surat',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} harus diisi'
				]
			],
			'perihal' => [
				'label' => 'Perihal',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} harus diisi'
				]
			],
			'isi' => [
				'label' => 'Isi Surat',
				'rules' => 'required|string|check_isi',
				'errors' => [
					'required' => '{field} harus diisi',
					'check_isi' => '{field} harus diisi'
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
			'perihal' => esc($this->request->getPost('perihal')),
			'isi' => $this->request->getPost('isi'),
		];

		$this->suratKeluar->update($id, $data);
		return redirect()->to(base_url('surat-keluar'))->with('toastr', [
			'type' => 'success',
			'message' => 'Data berhasil disimpan'
		]);
	}

	public function delete($id)
	{
		$this->suratKeluar->delete($id);

		return redirect()->to(base_url('surat-keluar'))->with('toastr', [
			'type' => 'success',
			'message' => 'Data berhasil dihapus'
		]);
	}

	public function pdf($id)
	{
		$dompdf = new Dompdf();
		$suratKeluar = $this->suratKeluar
			->select('surat_keluar.id as sk_id, surat_keluar.*, users.nama_lengkap as nama_lengkap, users.nip as nip, jabatan.jabatan as jabatan')
			->join('users', 'users.id = surat_keluar.created_by', 'left')
			->join('jabatan', 'jabatan.id = users.jabatan_id', 'left')
			->where('surat_keluar.id', $id)
			->first();


		if (!$suratKeluar) {
			return redirect()->to(base_url('surat-keluar'))->with('toastr', [
				'type' => 'error',
				'message' => 'Data tidak ditemukan'
			]);
		}

		$tanggalSurat = Carbon::parse($suratKeluar->tanggal_surat)
			->locale('id_ID')->translatedFormat('d F Y');

		$data['surat_keluar'] = $suratKeluar;
		$data['tanggal_surat'] = $tanggalSurat;

		$html = view('surat-keluar/pdf', $data);
		$dompdf->loadHtml($html);
		$dompdf->setPaper('A4', 'potrait');
		$filename = 'Surat Keluar' . $suratKeluar->nomor_surat . 'pdf';
		$dompdf->render();
		$dompdf->stream($filename, ['Attachment' => false]);
	}
}
