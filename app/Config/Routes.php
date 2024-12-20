<?php

//use CodeIgniter\Router\RouteCollection;

/**
 * //var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
//$routes->add('admin/login','Admin/Admin::login');
// $routes->get('/', 'LoginRegister::login');
// $routes->get('/LoginRegister/login', 'LoginRegister::login');
// $routes->add('/LoginRegister/register', 'LoginRegister::register');

namespace Config;
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Pages');
$routes->setDefaultMethod('home');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Pages::home');

$routes->get('/login', 'Pages::login');
$routes->get('/register', 'Pages::register');
$routes->get('/profile', 'Pages::profile');
$routes->get('/wishlist', 'Wishlist::index');
$routes->post('wishlsit/addWishlist/(:num)', 'Wishlist::addWishlist/$product_id');
$routes->get('wishlsit/delWishlist/(:num)', 'Wishlist::delWishlist/$product_id');
$routes->get('/callback', 'Auth::callback');
$routes->get('product/(:segment)', 'Product::detail/$id');

$routes->get('/cart', 'Cart::index');
$routes->get('cart/delcart/(:num)', 'Cart::delcart/$product_id');
$routes->get('/cart/clear', 'Cart::clearcart');

$routes->get('/admin/login', 'AdminPages::index');
$routes->get('/admin/dashboard', 'AdminPages::dashboard');
$routes->get('/admin/productmanager', 'AdminPages::managepd');
$routes->get('admin/product-list', 'AdminPages::productlist');
$routes->get('admin/product/detail/(:num)', 'Product::viewadmin/$1');