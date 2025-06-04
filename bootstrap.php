<?php

use DI\Container;
use Slim\Factory\AppFactory;
use Dotenv\Dotenv;

// Autoload de Composer (solo si no lo hizo index.php)
require_once __DIR__ . '/vendor/autoload.php';

// Cargar variables de entorno
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

// Crear contenedor y registrar en Slim
$container = new Container();
AppFactory::setContainer($container);
$app = AppFactory::create();

// Middlewares
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

// Doctrine
$entityManager = require __DIR__ . '/config/doctrine.php';
$container->set('EntityManager', $entityManager);

// Devolver la app
return $app;
