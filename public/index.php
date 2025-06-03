<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require __DIR__ . '/../bootstrap.php';

// Cargar rutas
(require __DIR__ . '/../interfaces/Http/Routes/web.php')($app);

// Correr la aplicación
$app->run();
