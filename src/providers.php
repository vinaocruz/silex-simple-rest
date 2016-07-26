<?php

use Silex\Provider\HttpCacheServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Carbon\Carbon;

//silex provider
$app->register(new ServiceControllerServiceProvider());
$app->register(new ValidatorServiceProvider());
$app->register(new HttpCacheServiceProvider(), array("http_cache.cache_dir" => ROOT_PATH . "/storage/cache",));
$app->register(new MonologServiceProvider(), array(
    "monolog.logfile"   => ROOT_PATH . "/storage/logs/" . Carbon::now('America/Bahia')->format("Y-m-d") . ".log",
    "monolog.level"     => $app["log.level"],
    "monolog.name"      => "application"
));

//third party provider
$app->register(new \App\Provider\NotesServiceProvider());
