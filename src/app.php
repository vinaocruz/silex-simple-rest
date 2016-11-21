<?php

use Silex\Provider\HttpCacheServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Carbon\Carbon;

$app = new Silex\Application();

require_once __DIR__ . '/../resources/config/'.getenv('APP_ENV').'.php';

//silex provider
$app->register(new ServiceControllerServiceProvider());
$app->register(new ValidatorServiceProvider());
$app->register(new HttpCacheServiceProvider(), [
	"http_cache.cache_dir" => $app['api.cache_dir'],
]);
$app->register(new MonologServiceProvider(), [
    "monolog.logfile"   => $app['log.dir'] . Carbon::now($app['api.timezone'])->format("Y-m-d") . ".log",
    "monolog.level"     => $app["log.level"],
    "monolog.name"      => "application",
]);

//third party provider
$app->register(new \App\Provider\NotesServiceProvider());

return $app;