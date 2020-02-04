<?php

namespace App\Facade;

use App\Database\Database as DatabaseInstance;

class Database extends Facade
{

    protected static function getClass()
    {
        return new DatabaseInstance();
    }
}
