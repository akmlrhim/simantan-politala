<?php

namespace App\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\SuratMasuk;
use App\Models\TelaahStaf;
use Hermawan\DataTables\DataTable;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SuratMasukController extends BaseController
{
	protected $suratMasuk;
	protected $telaahStaf;

	public function __construct()
	{
		$this->suratMasuk = new SuratMasuk();
		$this->telaahStaf = new TelaahStaf();
	}

	public function index()
	{
		$data = [
			'title' => 'Surat Masuk',
			'surat_masuk' => $this->suratMasuk->findAll()
		];
		return view('surat-masuk/index', $data);
	}

	public function show()
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
                surat_masuk.status_telaah'
			);

		return DataTable::of($builder)
			->add('action', function ($row) {
				return '
                <a href="' . base_url('surat-masuk/telaah-staf/download/' . $row->surat_masuk_id) . '" class="btn btn-success btn-sm" target="_blank">
                    <i class="fa fa-print"></i>
                </a>
                <a href="' . base_url('surat-masuk/' . $row->surat_masuk_id) . '" class="btn btn-warning btn-sm">
                    <i class="fas fa-pencil-alt"></i>
                </a>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal' . $row->surat_masuk_id . '">
                    <i class="fas fa-trash"></i>
                </button>
            ';
			})

			->add('tanggal_diterima', function ($row) {
				$tanggal = $row->tanggal_diterima;
				return date('d-m-Y', strtotime($tanggal));
			})
			->add('tanggal_surat', function ($row) {
				$tanggal = $row->tanggal_surat;
				return date('d-m-Y', strtotime($tanggal));
			})
			->add('file_surat', function ($row) {
				return '<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#fileModal" data-file="' . base_url('uploads/surat-masuk/' . $row->file_surat) . '">Lihat Dokumen</button>';
			})
			->add('telaah_staf', function ($row) {
				if ($row->status_telaah == 'Sudah Ditelaah') {
					return '<a target="_blank" href="' . base_url('surat-masuk/telaah-staf/' . $row->surat_masuk_id) . '" class="btn btn-sm btn-primary">Telaah Staf</a>';
				} else {
					return '<span class="badge badge-danger">Belum Ditelaah</span>';
				}
			})
			->addNumbering('no')
			->toJson(true);
	}

	public function create()
	{
		$data = [
			'title' => 'Tambah Surat Masuk',
		];
		return view('surat-masuk/create', $data);
	}

	public function save()
	{
		$validation = $this->validate([
			'perihal' => [
				'label' => 'Perihal',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong'
				]
			],
			'nomor_surat' => [
				'label' => 'Nomor Surat',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong'
				]
			],
			'asal_surat' => [
				'label' => 'Asal Surat',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong'
				]
			],
			'tanggal_surat' => [
				'label' => 'Tanggal Surat',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong'
				]
			],
			'tanggal_diterima' => [
				'label' => 'Tanggal Diterima',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong'
				]
			],
			'file_surat' => [
				'label' => 'File Surat',
				'rules' => 'uploaded[file_surat]|mime_in[file_surat,application/pdf]|max_size[file_surat,2048]',
				'errors' => [
					'uploaded' => 'File harus diunggah.',
					'mime_in' => 'File harus berformat PDF.',
					'max_size' => 'Ukuran file maksimal adalah 2MB.',
				]
			],
		]);

		if (!$validation) {
			return redirect()->back()->withInput()->with('toastr', [
				'type' => 'error',
				'message' => implode('<br>', $this->validator->getErrors())
			]);
		}

		$file_surat = $this->request->getFile('file_surat');
		if ($file_surat->isValid() && !$file_surat->hasMoved()) {
			$filename = $file_surat->getRandomName();
			$file_surat->move('uploads/surat-masuk', $filename);
		} else {
			$filename = '';
		}

		$this->suratMasuk->insert([
			'perihal' => esc($this->request->getPost('perihal')),
			'nomor_surat' => esc($this->request->getPost('nomor_surat')),
			'asal_surat' => esc($this->request->getPost('asal_surat')),
			'tanggal_surat' => $this->request->getPost('tanggal_surat'),
			'tanggal_diterima' => $this->request->getPost('tanggal_diterima'),
			'file_surat' => $filename,
			'created_by' => session()->get('id_user'),
		]);

		return redirect()->to(base_url('surat-masuk'))->with('toastr', [
			'type' => 'success',
			'message' => 'Data berhasil disimpan'
		]);
	}

	public function edit($id)
	{
		$data = [
			'title' => 'Edit Surat Masuk',
			'surat_masuk' => $this->suratMasuk->find($id),
		];
		return view('surat-masuk/edit', $data);
	}

	public function update($id)
	{
		$validation = $this->validate([
			'perihal' => [
				'label' => 'Perihal',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong'
				]
			],
			'nomor_surat' => [
				'label' => 'Nomor Surat',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong'
				]
			],
			'asal_surat' => [
				'label' => 'Asal Surat',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong'
				]
			],
			'tanggal_surat' => [
				'label' => 'Tanggal Surat',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong'
				]
			],
			'tanggal_diterima' => [
				'label' => 'Tanggal Diterima',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong'
				]
			],
			'file_surat' => [
				'label' => 'File Surat',
				'rules' => 'mime_in[file_surat,application/pdf]|max_size[file_surat,2048]',
				'errors' => [
					'mime_in' => 'File harus berformat PDF.',
					'max_size' => 'Ukuran file maksimal adalah 2MB.',
				]
			],
		]);

		if (!$validation) {
			return redirect()->back()->withInput()->with('toastr', [
				'type' => 'error',
				'message' => implode('<br>', $this->validator->getErrors())
			]);
		}

		$oldData = $this->suratMasuk->find($id);
		$file_surat = $this->request->getFile('file_surat');
		$filename = $oldData->file_surat;

		if ($file_surat->isValid() && !$file_surat->hasMoved()) {
			$filename = $file_surat->getRandomName();
			$file_surat->move('uploads/surat-masuk', $filename);

			if (!empty($oldData->file_surat) && file_exists('uploads/surat-masuk/' . $oldData->file_surat)) {
				unlink('uploads/surat-masuk/' . $oldData->file_surat);
			}
		}

		$data = [
			'perihal' => esc($this->request->getPost('perihal')),
			'nomor_surat' => esc($this->request->getPost('nomor_surat')),
			'asal_surat' => esc($this->request->getPost('asal_surat')),
			'tanggal_surat' => $this->request->getPost('tanggal_surat'),
			'tanggal_diterima' => $this->request->getPost('tanggal_diterima'),
			'file_surat' => $filename
		];

		$this->suratMasuk->update($id, $data);

		return redirect()->to(base_url('surat-masuk'))->with('toastr', [
			'type' => 'success',
			'message' => 'Data berhasil diubah'
		]);
	}

	public function delete($id)
	{
		$data = $this->suratMasuk->find($id);
		if (!empty($data->file_surat) && file_exists('uploads/surat-masuk/' . $data->file_surat)) {
			unlink('uploads/surat-masuk/' . $data->file_surat);
		}
		$this->suratMasuk->delete($id);
		return redirect()->to(base_url('surat-masuk'))->with('toastr', [
			'type' => 'success',
			'message' => 'Data berhasil dihapus'
		]);
	}

	public function telaahStaf($id)
	{
		$telaahStaf = $this->telaahStaf
			->where('surat_masuk_id', $id)
			->join('surat_masuk', 'surat_masuk.id = telaah_staf.surat_masuk_id', 'left')
			->first();

		if (!$telaahStaf) {
			return redirect()->to(base_url('surat-masuk'))->with('toastr', [
				'type' => 'error',
				'message' => 'Data tidak ditemukan.'
			]);
		}

		$options = new Options();
		$options->set('isHtml5ParserEnabled', true);
		$options->set('isRemoteEnabled', true);
		$dompdf = new Dompdf($options);

		$data['telaah_staf'] = $telaahStaf;
		$html = view('surat-masuk/telaah-staf-pdf', $data);

		$dompdf->loadHtml($html);
		$dompdf->setPaper('A4', 'landscape');
		$dompdf->render();

		$filename = 'Telaah-Staf-' . $telaahStaf->nomor_surat . '.pdf';
		return $this->response
			->setContentType('application/pdf')
			->setHeader('Content-Disposition', 'inline; filename="' . $filename . '"')
			->setBody($dompdf->output());
	}
}
