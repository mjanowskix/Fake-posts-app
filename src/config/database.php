<?php
return [
    'database' => [
        'driver' => getenv('DB_DRIVER', 'mysql'),
        'host' => getenv('DB_HOST', '127.0.0.1'),
        'port' => getenv('DB_PORT', '3306'),
        'username' => getenv('DB_USERNAME', 'root'),
        'password' => getenv('DB_PASSWORD'),
        'database' =>  getenv('DB_DATABASE', 'auth'),
    ]
];
