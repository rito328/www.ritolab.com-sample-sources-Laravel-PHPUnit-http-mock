<?php
declare(strict_types=1);

namespace Tests\Unit;

use Mockery;
use Tests\TestCase;
use App\Services\BookDataAccess;
use App\services\BookService;

class BookServiceTest extends TestCase
{
    /** @var Mockery */
    protected $repositoryMock;

    /** @var BookService */
    protected $BookService;

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

        // BookServiceインスタンス生成
        $this->BookService = app(BookService::class);
    }

    public function tearDown(): void
    {
        parent::tearDown();
        Mockery::close();
    }

    /**
     * @test
     * @group unit
     * @group service
     * @group BookService
     * @group getList
     */
    public function getList_返り値がBookListオブジェクトであること(): void
    {
        $data = $this->BookService->getList();

        $this->assertInstanceOf(\App\Entities\BookList::class, $data);
    }

    /**
     * @test
     * @group unit
     * @group service
     * @group BookService
     * @group getList
     */
    public function getList_必要なプロパティを保持していること(): void
    {
        $data = $this->BookService->getList();

        $this->assertObjectHasAttribute('id', $data->getIterator()[0]);
        $this->assertObjectHasAttribute('name', $data->getIterator()[0]);
        $this->assertObjectHasAttribute('author', $data->getIterator()[0]);
    }
}
