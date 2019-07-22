<?php
declare(strict_types=1);

namespace App\Entities;

class BookList implements \IteratorAggregate
{
    private $bookList;

    public function __construct()
    {
        $this->bookList = new \ArrayObject();
    }

    /**
     * @param array $books
     * @throws \Exception
     */
    public function set(array $books): void
    {
        if (array_keys($books)[0] !== 0) {
            throw new \Exception('データ形式が正しくありません');
        }

        foreach ($books as $b) {
            $this->add(new Book($b['id'], $b['name'], $b['author']['name']));
        }
    }

    /**
     * @param Book $book
     */
    private function add(Book $book): void
    {
        $this->bookList[] = $book;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return $this->bookList->count();
    }

    /**
     * @return \ArrayIterator
     */
    public function getIterator(): \ArrayIterator
    {
        return $this->bookList->getIterator();
    }
}
