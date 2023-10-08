<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('admin/', 'UserController::index', ['filter' => 'role:admin'])
//$routes->get('user/', 'UserController::index', ['filter' => 'role:user'])

 
$routes->get('/', 'Home::index');

//route user 
$routes->get('user/beranda', 'User::index');
$routes->get('user/data/d', 'User::datad');
$routes->get('user/data/f', 'User::dataf');
$routes->post('user/data/f', 'User::savedataf');
$routes->get('user/data/t', 'User::datat');
$routes->post('user/data/t', 'User::savedatat');
$routes->get('user/lain/l', 'User::lainl');
$routes->post('user/lain/l', 'User::savelainl');
$routes->get('user/lain/p', 'User::lainp');
$routes->post('user/lain/p', 'User::savelainp');
$routes->get('user/laporan/b', 'User::laporanb');
$routes->get('user/laporan/j', 'User::laporanj');
$routes->get('user/laporan/l', 'User::laporanl');
$routes->get('user/laporan/p', 'User::laporanp');
$routes->get('user/pinjaman/d', 'User::pinjamand');
$routes->get('user/pinjaman/t', 'User::pinjamant');
$routes->post('user/pinjaman/t', 'User::savepinjamant');
$routes->get('user/tabungan/d', 'User::tabungand');
$routes->get('user/tabungan/t', 'User::tabungant');
$routes->post('user/tabungan/t', 'User::savetabungant');