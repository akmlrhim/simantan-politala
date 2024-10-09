<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Dashboard::index');

$routes->group('surat_masuk', function ($routes) {
	$routes->get('/', 'SuratMasuk::index');
});

$routes->group('surat_keluar', function ($routes) {
	$routes->get('/', 'SuratKeluar::index');
});
