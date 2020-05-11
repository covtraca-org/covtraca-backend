<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateReportAPIRequest;
use App\Http\Requests\API\UpdateReportAPIRequest;
use App\Models\Report;
use App\Models\CountReport;
use App\Repositories\ReportRepository;
use App\Repositories\CountReportRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ReportController
 * @package App\Http\Controllers\API
 */

class ReportAPIController extends AppBaseController
{
    /** @var  ReportRepository */
    private $reportRepository;
    /** @var  CountReportRepository */
    private $countReportRepository;

    public function __construct(ReportRepository $reportRepo, CountReportRepository $countReportRepo)
    {
        $this->reportRepository = $reportRepo;
        $this->countReportRepository = $countReportRepo;
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

        $reports = $this->reportRepository->all();
        
        if (!empty($report->lat) && !empty($report->lat)) {
            $country = json_decode(app('geocoder')->reverse($report->lat, $report->long)->toJson());                

            $reportFind = $this->countReportRepository->findBy("country_code", $country->properties->countryCode);                
            
            if (empty($reportFind)) {
                $countInput = array(
                    "country_code" => $country->properties->countryCode,
                    "country_name" => $country->properties->country,
                    "count" => 1
                );
                $this->countReportRepository->create($countInput);
            } else {
                $countInput = array(                        
                    "count" => $reportFind->count += 1
                );
                $this->countReportRepository->update($countInput, $reportFind->id);
            }
        }

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
}
