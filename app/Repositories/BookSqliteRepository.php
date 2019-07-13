<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Services\BookDataAccess;
use App\Book;

class BookSqliteRepository implements BookDataAccess
{
    protected $Book;

    private $connection = 'sqlite';

    public function __construct(Book $Book)
    {
        $this->Book = $Book;
    }

    public function getList(): array
    {
        return $this->Book::on($this->connection)->with('author:id,name')->get()->toArray();
    }
}
