<?php

use App\Controllers\Contacts;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group('', function ($routes) {
  $routes->get('/', [Contacts::class, 'index']);
  $routes->get('/add', [Contacts::class, 'addPage']);
  $routes->post('/add', [Contacts::class, 'add']);
  $routes->get('/edit/(:num)', [Contacts::class, 'editPage']);
  $routes->post('/edit/(:num)', [Contacts::class, 'update']);
  $routes->get('/delete/(:num)', [Contacts::class, 'delete']);
});
