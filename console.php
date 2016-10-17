#!/user/bin/env php
<?php

require_once __DIR__ . '/vendor/autoload.php';

define("ROOT_PATH", __DIR__ . "/");

$app = new Silex\Application();

require __DIR__ . '/resources/config/main.php';

require __DIR__ . '/src/middleware.php';
require __DIR__ . '/src/providers.php';
require __DIR__ . '/src/routes.php';

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
