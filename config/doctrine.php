<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = [__DIR__ . '/../domain/Entities'];
$isDevMode = $_ENV['APP_ENV'] !== 'production';

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);

// Parámetros de conexión
$dbParams = [
    'driver'   => $_ENV['DB_DRIVER'],      // 'pdo_mysql', 'pdo_pgsql', 'pdo_sqlite', etc.
    'host'     => $_ENV['DB_HOST'] ?? null,
    'port'     => $_ENV['DB_PORT'] ?? null,
    'user'     => $_ENV['DB_USER'] ?? null,
    'password' => $_ENV['DB_PASS'] ?? null,
    'dbname'   => $_ENV['DB_NAME'] ?? null,
    'path'     => $_ENV['DB_PATH'] ?? null // solo para SQLite
];

return EntityManager::create($dbParams, $config);
