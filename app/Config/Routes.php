<?php

use App\Controllers\Contacts;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [Contacts::class, 'index']);
