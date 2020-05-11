<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CountReport;

class CountReportApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_count_report()
    {
        $countReport = factory(CountReport::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/count_reports', $countReport
        );

        $this->assertApiResponse($countReport);
    }

    /**
     * @test
     */
    public function test_read_count_report()
    {
        $countReport = factory(CountReport::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/count_reports/'.$countReport->id
        );

        $this->assertApiResponse($countReport->toArray());
    }

    /**
     * @test
     */
    public function test_update_count_report()
    {
        $countReport = factory(CountReport::class)->create();
        $editedCountReport = factory(CountReport::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/count_reports/'.$countReport->id,
            $editedCountReport
        );

        $this->assertApiResponse($editedCountReport);
    }

    /**
     * @test
     */
    public function test_delete_count_report()
    {
        $countReport = factory(CountReport::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/count_reports/'.$countReport->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/count_reports/'.$countReport->id
        );

        $this->response->assertStatus(404);
    }
}
