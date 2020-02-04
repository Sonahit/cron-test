<?php

namespace App\Controllers;

use App\Http\Request;
use App\Models\Authors;
use App\Models\Books;
use App\Models\Genres;
use \Mpdf\Mpdf;

use function App\view;
use function App\config;

class BooksController
{
    public function index(Request $request)
    {

        $data = [];
        $data['books'] = [];
        $data['currencyData'] = config('currency.php');
        $data['foreignCurrency'] = $request->get('currency') ?: 'EUR';

        [$dataBooks, $originalBooks] = $this->prepareBooks($request);

        $data['books'] = $dataBooks;
        $data['originalBooks'] = $originalBooks;

        return view('main', $data);
    }

    public function prepareBooks(Request $request, $limit = null, $sort = null, $direction = null)
    {
        //    Для отображения всех книг нужно изменять $limit через запрос $url?limit=10
        $sort = $request->get('sort') ?: 'price';
        $direction = $request->get('direction') ?: 'asc';
        $limit = (int)$request->get('limit') ?: 3;
        $books = Books::getBooks();
        $dataBooks = $books['book'];

        foreach ($books as $book) {
            $index = count($dataBooks);
            $dataBooks[$index]['book'] = $book;
            $author = Authors::getById($book['author_id']);
            $genre = Genres::getById($book['genre_id']);
            $dataBooks[$index]['author'] = $author;
            $dataBooks[$index]['genre'] = $genre;
        }

        $originalBooks = $dataBooks;

        usort($dataBooks, function ($a, $b) use ($sort, $direction) {
            if ($sort === 'price') {
                return $direction === 'asc'
                ? $a['book']['price'] > $b['book']['price']
                : $a['book']['price'] < $b['book']['price'];
            } elseif ($sort === 'author') {
                return $direction === 'asc'
                ? strcmp($a['author']['price'], $b['author']['price'])
                : ! strcmp($a['author']['price'], $b['author']['price']);
            }
            return 0;
        });

        if ($limit > 0) {
            $dataBooks = array_slice($dataBooks, 0, $limit);
        }
        return [$dataBooks, $originalBooks];
    }

    public function pdf(Request $request)
    {
        //Со всеми полученными из БД
        [$books, $originalBooks] = $this->prepareBooks($request);

        $data = [];
        $data['books'] = $originalBooks;
        $data['originalBooks'] = $originalBooks;

        $pdf = new Mpdf();
        $pdf->SetAutoPageBreak(true);
        $pdf->WriteHtml(view('pdf/books', $data));
        return $pdf->output();
    }
}
