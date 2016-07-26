<?php

use App\Controller\NotesController;
use Silex\Application;

date_default_timezone_set($app['app.timezone']);

define("ROOT_PATH", __DIR__ . "/..");

//load routes
$app->mount($app["api.endpoint"].'/'.$app["api.version"], NotesController::routes($app));

return $app;
