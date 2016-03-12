<?php

namespace App\Provider;

use App\Mapper\NotesMapper;
use App\Service\NotesService;
use Silex\Application;
use Silex\ServiceProviderInterface;

class NotesServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['notes.service'] = $app->share(function (Application $app) {
            return new NotesService($app, new NotesMapper());
        });
    }

    public function boot(Application $app)
    {
        // TODO: Implement boot() method.
    }

}