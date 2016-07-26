<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application();

require __DIR__ . '/../resources/config/main.php';
require __DIR__ . '/../src/middleware.php';
require __DIR__ . '/../src/providers.php';
require __DIR__ . '/../src/app.php';

$app['http_cache']->run();
