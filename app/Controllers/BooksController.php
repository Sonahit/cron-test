<?php

namespace App\Controllers;

use App\Http\Request;
use App\Models\Authors;
use App\Models\Books;
use App\Models\Genres;
use \Mpdf\Mpdf;

use function App\view;
use function App\config;
use function App\http_response;

class BooksController extends Controller
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
        $data['priceList'] = json_decode(http_response("https://api.exchangeratesapi.io/latest?base=RUB"));

        return view('main', $data);
    }

    public function prepareBooks(Request $request, $limit = null, $sort = null, $direction = null)
    {
        //    Для отображения всех книг нужно изменять $limit через запрос $url?limit=10
        $sort = $request->get('sort') ?: 'price';
        $direction = $request->get('direction') ?: 'asc';
        $limit = (int)$request->get('limit') ?: 3;
        $books = Books::getBooks();

        $dataBooks = array_map(function ($book) {
            $bookInfo = [];
            $bookInfo['book'] = $book;
            $author = Authors::getById((int)$book['author_id']);
            $genre = Genres::getById((int)$book['genre_id']);
            $bookInfo['author'] = $author;
            $bookInfo['genre'] = $genre;
            return $bookInfo;
        }, $books);

        $originalBooks = $dataBooks;

        usort($dataBooks, function ($a, $b) use ($sort, $direction) {
            if ($sort === 'price') {
                return $direction === 'asc'
                ? $a['book']['price'] > $b['book']['price']
                : $a['book']['price'] < $b['book']['price'];
            } elseif ($sort === 'author') {
                    return $direction === 'asc'
                ? strcmp($a['author']['name'], $b['author']['name'])
                : -strcmp($a['author']['name'], $b['author']['name']);
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
