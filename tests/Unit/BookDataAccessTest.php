<?php

namespace Tests\Unit;

use Tests\TestCase;

abstract class BookDataAccessTest extends TestCase
{
    /**
     * @test
     * @group unit
     * @group DataAccess
     * @group Book
     * @group getList
     */
    public function getList_データ取得が正常に行われること()
    {
        factory(\App\Author::class, 'test_author_data_1')->create();
        factory(\App\Book::class, 'test_book_data_1')->create();

        $list = $this->Book->getList();

        $this->assertCount(1, $list);
    }

    /**
     * @test
     * @group unit
     * @group DataAccess
     * @group Book
     * @group getList
     */
    public function getList_必要なプロパティがセットされていること()
    {
        factory(\App\Author::class, 'test_author_data_1')->create();
        factory(\App\Book::class, 'test_book_data_1')->create();

        $list = $this->Book->getList();

        $expected = [
            'id', 'name', 'author_id', 'author'
        ];
        $this->assertSame($expected, array_keys($list[0]));

        $expected = [
            'id', 'name'
        ];
        $this->assertSame($expected, array_keys($list[0]['author']));
    }

}
