<?php
$routes->get('students', 'Students::index');
$routes->get('students/create', 'Students::create');
$routes->post('students', 'Students::store');
$routes->get('students/(:num)/edit', 'Students::edit/$1');
$routes->post('students/(:num)/update', 'Students::update/$1');
$routes->get('students/(:num)/delete', 'Students::delete/$1');
