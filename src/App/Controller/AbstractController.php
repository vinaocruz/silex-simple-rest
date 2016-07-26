<?php

namespace App\Controller;

use Silex\Application;

abstract class AbstractController
{
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }
}