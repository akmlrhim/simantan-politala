<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class JabatanController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Jabatan';
        return 1;
    }
}
