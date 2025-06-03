<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = [__DIR__ . '/../domain/Entities']; // Ruta donde están tus entidades
$isDevMode = true;

$dbParams = [
    'driver'   => 'pdo_mysql',
    'user'     => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
    'dbname'   => $_ENV['DB_NAME'],
    'host'     => $_ENV['DB_HOST'],
];

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
return EntityManager::create($dbParams, $config);
