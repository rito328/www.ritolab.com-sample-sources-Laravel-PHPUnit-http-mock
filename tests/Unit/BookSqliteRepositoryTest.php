<?php

namespace Tests\Unit;

use App\Book;
use App\Entities\BookList;
use App\Services\BookDataAccess;
use App\Repositories\BookSqliteRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;

class BookSqliteRepositoryTest extends BookDataAccessTest
{
    use RefreshDatabase;

    protected $Book;

    public function setUp(): void
    {
        parent::setUp();

        // データベースをSQLiteへ変更
        config(['database.default' => 'sqlite']);

        // マイグレーション実行
        Artisan::call('migrate:refresh');

        $this->app->bind(BookDataAccess::class, function($app) {
            return new BookSqliteRepository(new Book, new BookList);
        });

        $this->Book = app(BookSqliteRepository::class);
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }
}
