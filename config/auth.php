<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'pengguna', 
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'pengguna',
            'hash' => false,
        ],
    ],

    'providers' => [
        'pengguna' => [ 
            'driver' => 'eloquent',
            'model' => App\Models\Pengguna::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'pengguna',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,
];
