<?php

define("ROOT_PATH", __DIR__ . "/..");

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = new \Dotenv\Dotenv(__DIR__.'/../');
$dotenv->load();

// bootstrap
$app = require_once __DIR__ . '/../src/app.php';

require_once __DIR__ . '/../src/middleware.php';
require_once __DIR__ . '/../src/routes.php';

// $app->run();
$app['http_cache']->run();
