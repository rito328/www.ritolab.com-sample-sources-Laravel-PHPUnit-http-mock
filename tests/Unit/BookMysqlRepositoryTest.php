<?php

namespace Tests\Unit;

use App\Book;
use App\Entities\BookList;
use App\Services\BookDataAccess;
use App\Repositories\BookMysqlRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;

class BookMysqlRepositoryTest extends BookDataAccessTest
{
    use RefreshDatabase;

    protected $Book;

    public function setUp(): void
    {
        parent::setUp();

        $this->app->bind(BookDataAccess::class, function($app) {
            return new BookMysqlRepository(new Book, new BookList);
        });

        $this->Book = app(BookMysqlRepository::class);
    }

    public function tearDown(): void
    {
        Artisan::call('migrate:refresh');
        parent::tearDown();
    }
}
