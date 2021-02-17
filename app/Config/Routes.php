<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(true);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('login', 'Login::index');
$routes->get('signup', 'Signup::index');
$routes->get('operator/dashboard', 'Operator/Dashboard::index');
$routes->get('operator/profil', 'Operator/Profil::index');
$routes->get('operator/siswa', 'Operator/Siswa::index');
$routes->get('operator/siswa/list', 'Operator/Siswa::index');
$routes->get('operator/siswa/add', 'Operator/Siswa::add');
$routes->get('operator/siswa/edit', 'Operator/Siswa::edit');
$routes->get('operator/guru/list', 'Operator/Guru::index');
$routes->get('operator/guru/add', 'Operator/Guru::add');
$routes->get('operator/guru/edit', 'Operator/Guru::edit');
$routes->get('operator/pegawai/list', 'Operator/Pegawai::index');
$routes->get('operator/pegawai/add', 'Operator/Pegawai::add');
$routes->get('operator/pegawai/edit', 'Operator/Pegawai::edit');
$routes->get('operator/jurusan/list', 'Operator/Jurusan::index');
$routes->get('operator/jurusan/add', 'Operator/Jurusan::add');
$routes->get('operator/jurusan/edit', 'Operator/Jurusan::edit');
$routes->get('operator/mapel/list', 'Operator/Mapel::index');
$routes->get('operator/mapel/add', 'Operator/Mapel::add');
$routes->get('operator/mapel/edit', 'Operator/Mapel::edit');
$routes->get('operator/wali/list', 'Operator/Wali::index');
$routes->get('operator/wali/add', 'Operator/Wali::add');
$routes->get('operator/wali/edit', 'Operator/Wali::edit');
$routes->get('operator/alumni/list', 'Operator/Alumni::index');
$routes->get('operator/alumni/add', 'Operator/Alumni::add');
$routes->get('operator/alumni/edit', 'Operator/Alumni::edit');
$routes->get('/', 'Home::index');


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
