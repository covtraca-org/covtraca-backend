<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Report;

class ReportApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_report()
    {
        $report = factory(Report::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/reports', $report
        );

        $this->assertApiResponse($report);
    }

    /**
     * @test
     */
    public function test_read_report()
    {
        $report = factory(Report::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/reports/'.$report->id
        );

        $this->assertApiResponse($report->toArray());
    }

    /**
     * @test
     */
    public function test_update_report()
    {
        $report = factory(Report::class)->create();
        $editedReport = factory(Report::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/reports/'.$report->id,
            $editedReport
        );

        $this->assertApiResponse($editedReport);
    }

    /**
     * @test
     */
    public function test_delete_report()
    {
        $report = factory(Report::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/reports/'.$report->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/reports/'.$report->id
        );

        $this->response->assertStatus(404);
    }
}
