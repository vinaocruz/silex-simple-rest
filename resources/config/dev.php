<?php

require __DIR__ . '/common.php';

$app['log.level'] = Monolog\Logger::DEBUG;

$app['db.options'] = array(
  'driver' => 'pdo_sqlite',
  'path' => realpath(ROOT_PATH . '/app.db'),
);

$app['debug'] = true;
