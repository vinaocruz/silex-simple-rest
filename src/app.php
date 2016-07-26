<?php

use Silex\Application;

date_default_timezone_set($app['app.timezone']);

define("ROOT_PATH", __DIR__ . "/..");

//load routes
$routesLoader = new App\RoutesLoader($app);
$routesLoader->bindRoutesToControllers();

return $app;
