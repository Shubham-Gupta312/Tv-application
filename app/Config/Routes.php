<?php

use App\Controllers\Homecontroller;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::login');
// $routes->get('/', 'HomeController::index');

$routes->group('admin', function ($routes) {
    // register
    $routes->get('register', 'AuthController::register');
    $routes->post('register', 'AuthController::register');
    // login
    $routes->get('login', 'AuthController::login');
    $routes->post('login', 'AuthController::login');
    // logout
    $routes->get('logout', 'AuthController::logout');
});

$routes->group('admin', ['filter' => 'isAdminLogin'], function ($routes) {
    // admin page (admin cms)
    $routes->get('basavatv', 'Homecontroller::basavatv');
    //highlighted_program
    $routes->get('highlighted_program', 'HomeController::highlighted_program');
    // add_highlighted
    $routes->post('add_highlighted', 'HomeController::add_highlighted');
    // setHighlightActiveStatus
    $routes->post('setHighlightActiveStatus', 'HomeController::setHighlightActiveStatus');
    // delete_HighlightProgram
    $routes->post('delete_HighlightProgram', 'HomeController::delete_HighlightProgram');
    // edit_HighlightProgramData
    $routes->post('edit_HighlightProgramData', 'HomeController::edit_HighlightProgramData');
    // update_HighlightProgramData
    $routes->post('update_HighlightProgramData', 'HomeController::update_HighlightProgramData');
    // precious Program
    $routes->get('precious_program', 'HomeController::precious_program');
    // add_precious
    $routes->post('add_precious', 'HomeController::add_precious');
    // setProductActiveStatus
    $routes->post('setPreciousActiveStatus', 'HomeController::setActiveStatus');
    // delete_preciousProgram
    $routes->post('delete_preciousProgram', 'HomeController::delete_preciousProgram');
    // edit_preciousProgramData
    $routes->post('edit_preciousProgramData', 'HomeController::edit_preciousProgramData');
    // update_preciousProgramData
    $routes->post('update_preciousProgramData', 'HomeController::update_preciousProgramData');
    // product
    $routes->get('product', 'ProductController::product');
    // add_product
    $routes->post('add_product', 'ProductController::add_product');
    // active or inactive
    $routes->post('setActiveStatus', 'ProductController::setActiveStatus');
    // edit_data
    $routes->post('edit_data', 'ProductController::edit_product');
    // Update data
    $routes->post('update_data', 'ProductController::update_data');
    // delete product
    $routes->post('delete_product', 'ProductController::product_delete');
    // admin data
    $routes->get('admin_data', 'Homecontroller::admin');
    //banners
    $routes->get('banners', 'Homecontroller::banners');
    // add banner
    $routes->post('add_banner', 'Homecontroller::add_banner');
    // setBannerActiveStatus
    $routes->post('setBannerActiveStatus', 'Homecontroller::setBannerActiveStatus');
    // delete_Banner
    $routes->post('delete_Banner', 'Homecontroller::delete_Banner');
    // edit_BannerData
    $routes->post('edit_BannerData', 'Homecontroller::edit_BannerData');
    // update_BannerData
    $routes->post('update_BannerData', 'Homecontroller::update_BannerData');
    // products
    $routes->get('enquiry_data', 'ProductController::enquiry_data');
    //live tv
    $routes->get('livetv', 'LiveTvController::livetv');
    // add live tv
    $routes->post('add_livetv', 'LiveTvController::add_livetv');
    // update live tv
    $routes->post('update_livetv', 'LiveTvController::add_livetv');
    // count 
    $routes->get('totalProduct', 'ProductController::totalProduct');
    $routes->get('totalAdmin', 'Homecontroller::totalAdmin');
    $routes->get('totalPreciousProgram', 'Homecontroller::totalPreciousProgram');
    $routes->get('totalHighlightProgram', 'Homecontroller::totalHighlightProgram');
    $routes->get('totalBanner', 'Homecontroller::totalBanner');
    $routes->get('totalEnquiryProducts', 'Homecontroller::totalEnquiryProducts');
});

$routes->group('api', function ($routes) {
    // retrive_data
    $routes->get('retrive_data', 'Homecontroller::retrive_data');
    $routes->get('fetch_data', 'APIController::fetch_data');
    $routes->get('home_api', 'APIController::home_api');
    // precious program
    $routes->get('precious', 'Homecontroller::precious');
    $routes->get('fetch_precious', 'APIController::fetch_precious');
    // products
    $routes->get('fetch_product', 'ProductController::fetch_product');
    $routes->get('retrive_product', 'APIController::retrive_product');
    $routes->get('all_program', 'APIController::all_program');
    // banner
    $routes->get('fetch_banner', 'Homecontroller::fetch_banner');
    $routes->get('retrive_banner', 'APIController::retrive_banner');
    // admin 
    $routes->get('admin_info', 'Homecontroller::admin_info');
    // enquiry product
    $routes->post('enquiry_product', 'APIController::enquiry_product');
    $routes->get('fetch_enquiryProduct', 'ProductController::fetch_enquiryProduct');
    // live tv
    $routes->get('retrive_livetv', 'LiveTvController::retrive_livetv');
    $routes->get('live_tv', 'APIController::live_tv');

});