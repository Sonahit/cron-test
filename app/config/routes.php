<?php


return [
    '/' => [
        'GET' => 'BooksController{index}'
    ],
    '/pdf' => [
        'GET' => 'BooksController{pdf}'
    ],
    '/checkout' => [
        'GET' => 'CheckoutController{index}'
    ],
];
