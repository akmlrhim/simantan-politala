<?php

namespace App\Controllers;

use App\Models\User;
use ReCaptcha\Recaptcha;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{

	protected $userModel;

	public function __construct()
	{
		$this->userModel = new User();
	}

	public function index()
	{
		$data['site_key'] = env('RECAPTCHA_SITE_KEY');
		$data['title'] = 'Login';
		return view('auth/login', $data);
	}

	public function authenticate()
	{
		$validationRules = [
			'username' => [
				'label' => 'Username',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak Boleh Kosong.',
				]
			],
			'password' => [
				'label' => 'Password',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak Boleh Kosong.',
				]
			],
		];

		if (!$this->validate($validationRules)) {
			return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
		}

		$recaptchaResponse = $this->request->getPost('g-recaptcha-response');
		$recaptcha = new Recaptcha('6LdRsI8qAAAAAC7XtjjW2zwYCr3hK-xpOCMUcxYx');
		$result = $recaptcha->verify($recaptchaResponse);

		if (!$result->isSuccess()) {
			return redirect()->back()->withInput()->with('error', 'Validasi ReCaptcha Gagal!');
		}

		$username = esc($this->request->getPost('username'));
		$password = esc($this->request->getPost('password'));

		$user = $this->userModel->where(['username' => $username])->first();

		if ($user) {
			if (password_verify($password, $user->password)) {
				session()->set([
					'isLogin' => true,
					'id_user' => $user->id,
					'nama_lengkap' => $user->nama_lengkap,
					'username' => $user->username,
					'role' => $user->role,
					'email' => $user->email,
					'jabatan_id' => $user->jabatan_id,
					'foto' => $user->foto,
				]);
				return redirect()->to(base_url('/dashboard'))->with('toastr', [
					'type' => 'success',
					'message' => 'Login Berhasil! Selamat datang, ' . $user->nama_lengkap
				]);
			} else {
				return redirect()->back()->withInput()->with('error', 'Password Salah!');
			}
		} else {
			return redirect()->back()->with('toastr', [
				'type' => 'error',
				'message' => 'Username Tidak Ditemukan!'
			]);
		}
	}

	public function logout()
	{
		session()->remove([
			'isLogin',
			'id_user',
			'nama_lengkap',
			'username',
			'role',
			'email',
			'jabatan_id',
			'foto',
		]);

		return redirect()->to(base_url('/'))->with('toastr', [
			'type' => 'warning',
			'message' => 'Anda telah Logout!'
		]);
	}
}
