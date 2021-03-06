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
$routes->setDefaultController('Login');
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

// ==============================================================
// PUblic's Router -->
// ==============================================================
$routes->get('login', 'Login::index');
$routes->post('login/auth', 'Login::auth');

$routes->get('logout', 'Login::logout');
$routes->get('signup', 'Signup::index');
$routes->get('/', 'Home::index');
// ==============================================================
// End of PUblic's Router -->
// ==============================================================

// ==============================================================
// Operator's Router -->
// ==============================================================
$routes->get('operator/dashboard', 'Operator/Dashboard::index/', ['filter' => 'authoperator']);
$routes->get('operator/profil', 'Operator/Profil::index', ['filter' => 'authoperator']);
$routes->post('operator/profil/resetpassword/(:segment)', 'Operator/Profil::resetpassword/$1', ['filter' => 'authoperator']);
$routes->post('operator/profil/resetpassword/reset/(:segment)', 'Operator/Profil::reset/$1', ['filter' => 'authoperator']);

$routes->get('operator/siswa/list', 'Operator/Siswa::index', ['filter' => 'authoperator']);
$routes->get('operator/siswa/add', 'Operator/Siswa::add', ['filter' => 'authoperator']);
$routes->get('operator/siswa/edit', 'Operator/Siswa::edit', ['filter' => 'authoperator']);

$routes->get('operator/guru/list', 'Operator/Guru::index', ['filter' => 'authoperator']);
$routes->get('operator/guru/add', 'Operator/Guru::add', ['filter' => 'authoperator']);
$routes->get('operator/guru/add/store', 'Operator/Guru::store', ['filter' => 'authoperator']);
$routes->post('operator/guru/edit/(:segment)', 'Operator/Guru::edit/$1', ['filter' => 'authoperator']);
$routes->post('operator/guru/edit/update/(:segment)', 'Operator/Guru::update/$1', ['filter' => 'authoperator']);
$routes->get('operator/guru/list/delete/(:segment)', 'Operator/Guru::delete/$1', ['filter' => 'authoperator']);

$routes->get('operator/pegawai/list', 'Operator/Pegawai::index', ['filter' => 'authoperator']);
$routes->get('operator/pegawai/add', 'Operator/Pegawai::add', ['filter' => 'authoperator']);
$routes->get('operator/pegawai/edit', 'Operator/Pegawai::edit', ['filter' => 'authoperator']);

$routes->get('operator/kelulusan/list', 'Operator/Kelulusan::index', ['filter' => 'authoperator']);
$routes->get('operator/kelulusan/add', 'Operator/Kelulusan::add', ['filter' => 'authoperator']);
$routes->get('operator/kelulusan/edit', 'Operator/Kelulusan::edit', ['filter' => 'authoperator']);

$routes->get('operator/alumni/list', 'Operator/Alumni::index', ['filter' => 'authoperator']);
$routes->get('operator/alumni/add', 'Operator/Alumni::add', ['filter' => 'authoperator']);
$routes->get('operator/alumni/edit', 'Operator/Alumni::edit', ['filter' => 'authoperator']);

$routes->get('operator/user/list', 'Operator/user::index', ['filter' => 'authoperator']);
$routes->get('operator/user/edit', 'Operator/user::edit', ['filter' => 'authoperator']);

$routes->get('operator/info/add', 'Operator/Info::add', ['filter' => 'authoperator']);
$routes->get('operator/info/store', 'Operator/Info::store', ['filter' => 'authoperator']);
$routes->post('operator/info/delete/(:segment)', 'Operator/Info::delete/$1', ['filter' => 'authoperator']);
$routes->post('operator/info/edit/(:segment)', 'Operator/Info::edit/$1', ['filter' => 'authoperator']);
$routes->get('operator/info/update/(:segment)', 'Operator/Info::update/$1', ['filter' => 'authoperator']);

$routes->post('operator/perubahan/detail/(:segment)', 'Operator/Perubahan::index/$1', ['filter' => 'authoperator']);
// ==============================================================
// End of Operator's Router -->
// ==============================================================

// ==============================================================
// Pimpinan's Router -->
// ==============================================================
$routes->get('pimpinan/dashboard', 'Pimpinan/Dashboard::index', ['filter' => 'authpimpinan']);
$routes->get('pimpinan/profil', 'Pimpinan/Profil::index', ['filter' => 'authpimpinan']);
$routes->get('pimpinan/siswa/list', 'Pimpinan/Siswa::index', ['filter' => 'authpimpinan']);
$routes->get('pimpinan/guru/list', 'Pimpinan/Guru::index', ['filter' => 'authpimpinan']);
$routes->get('pimpinan/pegawai/list', 'Pimpinan/Pegawai::index', ['filter' => 'authpimpinan']);
$routes->get('pimpinan/alumni/list', 'Pimpinan/Alumni::index', ['filter' => 'authpimpinan']);
$routes->get('pimpinan/kelulusan/list', 'pimpinan/Kelulusan::index', ['filter' => 'authpimpinan']);

$routes->get('pimpinan/info/add', 'pimpinan/Info::add', ['filter' => 'authpimpinan']);
$routes->get('pimpinan/info/store', 'pimpinan/Info::store', ['filter' => 'authpimpinan']);
$routes->post('pimpinan/info/delete/(:segment)', 'pimpinan/Info::delete/$1', ['filter' => 'authpimpinan']);
$routes->post('pimpinan/info/edit/(:segment)', 'pimpinan/Info::edit/$1', ['filter' => 'authpimpinan']);
$routes->get('pimpinan/info/update/(:segment)', 'pimpinan/Info::update/$1', ['filter' => 'authpimpinan']);

$routes->get('pimpinan/perubahan/store', 'pimpinan/perubahan::store', ['filter' => 'authpimpinan']);
// ==============================================================
// End of Pimpinan's Router -->
// ==============================================================

// ==============================================================
// Pimpinan's Router -->
// ==============================================================
$routes->get('user/dashboard', 'User/Dashboard::index', ['filter' => 'authuser']);
$routes->get('user/profil', 'User/Profil::index', ['filter' => 'authuser']);
$routes->get('user/siswa/list', 'User/Siswa::index', ['filter' => 'authuser']);
$routes->get('user/guru/list', 'User/Guru::index', ['filter' => 'authuser']);
$routes->get('user/pegawai/list', 'User/Pegawai::index', ['filter' => 'authuser']);
$routes->get('user/alumni/list', 'User/Alumni::index', ['filter' => 'authuser']);
$routes->post('user/kelulusan/page', 'User/Dashboard::page', ['filter' => 'authuser']);
// ==============================================================
// End of Pimpinan's Router -->
// ==============================================================

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
