<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'DashboardController::index');

$routes->group('surat_masuk', function ($routes) {
	$routes->get('/', 'SuratMasukController::index');
});

$routes->group('surat_keluar', function ($routes) {
	$routes->get('/', 'SuratKeluarController::index');
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
