<?php


$pdo = (new DbConnection\DbConnection)->get_db();
return
[
    'paths' => [
        'migrations' => '../../components/db_migration/migrations/',
        'seeds' => '../../components/db_migration/seeds/'
    ],
    'environments' => [
        'default_migration_table' => 'migrations',
        'default_environment' => 'development',
        'production' => [
            'name' => 'us409094_mvc',
            'connection' => $pdo,

        ],
        'development' => [
            'adapter' => 'mysql',
            'host' => 'localhost',
            'name' => 'mvc',
            'user' => 'root',
            'pass' => 'root',
            'port' => '3306',
            'charset' => 'utf8',
        ],
        'testing' => [
            'adapter' => 'mysql',
            'host' => 'localhost',
            'name' => 'mvc',
            'user' => 'root',
            'pass' => 'root',
            'port' => '3306',
            'charset' => 'utf8',
        ]
    ],
    'version_order' => 'creation'
];
