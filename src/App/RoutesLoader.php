<?php

namespace App;

use Silex\Application;

class RoutesLoader
{
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->instantiateControllers();

    }

    private function instantiateControllers()
    {
        $this->app['notes.controller'] = $this->app->share(function () {
            return new Controllers\NotesController($this->app['notes.service']);
        });
    }

    public function bindRoutesToControllers()
    {
        $routing = $this->app['notes.controller']->routes($this->app);

        $this->app->mount($this->app["api.endpoint"].'/'.$this->app["api.version"], $routing);
    }
}

