<?php

namespace Tests\Feature;

use Mockery;
use App\Services\BookDataAccess;
use Tests\TestCase;

class BookListControllerTest extends TestCase
{
    /** @var Mockery */
    protected $repositoryMock;

    public function setUp(): void
    {
        parent::setUp();

        // BookListの疑似データを作成
        $books = [];
        $books[] = factory(\App\Book::class, 'test_book_mock_data_1')->make()->toArray();

        // リポジトリのデータアクセスをモック
        $this->repositoryMock = Mockery::mock(BookDataAccess::class);
        $this->repositoryMock->shouldReceive('getList')->andReturn($books);
        $this->app->instance(BookDataAccess::class, $this->repositoryMock);
    }

    public function tearDown(): void
    {
        parent::tearDown();
        Mockery::close();
    }

    /**
     * @test
     * @group http
     * @group booklist
     * @group getlist
     */
    public function getList_データ取得が正常に行えビューが表示されること()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @test
     * @group http
     * @group booklist
     * @group getlist
     */
    public function getList_ビューへ渡すデータが意図した構造であること()
    {
        $response = $this->get('/');

        $response->assertViewHas('list');
    }
}
