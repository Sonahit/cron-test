<?php

namespace App\Database;

use Medoo\Medoo;

class Database extends Medoo
{

    public function __construct()
    {
        $config = \App\config('database.php');
        parent::__construct($config);
    }
}
