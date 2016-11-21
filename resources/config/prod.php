<?php

require_once __DIR__ . '/common.php';

$app['log.level'] = Monolog\Logger::ERROR;
$app['log.dir'] = __DIR__ . "/../../../shared/var/logs/";

$app['db.options'] = [
  "driver" => "pdo_mysql",
  "user" => getenv('DB_USER'),
  "password" => getenv('DB_PASSWORD'),
  "dbname" => getenv('DB_DATABASE'),
  "host" => getenv('DB_HOST'),
];

$app['debug'] = false;

$app['api.cache_dir'] = __DIR__ . "/../../../shared/var/cache/";
