#!/user/bin/env php
<?php

define("ROOT_PATH", __DIR__ . "/");

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = new \Dotenv\Dotenv(__DIR__.'/../');
$dotenv->load();

//bootstrap
$app = require_once __DIR__ . '/src/app.php';

require_once __DIR__ . '/src/middleware.php';
require_once __DIR__ . '/src/routes.php';

$app->register(
    new \Knp\Provider\ConsoleServiceProvider(),
    array(
        'console.name' => 'ConsoleApp',
        'console.version' => '1.0.0',
        'console.project_directory' => __DIR__ . '/sc/console'
    )
);

$app['console']->add(new \Console\Test());

$app['console']->run();
