<?php
use DI\Container;
use Slim\Factory\AppFactory;
use Dotenv\Dotenv;

// Autoload de Composer
require __DIR__ . '/vendor/autoload.php';

// Cargar variables de entorno desde .env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Crear el contenedor de dependencias (PHP-DI)
$container = new Container();

// Registrar el contenedor en Slim
AppFactory::setContainer($container);

// Crear la app Slim
$app = AppFactory::create();

// Registrar Middleware aquí si querés (JWT, CORS, etc.)
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

// EntityManager (Doctrine)
$entityManager = require __DIR__ . '/config/doctrine.php';
$container->set('EntityManager', $entityManager);

// Devolvés la app para usarla en index.php
return $app;

