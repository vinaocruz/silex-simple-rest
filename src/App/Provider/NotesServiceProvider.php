<?php

namespace App\Provider;

use Silex\Application;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use App\Mapper\NotesMapper;
use App\Service\NotesService;

class NotesServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['notes.service'] = function () use ($app) {
            return new NotesService($app, new NotesMapper());
        };
    }
}