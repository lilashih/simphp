<?php

date_default_timezone_set('Asia/Taipei');

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$databases = config('database');
$capsule = new Illuminate\Database\Capsule\Manager();
foreach ($databases as $name => $database) {
    $capsule->addConnection([
        'driver' => 'mysql',
        'host' => "{$database['host']}:{$database['port']}",
        'database' => $database['database'],
        'username' => $database['username'],
        'password' => $database['password'],
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => '',
    ], $name);
}
$capsule->setAsGlobal();
$capsule->bootEloquent();
unset($databases);