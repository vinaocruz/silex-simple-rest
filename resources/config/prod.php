<?php

require __DIR__ . '/common.php';

$app['log.level'] = Monolog\Logger::ERROR;

$app['db.options'] = array(
  "driver" => "pdo_mysql",
  "user" => "root",
  "password" => "root",
  "dbname" => "prod_db",
  "host" => "prod_host",
);

$app['debug'] = false;
