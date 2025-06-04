<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group('api', function($routes) {
    $routes->get('temperature', 'Api\Temperature::index');
    $routes->post('temperature', 'Api\Temperature::create');
    $routes->put('temperature/(:num)', 'Api\Temperature::update/$1');
    $routes->delete('temperature/(:num)', 'Api\Temperature::delete/$1');

    $routes->get('energy', 'Api\Energy::index');
    $routes->post('energy', 'Api\Energy::create');
    $routes->put('energy/(:num)', 'Api\Energy::update/$1');
    $routes->delete('energy/(:num)', 'Api\Energy::delete/$1');

    $routes->get('humidity', 'Api\Humidity::index');
    $routes->post('humidity', 'Api\Humidity::create');
    $routes->put('humidity/(:num)', 'Api\Humidity::update/$1');
    $routes->delete('humidity/(:num)', 'Api\Humidity::delete/$1');

    $routes->get('security', 'Api\Security::index');
    $routes->post('security', 'Api\Security::create');
    $routes->put('security/(:num)', 'Api\Security::update/$1');
    $routes->delete('security/(:num)', 'Api\Security::delete/$1');
});