<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

// insert Property Details form HTML
$routes->get('/', 'Home::insertPropertyDetails');
// insert Property Details form action
$routes->post('/', 'Home::insertPropertyDetails');
// Show all listings for Admin
$routes->get('/listingsAdmin', 'Home::showListingsAdmin');
// Show all listings for User
$routes->get('/listingsUser', 'Home::showListingsUser');
// update/$id
$routes->post('/update', 'Home::update');
// delete\$id
$routes->delete('/delete/(:num)', 'Home::delete_property/$1');