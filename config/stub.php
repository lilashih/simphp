<?php

return [

    'controller' => [
        'enable' => true,
        'folder' => 'app/Http/Controllers/Api',
        'stub' => 'vendor/lilashih/simphp-framework/src/stubs/controller.stub',
    ],

    'model' => [
        'enable' => true,
        'folder' => 'app/Models',
        'stub' => 'vendor/lilashih/simphp-framework/src/stubs/model.stub',
    ],

    'repository' => [
        'enable' => true,
        'folder' => 'app/Repositories',
        'stub' => 'vendor/lilashih/simphp-framework/src/stubs/repository.stub',
    ],

    'request' => [
        'enable' => true,
        'folder' => 'app/Http/Requests',
        'stub' => 'vendor/lilashih/simphp-framework/src/stubs/request.stub',
    ],

    'resource' => [
        'enable' => true,
        'folder' => 'app/Http/Resources',
        'stub' => 'vendor/lilashih/simphp-framework/src/stubs/resource.stub',
    ],

    'migration' => [
        'enable' => true,
        'folder' => 'database/migrations',
        'stub' => 'vendor/lilashih/simphp-framework/src/stubs/migration.stub',
    ],

    'test' => [
        'enable' => true,
        'folder' => 'tests/Feature/Api',
        'stub' => 'vendor/lilashih/simphp-framework/src/stubs/test.stub',
    ],

];