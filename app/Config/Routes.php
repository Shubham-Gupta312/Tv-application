<?php

use App\Controllers\Homecontroller;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::login');


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
    // precious Program
    $routes->get('precious_program', 'HomeController::precious_program');
    // add_precious
    $routes->post('add_precious', 'HomeController::add_precious');
    // product
    $routes->get('product', 'ProductController::product');
    // add_product
    $routes->post('add_product', 'ProductController::add_product');
    // admin data
    $routes->get('admin_data', 'Homecontroller::admin');
    //banners
    $routes->get('banners', 'Homecontroller::banners');
    // add banner
    $routes->post('add_banner', 'Homecontroller::add_banner');
    // products
    $routes->get('enquiry_data', 'ProductController::enquiry_data');
});

$routes->group('api', function($routes){
    // retrive_data
    $routes->get('retrive_data', 'Homecontroller::retrive_data');
    $routes->get('fetch_data', 'APIController::fetch_data');
    // precious program
    $routes->get('precious', 'Homecontroller::precious');
    $routes->get('fetch_precious', 'APIController::fetch_precious');
    // products
    $routes->get('fetch_product', 'ProductController::fetch_product');
    $routes->get('retrive_product', 'APIController::retrive_product');
    // banner
    $routes->get('fetch_banner', 'Homecontroller::fetch_banner');
    $routes->get('retrive_banner', 'APIController::retrive_banner');
    // admin 
    $routes->get('admin_info', 'Homecontroller::admin_info');

});