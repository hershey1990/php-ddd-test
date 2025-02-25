<?php
return [
    'doctrine' => [
        'connection' => [
            'driver'   => 'pdo_mysql',
            'host'     => getenv('DB_HOST'),
            'dbname'   => getenv('DB_NAME'),
            'user'     => getenv('DB_USER'),
            'password' => getenv('DB_PASSWORD'),
        ],
        'config' => [
            'metadata_dirs' => [
                __DIR__ . '/../src/Infrastructure/Doctrine/User',
            ],
            'proxy_dir' => __DIR__ . '/../var/proxies',
            'proxy_namespace' => 'Proxies',
            'auto_generate_proxy_classes' => true,
        ],
    ],
];