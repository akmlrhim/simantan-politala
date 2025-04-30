<?php

namespace App\Controllers;

use App\Models\SuratMasuk;
use App\Models\TelaahStaf;
use App\Models\KlasifikasiSurat;
use Hermawan\DataTables\DataTable;
use App\Controllers\BaseController;
use App\Models\Jabatan;
use CodeIgniter\HTTP\ResponseInterface;

class TelaahStafController extends BaseController
{

	protected $telaahStaf;
	protected $suratMasuk;
	protected $klasifikasi_surat;

	public function __construct()
	{
		$this->telaahStaf = new TelaahStaf();
		$this->suratMasuk = new SuratMasuk();
		$this->klasifikasi_surat = new KlasifikasiSurat();
	}

	public function index()
	{
		$data = [
			'title' => 'Telaah Staf',
			'telaah_staf' => $this->telaahStaf->findAll()
		];
		return view('telaah-staf/index', $data);
	}

	public function suratMasuk()
	{
		$db = db_connect();
		$builder = $db->table('surat_masuk')
			->select(
				'surat_masuk.id as surat_masuk_id, 
                surat_masuk.perihal, 
                surat_masuk.nomor_surat, 
                surat_masuk.asal_surat, 
                surat_masuk.tanggal_diterima, 
                surat_masuk.tanggal_surat, 
                surat_masuk.file_surat, 
                surat_masuk.status_telaah,
                telaah_staf.id as telaah_staf_id'
			)->join('telaah_staf', 'surat_masuk.id = telaah_staf.surat_masuk_id', 'left');

		return DataTable::of($builder)
			->add('action', function ($row) {
				if ($row->status_telaah == 'Sudah Ditelaah') {
					return '
                <a class="btn btn-sm btn-warning" href="' . base_url('telaah-staf/surat-masuk/edit/' . $row->telaah_staf_id) . '">
                    Edit
                </a>';
				} else {
					return 'T';
				}
			})
			->add('tanggal_diterima', function ($row) {
				return date('d-m-Y', strtotime($row->tanggal_diterima));
			})
			->add('tanggal_surat', function ($row) {
				return date('d-m-Y', strtotime($row->tanggal_surat));
			})
			->add('file_surat', function ($row) {
				return '<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#fileModal" data-file="' . base_url('uploads/surat-masuk/' . $row->file_surat) . '">Lihat Dokumen</button>';
			})
			->add('telaah_staf', function ($row) {
				if ($row->status_telaah == 'Belum Ditelaah') {
					return '<a class="btn btn-sm btn-warning" href="' . base_url('telaah-staf/surat-masuk/' . $row->surat_masuk_id) . '">Telaah Surat</a>';
				} else {
					return '<span class="badge badge-success"><i class="fas fa-check-circle mr-1"></i>Sudah Ditelaah</span>';
				}
			})
			->addNumbering('no')
			->toJson(true);
	}

	public function show()
	{
		$db = db_connect();
		$builder = $db->table('telaah_staf')
			->select(
				'telaah_staf.id,
                surat_masuk.id as surat_masuk_id, 
                surat_masuk.perihal, 
                surat_masuk.nomor_surat, 
                surat_masuk.asal_surat, 
                surat_masuk.tanggal_diterima, 
                surat_masuk.tanggal_surat, 
                surat_masuk.file_surat, 
                surat_masuk.status_telaah,
               '
			)->join('surat_masuk', 'surat_masuk.id = telaah_staf.surat_masuk_id', 'left');

		return DataTable::of($builder)
			->add('action', function ($row) {
				return '
               <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal' . $row->id . '">
                    <i class="fas fa-trash"></i>
                </button>
               ';
			})
			->add('file_surat', function ($row) {
				return '<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#fileModal" data-file="' . base_url('uploads/surat-masuk/' . $row->file_surat) . '">Lihat Dokumen</button>';
			})
			->add('telaah_staf', function ($row) {
				return '<button class="btn btn-info btn-sm btn-detail" data-id="' . $row->id . '">Lihat Telaah</button>';
			})
			->addNumbering('no')
			->toJson(true);
	}

	public function create($id)
	{
		$data = [
			'title' => 'Tambah Telaah Staf',
			'klasifikasi_surat' => $this->klasifikasi_surat->findAll(),
			'surat_masuk' => $this->suratMasuk->find($id),
			'jabatan' => (new \App\Models\Jabatan())->findAll()
		];

		return view('telaah-staf/create', $data);
	}

	public function save()
	{
		$validasi = $this->validate([
			'surat_masuk_id' => [
				'label' => 'Surat Masuk',
				'rules' => 'required|is_unique[telaah_staf.surat_masuk_id]',
				'errors' => [
					'required' => 'Surat Masuk harus diisi',
					'is_unique' => 'Surat Masuk sudah ditelaah'
				]
			],
			'jabatan_id' => [
				'label' => 'jabatan_id',
				'rules' => 'required',
				'errors' => [
					'required' => 'jabatan_id harus diisi'
				]
			],
			'klasifikasi_id' => [
				'label' => 'Perihal',
				'rules' => 'required',
				'errors' => [
					'required' => 'Perihal harus diisi'
				]
			],
			'isi_surat' => [
				'label' => 'Isi Surat',
				'rules' => 'required|check_isi',
				'errors' => [
					'required' => 'Isi Surat harus diisi',
					'check_isi' => 'Isi Surat harus diisi'
				]
			],
			'fakta_dan_data' => [
				'label' => 'Fakta dan Data',
				'rules' => 'required|check_isi',
				'errors' => [
					'required' => 'Fakta dan Data harus diisi',
					'check_isi' => 'Fakta dan Data harus diisi'
				]
			],
			'saran_dan_tindak' => [
				'label' => 'Saran dan Tindak',
				'rules' => 'required|check_isi',
				'errors' => [
					'required' => 'Saran dan Tindak harus diisi',
					'check_isi' => 'Saran dan Tindak harus diisi'
				]
			],
		]);

		if (!$validasi) {
			return redirect()->back()->withInput()->with('toastr', [
				'type' => 'error',
				'message' => implode('<br>', $this->validator->getErrors())
			]);
		}

		$data = [
			'surat_masuk_id' => $this->request->getPost('surat_masuk_id'),
			'jabatan_id' => esc($this->request->getPost('jabatan_id')),
			'klasifikasi_id' => esc($this->request->getPost('klasifikasi_id')),
			'created_by' => session()->get('id_user'),
			'isi_surat' => $this->request->getPost('isi_surat'),
			'fakta_dan_data' => $this->request->getPost('fakta_dan_data'),
			'saran_dan_tindak' => $this->request->getPost('saran_dan_tindak'),
		];

		$this->telaahStaf->insert($data);
		$this->suratMasuk->update($this->request->getPost('surat_masuk_id'), ['status_telaah' => 'Sudah Ditelaah']);

		return redirect()->to(base_url('telaah-staf'))->with('toastr', [
			'type' => 'success',
			'message' => 'Telaah Staf berhasil ditambahkan'
		]);
	}

	public function edit($id)
	{
		$data['telaah_staf'] = $this->telaahStaf->find($id);

		if (!$data['telaah_staf']) {
			return redirect()->to(base_url('telaah-staf'))->with('toastr', [
				'type' => 'error',
				'message' => 'Telaah Staf tidak ditemukan'
			]);
		}

		$data['existing_data'] = $this->telaahStaf->where('surat_masuk_id', $data['telaah_staf']->surat_masuk_id)->first();
		$data['klasifikasi_surat'] = $this->klasifikasi_surat->findAll();
		$data['jabatan'] = (new Jabatan())->findAll();
		$data['surat_masuk'] = $this->suratMasuk->find($data['telaah_staf']->surat_masuk_id);
		$data['title'] = 'Edit Telaah Staf';

		return view('telaah-staf/edit', $data);
	}


	public function update($id)
	{
		$validasi = $this->validate([
			'surat_masuk_id' => [
				'label' => 'Surat Masuk',
				'rules' => 'required',
				'errors' => [
					'required' => 'Surat Masuk harus diisi',
				]
			],
			'jabatan_id' => [
				'label' => 'Dari',
				'rules' => 'required',
				'errors' => [
					'required' => 'dari harus diisi'
				]
			],
			'klasifikasi_id' => [
				'label' => 'Perihal',
				'rules' => 'required',
				'errors' => [
					'required' => 'Perihal harus diisi'
				]
			],
			'isi_surat' => [
				'label' => 'Isi Surat',
				'rules' => 'required|check_isi',
				'errors' => [
					'required' => 'Isi Surat harus diisi',
					'check_isi' => 'Isi Surat harus diisi'
				]
			],
			'fakta_dan_data' => [
				'label' => 'Fakta dan Data',
				'rules' => 'required|check_isi',
				'errors' => [
					'required' => 'Fakta dan Data harus diisi',
					'check_isi' => 'Fakta dan Data harus diisi'
				]
			],
			'saran_dan_tindak' => [
				'label' => 'Saran dan Tindak',
				'rules' => 'required|check_isi',
				'errors' => [
					'required' => 'Saran dan Tindak harus diisi',
					'check_isi' => 'Saran dan Tindak harus diisi'
				]
			],
		]);

		if (!$validasi) {
			return redirect()->back()->withInput()->with('toastr', [
				'type' => 'error',
				'message' => implode('<br>', $this->validator->getErrors())
			]);
		}

		$data = [
			'surat_masuk_id' => $this->request->getPost('surat_masuk_id'),
			'jabatan_id' => esc($this->request->getPost('jabatan_id')),
			'klasifikasi_id' => esc($this->request->getPost('klasifikasi_id')),
			'created_by' => session()->get('id_user'),
			'isi_surat' => $this->request->getPost('isi_surat'),
			'fakta_dan_data' => $this->request->getPost('fakta_dan_data'),
			'saran_dan_tindak' => $this->request->getPost('saran_dan_tindak'),
		];

		$this->telaahStaf->update($id, $data);
		return redirect()->to(base_url('telaah-staf'))->with('toastr', [
			'type' => 'success',
			'message' => 'Telaah Staf berhasil diperbarui'
		]);
	}
}
