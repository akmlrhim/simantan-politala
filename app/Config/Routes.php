<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'AuthController::index');
$routes->post('authenticate', 'AuthController::authenticate');
$routes->post('logout', 'AuthController::logout');

$routes->get('dashboard', 'DashboardController::index');

$routes->group('surat-masuk', function ($routes) {
	$routes->get('/', 'SuratMasukController::index');
});

$routes->group('surat-keluar', function ($routes) {
	$routes->get('/', 'SuratKeluarController::index');
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
