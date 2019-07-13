<?php
declare(strict_types=1);

namespace App\Services;

use App\Entities\Book;
use App\Entities\BookList;

class BookService implements BookDataAccess
{
    /** @var BookDataAccess */
    private $BookDataAccess;

    /** @var BookList */
    private $BookList;

    public function __construct(BookDataAccess $BookDataAccess, BookList $BookList)
    {
        $this->BookDataAccess = $BookDataAccess;
        $this->BookList       = $BookList;
    }

    public function getList(): BookList
    {
        $data = $this->BookDataAccess->getList();

        array_map(function($d) {
            $this->BookList->add(new Book($d['id'], $d['name'], $d['author']['name']));
        }, $data);

        return $this->BookList;
    }
}
