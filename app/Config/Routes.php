<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Start::index');
$routes->get('/register', 'Start::register');
$routes->get('/login', 'Start::login');

$routes->get('/home', 'Home::index');

$routes->post('/auth/valid_register', 'Auth::valid_register');
$routes->post('/auth/valid_login', 'Auth::valid_login');
$routes->get('/logout', 'Auth::logout');

$routes->get('/upload', 'Start::upload');
$routes->post('/upload/save', 'Start::save');
$routes->get('/profile', 'Start::profile');
$routes->get('/editprofile', 'Start::editprofile');

$routes->get('/post', 'Start::post');
