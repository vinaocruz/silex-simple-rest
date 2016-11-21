<?php

require_once __DIR__ . '/common.php';

$app['log.level'] = Monolog\Logger::DEBUG;
$app['log.dir'] = __DIR__ . "/../../var/logs/";

$app['db.options'] = array(
  'driver' => 'pdo_sqlite',
  'path' => realpath(ROOT_PATH . '/app.db'),
);

$app['debug'] = true;

$app['api.cache_dir'] = __DIR__ . "/../../var/cache/";
