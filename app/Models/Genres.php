<?php

namespace App\Models;

use App\Facade\Database;
use App\Facade\Model;

class Genres extends Model
{

    public function getById(int $id)
    {
        return Database::select('genres', '*', ['id' => $id])[0];
    }
}
