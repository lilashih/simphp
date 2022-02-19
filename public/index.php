<?php

error_reporting(1);

require __DIR__.'/../bootstrap/app.php';
$route = require __DIR__.'/../app/route.php';

echo (new Lilashih\Simphp\Route\Router($route))->response();