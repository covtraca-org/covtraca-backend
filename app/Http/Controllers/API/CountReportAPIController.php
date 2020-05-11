<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCountReportAPIRequest;
use App\Http\Requests\API\UpdateCountReportAPIRequest;
use App\Models\CountReport;
use App\Repositories\CountReportRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CountReportController
 * @package App\Http\Controllers\API
 */

class CountReportAPIController extends AppBaseController
{
    /** @var  CountReportRepository */
    private $countReportRepository;

    public function __construct(CountReportRepository $countReportRepo)
    {
        $this->countReportRepository = $countReportRepo;
    }

    /**
     * Display a listing of the CountReport.
     * GET|HEAD /countReports
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $countReports = $this->countReportRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($countReports->toArray(), 'Count Reports retrieved successfully');
    }

    /**
     * Store a newly created CountReport in storage.
     * POST /countReports
     *
     * @param CreateCountReportAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCountReportAPIRequest $request)
    {
        $input = $request->all();

        $countReport = $this->countReportRepository->create($input);

        return $this->sendResponse($countReport->toArray(), 'Count Report saved successfully');
    }

    /**
     * Display the specified CountReport.
     * GET|HEAD /countReports/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CountReport $countReport */
        $countReport = $this->countReportRepository->find($id);

        if (empty($countReport)) {
            return $this->sendError('Count Report not found');
        }

        return $this->sendResponse($countReport->toArray(), 'Count Report retrieved successfully');
    }

    /**
     * Update the specified CountReport in storage.
     * PUT/PATCH /countReports/{id}
     *
     * @param int $id
     * @param UpdateCountReportAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCountReportAPIRequest $request)
    {
        $input = $request->all();

        /** @var CountReport $countReport */
        $countReport = $this->countReportRepository->find($id);

        if (empty($countReport)) {
            return $this->sendError('Count Report not found');
        }

        $countReport = $this->countReportRepository->update($input, $id);

        return $this->sendResponse($countReport->toArray(), 'CountReport updated successfully');
    }

    /**
     * Remove the specified CountReport from storage.
     * DELETE /countReports/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CountReport $countReport */
        $countReport = $this->countReportRepository->find($id);

        if (empty($countReport)) {
            return $this->sendError('Count Report not found');
        }

        $countReport->delete();

        return $this->sendSuccess('Count Report deleted successfully');
    }
}
