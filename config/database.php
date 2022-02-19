<?php

return [
    
    'default' => [
        'host' => _env('DATABASE_HOST', '127.0.0.1'),
        'port' => _env('DATABASE_PORT', '3306'),
        'username' => _env('DATABASE_USERNAME', ''),
        'password' => _env('DATABASE_PASSWORD', ''),
        'database' => _env('DATABASE_DB', 'test'),
    ],
    
    'second_db' => [
        'host' => _env('DATABASE_HOST', '127.0.0.1'),
        'port' => _env('DATABASE_PORT', '4306'),
        'username' => _env('DATABASE_USERNAME', ''),
        'password' => _env('DATABASE_PASSWORD', ''),
        'database' => 'second_db',
    ],
];
