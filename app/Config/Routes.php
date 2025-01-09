<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Users::index');


$routes->post('auth/register', 'AuthController::register');
$routes->post('auth/login', 'AuthController::login');

$routes->get('auth/register', 'AuthController::showRegisterForm');
$routes->get('auth/login', 'AuthController::showLoginForm');

$routes->get('/topik', 'TopicsController::showTopics');
$routes->get('/topik/(:num)', 'TopicsController::showTopicDetail/$1');
