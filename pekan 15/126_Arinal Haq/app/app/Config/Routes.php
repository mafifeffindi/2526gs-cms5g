<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// Jalur untuk menampilkan data
$routes->get('/mahasiswa', 'Mahasiswa::index');

// Jalur untuk menyimpan data
$routes->post('/mahasiswa/tambah', 'Mahasiswa::tambah');

// Jalur untuk menghapus data
$routes->get('/mahasiswa/hapus/(:num)', 'Mahasiswa::hapus/$1');
