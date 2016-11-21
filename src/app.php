<?php

use Silex\Provider\HttpCacheServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Carbon\Carbon;

$app = new Silex\Application();

//silex provider
$app->register(new ServiceControllerServiceProvider());
$app->register(new ValidatorServiceProvider());
$app->register(new HttpCacheServiceProvider(), [
	"http_cache.cache_dir" => ROOT_PATH . "/var/cache"
]);
$app->register(new MonologServiceProvider(), [
    "monolog.logfile"   => ROOT_PATH . "/var/logs/" . Carbon::now('America/Bahia')->format("Y-m-d") . ".log",
    "monolog.level"     => $app["log.level"],
    "monolog.name"      => "application",
]);

//third party provider
$app->register(new \App\Provider\NotesServiceProvider());

return $app;