<?php
declare(strict_types=1);

namespace App\Entities;

class Book
{
    private $id;
    private $name;
    private $author;

    public function __construct(int $id, string $name, string $author)
    {
        $this->id     = $id;
        $this->name   = $name;
        $this->author = $author;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }
}
