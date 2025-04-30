<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'AuthController::index');
$routes->post('authenticate', 'AuthController::authenticate');
$routes->post('logout', 'AuthController::logout', ['filter' => ['auth']]);

$routes->get('dashboard', 'DashboardController::index', ['filter' => ['auth']]);

$routes->group('', ['filter' => ['auth']], function ($routes) {

	$routes->group('surat-masuk', function ($routes) {
		$routes->get('/', 'SuratMasukController::index');
		$routes->get('show', 'SuratMasukController::show');
		$routes->get('tambah', 'SuratMasukController::create');
		$routes->post('tambah', 'SuratMasukController::save');
		$routes->get('(:num)', 'SuratMasukController::edit/$1');
		$routes->put('(:num)', 'SuratMasukController::update/$1');
		$routes->delete('(:num)', 'SuratMasukController::delete/$1');
		$routes->get('telaah-staf/(:num)', 'SuratMasukController::telaahStaf/$1');
	});

	$routes->group('surat-keluar', function ($routes) {
		$routes->get('/', 'SuratKeluarController::index');
		$routes->get('show', 'SuratKeluarController::show');
		$routes->get('detail/(:num)', 'SuratKeluarController::detail/$1');
		$routes->get('tambah', 'SuratKeluarController::create');
		$routes->post('tambah', 'SuratKeluarController::save');
		$routes->get('(:num)', 'SuratKeluarController::edit/$1');
		$routes->put('(:num)', 'SuratKeluarController::update/$1');
		$routes->delete('(:num)', 'SuratKeluarController::delete/$1');
	});

	$routes->group('klasifikasi-surat', function ($routes) {
		$routes->get('/', 'KlasifikasiSuratController::index');
		$routes->get('show', 'KlasifikasiSuratController::show');
		$routes->get('tambah', 'KlasifikasiSuratController::create');
		$routes->post('tambah', 'KlasifikasiSuratController::save');
		$routes->get('(:num)', 'KlasifikasiSuratController::edit/$1');
		$routes->put('(:num)', 'KlasifikasiSuratController::update/$1');
		$routes->delete('(:num)', 'KlasifikasiSuratController::delete/$1');
	});

	$routes->group('telaah-staf', function ($routes) {
		$routes->get('/', 'TelaahStafController::index');
		$routes->get('show', 'TelaahStafController::show');
		$routes->get('surat-masuk/show', 'TelaahStafController::suratMasuk');
		$routes->get('surat-masuk/(:num)', 'TelaahStafController::create/$1');
		$routes->get('surat-masuk/edit/(:num)', 'TelaahStafController::edit/$1');
		$routes->post('surat-masuk', 'TelaahStafController::save');
		$routes->put('surat-masuk/(:num)', 'TelaahStafController::update/$1');
	});

	$routes->group('jabatan', function ($routes) {
		$routes->get('/', 'JabatanController::index');
		$routes->get('show', 'JabatanController::show');
		$routes->get('tambah', 'JabatanController::create');
		$routes->post('tambah', 'JabatanController::save');
		$routes->get('(:num)', 'JabatanController::edit/$1');
		$routes->put('(:num)', 'JabatanController::update/$1');
		$routes->delete('(:num)', 'JabatanController::delete/$1');
	});

	$routes->group('user', static function ($routes) {
		$routes->get('/', 'UserController::index');
		$routes->get('show', 'UserController::show');
		$routes->get('detail/(:num)', 'UserController::detail/$1');
		$routes->get('tambah', 'UserController::create');
		$routes->post('tambah', 'UserController::save');
		$routes->get('(:num)', 'UserController::edit/$1');
		$routes->put('(:num)', 'UserController::update/$1');
		$routes->delete('(:num)', 'UserController::delete/$1');
	});
});
