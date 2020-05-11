<?php namespace Tests\Repositories;

use App\Models\CountReport;
use App\Repositories\CountReportRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CountReportRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CountReportRepository
     */
    protected $countReportRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->countReportRepo = \App::make(CountReportRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_count_report()
    {
        $countReport = factory(CountReport::class)->make()->toArray();

        $createdCountReport = $this->countReportRepo->create($countReport);

        $createdCountReport = $createdCountReport->toArray();
        $this->assertArrayHasKey('id', $createdCountReport);
        $this->assertNotNull($createdCountReport['id'], 'Created CountReport must have id specified');
        $this->assertNotNull(CountReport::find($createdCountReport['id']), 'CountReport with given id must be in DB');
        $this->assertModelData($countReport, $createdCountReport);
    }

    /**
     * @test read
     */
    public function test_read_count_report()
    {
        $countReport = factory(CountReport::class)->create();

        $dbCountReport = $this->countReportRepo->find($countReport->id);

        $dbCountReport = $dbCountReport->toArray();
        $this->assertModelData($countReport->toArray(), $dbCountReport);
    }

    /**
     * @test update
     */
    public function test_update_count_report()
    {
        $countReport = factory(CountReport::class)->create();
        $fakeCountReport = factory(CountReport::class)->make()->toArray();

        $updatedCountReport = $this->countReportRepo->update($fakeCountReport, $countReport->id);

        $this->assertModelData($fakeCountReport, $updatedCountReport->toArray());
        $dbCountReport = $this->countReportRepo->find($countReport->id);
        $this->assertModelData($fakeCountReport, $dbCountReport->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_count_report()
    {
        $countReport = factory(CountReport::class)->create();

        $resp = $this->countReportRepo->delete($countReport->id);

        $this->assertTrue($resp);
        $this->assertNull(CountReport::find($countReport->id), 'CountReport should not exist in DB');
    }
}
