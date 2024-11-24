<?php

namespace App\Controllers;

use App\Models\User;
use Hermawan\DataTables\DataTable;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

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
        ];

        return view('user/index', $data);
    }

    public function show($id = false)
    {
        if ($id == false) {
            $db = db_connect();
            $builder = $db->table('users')->select('id, nama_lengkap, email, role');

            return DataTable::of($builder)
                ->add('action', function ($row) {
                    return '
                <a class="btn btn-warning btn-sm" href="' . base_url('user/edit/' . $row->id_user) . '"><i class="fas fa-edit"></i></a>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal' . $row->id_user . '">
                    <i class="fas fa-trash"></i> 
                </button>';
                })
                ->addNumbering('no')
                ->toJson(true);
        }
    }
}
