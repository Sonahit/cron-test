<?php

namespace App\Facade;

use App\Http\Router as RouterInstance;

class Router extends Facade
{

    protected static function getClass()
    {
        return new RouterInstance();
    }
}
