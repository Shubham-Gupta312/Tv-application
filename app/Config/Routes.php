<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Homecontroller::index');


$routes->group('admin',  function ($routes) {
    // register
    $routes->get('register', 'AuthController::register');
    $routes->post('register','AuthController::register');

    // login
    $routes->get('login', 'AuthController::login');
    $routes->post('login', 'AuthController::login');

    // logout
    $routes->get('logout', 'AuthController::logout');

    // admin page (admin cms)
    $routes->get('basavatv', 'Homecontroller::basavatv', ['filter' => 'isAdminLogin']);
});