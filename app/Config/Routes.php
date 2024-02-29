<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Start::index');
$routes->get('/register', 'Start::register');
$routes->get('/login', 'Start::login');
$routes->get('/auth/activate/(:any)', 'Auth::activate/$1');

$routes->get('/home', 'Home::index');

$routes->post('/auth/valid_register', 'Auth::valid_register');
$routes->post('/auth/valid_login', 'Auth::valid_login');
$routes->get('/logout', 'Auth::logout');

$routes->get('/upload', 'Start::upload');
$routes->post('/upload/save', 'Start::save');
$routes->get('/editprofile', 'Start::editprofile');
$routes->post('/editprofile/save', 'Start::editprofilesave');

$routes->get('/profile', 'Start::profile');
$routes->get('/post/(:num)', 'Start::post/$1');
$routes->get('user/album', 'Start::album');
$routes->post('/komentar/save/(:num)', 'Start::komentarsave/$1');

