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
});
