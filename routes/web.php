<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisSuratController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.process');
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('isLoggedIn');

Route::middleware('isLoggedIn')->group(function () {

	Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

	Route::resource('users', UserController::class);
	Route::resource('jenis-surat', JenisSuratController::class);

	Route::prefix('surat-keluar')->name('surat-keluar.')->group(function () {
		Route::resource('/', SuratKeluarController::class)->parameters(['' => 'surat_keluar']);
		Route::get('file/{id}', [SuratKeluarController::class, 'file'])->name('file');
	});

	Route::resource('surat-masuk', SuratMasukController::class);
});
