<?php

namespace App\Facade;

use App\Database\Model as ModelInstance;

class Model extends Facade
{

    protected static function getClass()
    {
        return new ModelInstance();
    }
}
