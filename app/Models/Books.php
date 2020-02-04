<?php

namespace App\Models;

use App\Facade\Database;
use App\Facade\Model;

class Books extends Model
{
    public function getBooks()
    {
        return Database::select('books', [
            'name',
            'author_id',
            'genre_id',
            'price',
            'description',
            'image',
            'year' => Database::raw('YEAR(<publication_date>)')
        ]);
    }

    public function getBooksWith($sort = 'price', $asc = 'desc', $limit = 3)
    {
        return Database::select('books', [
            'name',
            'author_id',
            'genre_id',
            'price',
            'description',
            'image',
            'year' => Database::raw('YEAR(<publication_date>)')
        ], [
            'ORDER' => [$sort => strtoupper($asc)],
            'LIMIT' => $limit
        ]);
    }
}
