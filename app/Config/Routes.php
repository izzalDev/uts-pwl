<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::index');
$routes->post('/login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/user', 'DashboardController::index', ['filter'=>'auth']);
$routes->get('/admin', 'DashboardController::index', ['filter'=>'auth']);
