<?php

namespace App\Provider;

use Silex\Application;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Annotation\Service\NoteService;
use Annotation\Repository\NoteRepository;

class NotesServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['notes.service'] = function () use ($app) {
            return new NoteService($app, new NoteRepository());
        };
    }
}
