<?php

require_once __DIR__ . '/../vendor/autoload.php';

// Crear app desde bootstrap
$app = require __DIR__ . '/../bootstrap.php';

// Cargar rutas
(require __DIR__ . '/../presentation/Routes/web.php')($app);

// Ejecutar
$app->run();