<?php

namespace App\Controllers;

use App\Models\User;
use Hermawan\DataTables\DataTable;
use App\Controllers\BaseController;

class UserController extends BaseController
{

    protected $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function index()
    {
        $data = [
            'title' => 'User',
            'user' => $this->userModel->findAll()
        ];

        return view('user/index', $data);
    }

    public function show($id = false)
    {
        if ($id == false) {
            $isLoggedIn = session()->get('id_user');

            $db = db_connect();
            $builder = $db->table('users')
                ->select('id, nama_lengkap, email, username, role')
                ->where('id !=', $isLoggedIn);

            return DataTable::of($builder)
                ->add('action', function ($row) {
                    return '
                <a class="btn btn-warning btn-sm" href="' . base_url('user/' . $row->id) . '"><i class="fas fa-pencil-alt"></i></a>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal' . $row->id . '">
                    <i class="fas fa-trash"></i>
                </button>';
                })
                ->add('role', function ($row) {
                    return ($row->role == 'admin')
                        ? '<span class="badge badge-danger">Admin</span>'
                        : (($row->role == 'ketua-jurusan')
                            ? '<span class="badge badge-warning">Ketua Jurusan</span>'
                            : (($row->role == 'direktur')
                                ? '<span class="badge badge-success">Direktur</span>'
                                : '<span class="badge badge-secondary">User</span>')
                        );
                })
                ->addNumbering('no')
                ->toJson(true);
        }

        $data = [
            'title' => 'Detail User',
            'user' => $this->userModel->first()
        ];
        return view('user/detail', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah User';
        return view('user/create', $data);
    }

    public function save()
    {
        $validation = $this->validate([
            'nama_lengkap' => [
                'label' => 'Nama Lengkap',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ],
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|is_unique[users.email]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ],
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ],
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 8 karakter'
                ],
            ],
            'role' => [
                'label' => 'Role',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ]
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('toastr', [
                'type' => 'error',
                'message' => implode('<br>', $this->validator->getErrors())
            ]);
        }

        $data = [
            'nama_lengkap' => esc($this->request->getPost('nama_lengkap')),
            'email' => esc($this->request->getPost('email')),
            'username' => esc($this->request->getPost('username')),
            'password' => password_hash(esc($this->request->getVar('password')), PASSWORD_BCRYPT),
            'role' => esc($this->request->getPost('role')),
        ];

        $this->userModel->insert($data);
        return redirect()->to(base_url('user'))->with('toastr', [
            'type' => 'success',
            'message' => 'Data Berhasil ditambahkan!'
        ]);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit User',
            'user' => $this->userModel->find($id)
        ];
        return view('user/edit', $data);
    }

    public function update($id)
    {
        $validation = $this->validate([
            'nama_lengkap' => [
                'label' => 'Nama Lengkap',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ],
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ],
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ],
            ],
            'role' => [
                'label' => 'Role',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ]
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('toastr', [
                'type' => 'error',
                'message' => implode('<br>', $this->validator->getErrors())
            ]);;
        }

        $data = [
            'nama_lengkap' => esc($this->request->getPost('nama_lengkap')),
            'email' => esc($this->request->getPost('email')),
            'username' => esc($this->request->getPost('username')),
            'role' => esc($this->request->getPost('role')),
        ];

        $this->userModel->update($id, $data);

        return redirect()->to(base_url('user'))->with('toastr', [
            'type' => 'success',
            'message' => 'Data Berhasil diperbarui!'
        ]);
    }

    public function delete($id)
    {
        $this->userModel->delete($id);
        return redirect()->to(base_url('user'))->with('toastr', [
            'type' => 'success',
            'message' => 'Data Berhasil dihapus!'
        ]);
    }
}
