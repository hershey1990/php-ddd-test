<?php
return [
    'app_name' => 'PHP DDD Application',
    'app_env' => 'development',
    'app_debug' => true,
    'app_url' => 'http://localhost/php-ddd-app',
    'database' => [
        'driver' => 'pdo_mysql',
        'host' => '127.0.0.1',
        'port' => '3306',
        'dbname' => 'php_ddd_app',
        'user' => 'root',
        'password' => '',
    ],
    'doctrine' => [
        'metadata_dirs' => [
            'src/Infrastructure/Doctrine/User',
        ],
        'entity_manager' => [
            'connection' => 'default',
            'configuration' => 'default',
        ],
    ],
];