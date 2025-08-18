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
use App\Models\Disposisi;
use App\Models\TelahanStaf;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.process');
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function () {

	Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

	Route::resource('users', UserController::class);
	Route::resource('jenis-surat', JenisSuratController::class);
	Route::resource('jabatan', JabatanController::class);

	Route::prefix('surat-keluar')->name('surat-keluar.')->group(function () {
		Route::resource('/', SuratKeluarController::class)->parameters(['' => 'surat_keluar']);
		Route::get('file/{id}', [SuratKeluarController::class, 'file'])->name('file');
	});

	Route::prefix('surat-masuk')->name('surat-masuk.')->group(function () {
		Route::resource('/', SuratMasukController::class)->parameters(['' => 'surat_masuk']);
		Route::get('telahan-staf/{id}', [SuratMasukController::class, 'telahanStaf'])->name('telahan-staf');
	});

	Route::prefix('telahan-staf')->name('telahan-staf.')->group(function () {
		Route::resource('/', TelahanStafController::class)->parameters(['' => 'telahan-staf'])->except('destroy', 'create');
		Route::get('create/{id}', [TelahanStafController::class, 'create'])->name('create');
	});

	Route::prefix('disposisi')->name('disposisi.')->group(function () {
		Route::resource('/', DisposisiController::class)->parameters(['' => 'disposisi'])->except('create', 'destroy', 'show');
		Route::get('create/{id}', [DisposisiController::class, 'create'])->name('create');
		Route::get('detail/{id}', [DisposisiController::class, 'detail'])->name('detail');
		Route::get('penerima', [DisposisiController::class, 'disposisiPenerima'])->name('penerima');
		Route::patch('update/status/{id}', [DisposisiController::class, 'updateStatus'])->name('update-status');
	});

	Route::prefix('profil')->controller(ProfileController::class)->group(function () {
		Route::get('/', 'index')->name('profil.index');
		Route::patch('update', 'updateProfil')->name('profil.update');
		Route::patch('update-password', 'updatePassword')->name('profil.update-password');
		Route::get('log-aktivitas', 'activityLog')->name('profil.log-aktivitas');
		Route::delete('log-aktivitas', 'deleteActivityLog')->name('profil.delete-log-aktivitas');
	});
});
