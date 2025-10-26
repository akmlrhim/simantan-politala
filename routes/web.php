<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\TelahanStafController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware('throttle:60,1')->group(function () {

	Route::get('/', [AuthController::class, 'index'])->name('login');
	Route::post('login', [AuthController::class, 'login'])->name('login.process');
	Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

	Route::middleware('auth')->group(function () {

		Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

		// khusus admin
		Route::middleware('role:Admin')->group(function () {
			Route::resource('users', UserController::class);
			Route::resource('jenis-surat', JenisSuratController::class);
			Route::resource('jabatan', JabatanController::class);
		});

		// surat keluar 
		Route::prefix('surat-keluar')->name('surat-keluar.')->group(function () {
			Route::middleware('role:Ketua Jurusan,Admin')->group(function () {
				Route::resource('/', SuratKeluarController::class)->parameters(['' => 'surat_keluar']);
				Route::get('file/{id}', [SuratKeluarController::class, 'file'])->name('file');
			});

			Route::resource('/', SuratKeluarController::class)
				->except(['index'])
				->parameters(['' => 'surat_keluar'])
				->middleware('role:Admin');
		});

		// surat masuk 
		Route::prefix('surat-masuk')->name('surat-masuk.')->group(function () {
			Route::middleware('role:Ketua Jurusan,Admin')->group(function () {
				Route::get('/', [SuratMasukController::class, 'index'])->name('index');
				Route::get('telahan-staf/{id}', [SuratMasukController::class, 'telahanStaf'])->name('telahan-staf');
			});

			Route::resource('/', SuratMasukController::class)
				->except(['index'])
				->parameters(['' => 'surat_masuk'])
				->middleware('role:Admin');
		});

		// telahan staf 
		Route::prefix('telahan-staf')->name('telahan-staf.')->group(function () {
			Route::get('/', [TelahanStafController::class, 'index'])->name('index')->middleware('role:Ketua Jurusan,Admin');

			Route::middleware('role:Admin')->controller(TelahanStafController::class)->group(function () {
				Route::get('create/{surat_masuk}', 'create')->name('create');
				Route::post('/', 'store')->name('store');
				Route::get('/{telahan_staf}/edit', 'edit')->name('edit');
				Route::put('/{telahan_staf}', 'update')->name('update');
			});
		});

		// disposisi 
		Route::prefix('disposisi')->name('disposisi.')->group(function () {
			Route::resource('/', DisposisiController::class)
				->parameters(['' => 'disposisi'])
				->except('create', 'destroy', 'show')
				->middleware('role:Sespim/Direktur,Admin');

			Route::get('create/{id}', [DisposisiController::class, 'create'])
				->name('create')
				->middleware('role:Sespim/Direktur');

			Route::get('detail/{id}', [DisposisiController::class, 'detail'])
				->name('detail');

			Route::get('penerima', [DisposisiController::class, 'disposisiPenerima'])->name('penerima');

			Route::patch('update/status/{id}', [DisposisiController::class, 'updateStatus'])->name('update-status');
		});

		// profil 
		Route::prefix('profil')->controller(ProfileController::class)->group(function () {
			Route::get('/', 'index')->name('profil.index');
			Route::patch('update', 'updateProfil')->name('profil.update');
			Route::patch('update-password', 'updatePassword')->name('profil.update-password');
		});
	});
});
