<?php

namespace App\Http\Controllers;

use App\Services\BookService;

class BookListController extends Controller
{
    private $BookService;

    public function __construct(BookService $BookService)
    {
        $this->BookService = $BookService;
    }

    public function index()
    {
        // データ取得
        $list = $this->BookService->getList();

        return view('book_list', ['list' => $list]);
    }
}
