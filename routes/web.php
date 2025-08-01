<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\TelahanStafController;
use App\Http\Controllers\UserController;
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

	Route::prefix('telahan-staf')->controller(TelahanStafController::class)->group(function () {
		Route::get('/', 'index')->name('telahan-staf.index');
		Route::post('store', 'store')->name('telahan-staf.store');
		Route::get('surat-masuk/{id}', 'create')->name('telahan-staf.surat-masuk');
		Route::get('surat-masuk/edit/{id}', 'edit')->name('telahan-staf.surat-masuk.edit');
		Route::put('surat-masuk/update/{id}', 'update')->name('telahan-staf.surat-masuk.update');
	});
});
