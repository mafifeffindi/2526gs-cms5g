<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Landing (tampilan awal website)
$routes->get('/', 'Landing::index');

// (opsional) About
$routes->get('about', 'Pages::about');

// CRUD Products
$routes->get('products', 'Products::index');
$routes->get('products/new', 'Products::new');
$routes->post('products', 'Products::create');
$routes->get('products/(:num)/edit', 'Products::edit/$1');
$routes->post('products/(:num)', 'Products::update/$1');
$routes->post('products/(:num)/delete', 'Products::delete/$1');
