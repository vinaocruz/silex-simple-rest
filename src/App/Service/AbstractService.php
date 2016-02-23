<?php

namespace App\Services;

abstract class AbstractService
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

}
