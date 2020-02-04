<?php

namespace App\Models;

use App\Facade\Database;
use App\Facade\Model;

class Authors extends Model
{

    public function getById(int $id)
    {
        return Database::select('authors', '*', ['id' => $id])[0];
    }
}
