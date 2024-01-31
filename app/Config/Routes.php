<?php

use App\Controllers\Homecontroller;
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
    //highlighted_program
    $routes->get('highlighted_program', 'HomeController::highlighted_program');
    // add_highlighted
    $routes->post('add_highlighted', 'HomeController::add_highlighted');
    
});

$routes->group('api', function($routes){
    // retrive_data
    $routes->get('retrive_data', 'Homecontroller::retrive_data');
});