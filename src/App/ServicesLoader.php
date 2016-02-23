<?php

namespace App;

use App\Mapper\NoteMapper;
use Silex\Application;

class ServicesLoader
{
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function bindServicesIntoContainer()
    {
        $this->app['notes.service'] = $this->app->share(function () {
            return new Service\NotesService(new NoteMapper());
        });
    }
}
