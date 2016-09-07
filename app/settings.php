<?php
return [
    'settings' => [
        'displayErrorDetails' => true,
        'doctrine' => [
            'meta' => [
                'entity_path' => [
                    'app/src/Entity'
                ],
                'auto_generate_proxies' => true,
                'proxy_dir' => __DIR__ . '/../cache/proxies',
                'cache' => null,
            ],
            'connection' => [
                'driver' => 'pdo_mysql',
                'host' => 'localhost',
                'dbname' => 'safe-inga',
                'user' => 'root',
                'password' => '',
                'charset'  => 'utf8',
                'driverOptions' => [ 1002 => 'SET NAMES utf8']
            ]
        ]
    ],
];
