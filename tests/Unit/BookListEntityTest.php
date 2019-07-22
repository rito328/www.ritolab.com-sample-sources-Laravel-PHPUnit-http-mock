<?php
declare(strict_types=1);

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookListEntityTest extends TestCase
{
    private $bookList;

    public function setUp(): void
    {
        parent::setUp();

        $this->bookList = app(\App\Entities\BookList::class);

    }

    public function tearDown(): void
    {
        parent::tearDown();
        unset($this->bookList);
    }

    /**
     * @test
     * @group unit
     * @group Entity
     * @group BookListEntity
     */
    public function BookListオブジェクトはループ可能なArrayObjectであること()
    {
        $this->assertTrue(is_subclass_of($this->bookList, 'IteratorAggregate'));
    }

    /**
     * @test
     * @group unit
     * @group Entity
     * @group BookListEntity
     */
    public function set_アイテムの追加が正常に行えること()
    {
        $data = [];
        $data[] = factory(\App\Book::class, 'test_book_mock_data_1')->make()->toArray();

        $this->bookList->set($data);

        $this->assertEquals(1, $this->bookList->count());
    }

    /**
     * @test
     * @expectedException \Exception
     * @group unit
     * @group Entity
     * @group BookListEntity
     */
    public function set_ループで回せない形式（単体の配列）でのアイテム追加は例外が発生すること()
    {
        $data = factory(\App\Book::class, 'test_book_mock_data_1')->make()->toArray();

        $this->bookList->set($data);
    }



}
