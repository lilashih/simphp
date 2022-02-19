<?php

use Lilashih\Simphp\Route\Route;

$route = new Route();

$route->get('', 'HomeController@index');

$route->setPrefix('api');

$route->post('auth/login', 'Api\\AuthController@login');
$route->apiResource('users', 'Api\\UserController');

return $route;
