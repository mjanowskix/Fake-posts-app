<?php
return [
    'app' => [
        'environment' => getenv('APP_ENV', 'development'),
        'template_path' => getenv('APP_TEMPLATE_PATH', '../resources/views'),
        'url' => getenv('APP_URL', 'http://127.0.0.1'),
    ]
];
