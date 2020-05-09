<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateReportAPIRequest;
use App\Http\Requests\API\UpdateReportAPIRequest;
use App\Models\Report;
use App\Repositories\ReportRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
use Geocoder\Query\GeocodeQuery;
use Geocoder\Query\ReverseQuery;

/**
 * Class ReportController
 * @package App\Http\Controllers\API
 */

class ReportAPIController extends AppBaseController
{
    /** @var  ReportRepository */
    private $reportRepository;

    public function __construct(ReportRepository $reportRepo)
    {
        $this->reportRepository = $reportRepo;
    }

    /**
     * Display a listing of the Report.
     * GET|HEAD /reports
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $reports = $this->reportRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($reports->toArray(), 'Reports retrieved successfully');
    }

    /**
     * Store a newly created Report in storage.
     * POST /reports
     *
     * @param CreateReportAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateReportAPIRequest $request)
    {
        $input = $request->all();

        $report = $this->reportRepository->create($input);

        return $this->sendResponse($report->toArray(), 'Report saved successfully');
    }

    /**
     * Display the specified Report.
     * GET|HEAD /reports/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Report $report */
        $report = $this->reportRepository->find($id);

        if (empty($report)) {
            return $this->sendError('Report not found');
        }

        return $this->sendResponse($report->toArray(), 'Report retrieved successfully');
    }

    /**
     * Update the specified Report in storage.
     * PUT/PATCH /reports/{id}
     *
     * @param int $id
     * @param UpdateReportAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReportAPIRequest $request)
    {
        $input = $request->all();

        /** @var Report $report */
        $report = $this->reportRepository->find($id);

        if (empty($report)) {
            return $this->sendError('Report not found');
        }

        $report = $this->reportRepository->update($input, $id);

        return $this->sendResponse($report->toArray(), 'Report updated successfully');
    }

    /**
     * Remove the specified Report from storage.
     * DELETE /reports/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Report $report */
        $report = $this->reportRepository->find($id);

        if (empty($report)) {
            return $this->sendError('Report not found');
        }

        $report->delete();

        return $this->sendSuccess('Report deleted successfully');
    }

    public function countReports()
    {
        $adapter  = new GuzzleAdapter();
        $provider = new \Geocoder\Provider\OpenCage\OpenCage($adapter, '4c56063489df45f686a02b4b01c7c176');
        $geocoder = new \Geocoder\StatefulGeocoder($provider, 'es');
        $formatter = new \Geocoder\Formatter\StringFormatter();
        $reports = $this->reportRepository->all();

        $reportsCount = array();

        foreach ($reports as $key => $report) {
            if (!empty($report->lat) && !empty($report->lat)) {
                $country = $geocoder->reverseQuery(ReverseQuery::fromCoordinates($report->lat, $report->long));
                $code = $formatter->format($country->first(), '%c');
                if (empty($reportsCount[$code])) {
                    $reportsCount[$code] = 1;
                } else {
                    $reportsCount[$code] += 1;
                }
            }
        }                
        
        return $this->sendSuccess($reportsCount, 'Report deleted successfully');
    }    
}
