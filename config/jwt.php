<?php

return [

    'model' => \App\Models\User::class,

    'key' => '123456',

    'algorithm' => ['HS256'],

    // expired at ... seconds
    'expiration' => 12 * 60 * 60,

    'test_token' => _env('TEST_TOKEN', 'test'),
];
