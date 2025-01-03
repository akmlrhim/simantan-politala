<?php

namespace App\Controllers;

use App\Models\Jabatan;
use Hermawan\DataTables\DataTable;
use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\HTTP\ResponseInterface;

class JabatanController extends BaseController
{
	protected $jabatan;
	protected $user;

	public function __construct()
	{
		$this->jabatan = new Jabatan();
		$this->user = new User();
	}


	public function index()
	{
		$data['title'] = 'Jabatan';
		$data['jabatan'] = $this->jabatan->findAll();
		return view('jabatan/index', $data);
	}

	public function show($id = false)
	{
		if ($id == false) {
			$db = db_connect();
			$builder = $db->table('jabatan')
				->select('id, jabatan');

			return DataTable::of($builder)
				->add('action', function ($row) {
					return '
					<a class="btn btn-warning btn-sm" href="' . base_url('jabatan/' . $row->id) . '"><i class="fas fa-pencil-alt"></i></a>
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
		$data['title'] = 'Tambah Jabatan';
		return view('jabatan/create', $data);
	}

	public function save()
	{
		$validation = $this->validate([
			'jabatan' => [
				'rules' => 'required|is_unique[jabatan.jabatan]',
				'errors' => [
					'required' => 'Jabatan harus diisi',
					'is_unique' => 'Jabatan sudah ada'
				]
			]
		]);

		if (!$validation) {
			return redirect()->back()->withInput()->with('toastr', [
				'type' => 'error',
				'message' => implode('<br>', $this->validator->getErrors())
			]);
		}

		$this->jabatan->insert([
			'jabatan' => esc($this->request->getPost('jabatan'))
		]);

		return redirect()->to(base_url('jabatan'))->with('toastr', [
			'type' => 'success',
			'message' => 'Jabatan berhasil ditambahkan'
		]);
	}

	public function edit($id)
	{
		$data['title'] = 'Edit Jabatan';
		$data['jabatan'] = $this->jabatan->find($id);
		return view('jabatan/edit', $data);
	}

	public function update($id)
	{
		$validation = $this->validate([
			'jabatan' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Jabatan harus diisi',
				]
			]
		]);

		if (!$validation) {
			return redirect()->back()->withInput()->with('toastr', [
				'type' => 'error',
				'message' => implode('<br>', $this->validator->getErrors())
			]);
		}

		$data['jabatan'] = esc($this->request->getPost('jabatan'));
		$this->jabatan->update($id, $data);

		return redirect()->to(base_url('jabatan'))->with('toastr', [
			'type' => 'success',
			'message' => 'Jabatan berhasil diubah'
		]);
	}

	public function delete($id)
	{
		$relatedUser = $this->user->where('jabatan_id', $id)->countAllResults();
		if ($relatedUser > 0) {
			return redirect()->to(base_url('jabatan'))->with('toastr', [
				'type' => 'error',
				'message' => 'Jabatan masih digunakan oleh user'
			]);
		}

		$this->jabatan->delete($id);
		return redirect()->to(base_url('jabatan'))->with('toastr', [
			'type' => 'success',
			'message' => 'Jabatan berhasil dihapus'
		]);
	}
}
