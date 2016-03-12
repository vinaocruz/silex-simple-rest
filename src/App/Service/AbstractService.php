<?php

namespace App\Service;

use Silex\Application;

abstract class AbstractService
{
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }
}