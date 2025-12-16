<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Landing::index');

// --- Warung Kopi Landing + CRUD Menus ---
$routes->get('/', 'Landing::index');

$routes->get('menus', 'Menus::index');
$routes->get('menus/new', 'Menus::new');
$routes->post('menus', 'Menus::create');
$routes->get('menus/(:num)/edit', 'Menus::edit/$1');
$routes->post('menus/(:num)', 'Menus::update/$1');
$routes->post('menus/(:num)/delete', 'Menus::delete/$1');
