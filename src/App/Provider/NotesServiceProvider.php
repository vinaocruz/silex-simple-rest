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
        $this->app['notes.service'] = $this->app->share(function () {
            return new NotesService($this->app, new NotesMapper());
        });
    }

    public function boot(Application $app)
    {
        // TODO: Implement boot() method.
    }

}