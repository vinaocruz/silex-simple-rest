<?php

$app['api.version'] = "v1";
$app['api.endpoint'] = "/api";

$app['app.timezone'] = 'America/Bahia';

date_default_timezone_set($app['app.timezone']);
