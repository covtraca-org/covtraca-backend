<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCountReportRequest;
use App\Http\Requests\UpdateCountReportRequest;
use App\Repositories\CountReportRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CountReportController extends AppBaseController
{
    /** @var  CountReportRepository */
    private $countReportRepository;

    public function __construct(CountReportRepository $countReportRepo)
    {
        $this->countReportRepository = $countReportRepo;
    }

    /**
     * Display a listing of the CountReport.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $countReports = $this->countReportRepository->all();

        return view('count_reports.index')
            ->with('countReports', $countReports);
    }

    /**
     * Show the form for creating a new CountReport.
     *
     * @return Response
     */
    public function create()
    {
        return view('count_reports.create');
    }

    /**
     * Store a newly created CountReport in storage.
     *
     * @param CreateCountReportRequest $request
     *
     * @return Response
     */
    public function store(CreateCountReportRequest $request)
    {
        $input = $request->all();

        $countReport = $this->countReportRepository->create($input);

        Flash::success('Count Report saved successfully.');

        return redirect(route('countReports.index'));
    }

    /**
     * Display the specified CountReport.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $countReport = $this->countReportRepository->find($id);

        if (empty($countReport)) {
            Flash::error('Count Report not found');

            return redirect(route('countReports.index'));
        }

        return view('count_reports.show')->with('countReport', $countReport);
    }

    /**
     * Show the form for editing the specified CountReport.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $countReport = $this->countReportRepository->find($id);

        if (empty($countReport)) {
            Flash::error('Count Report not found');

            return redirect(route('countReports.index'));
        }

        return view('count_reports.edit')->with('countReport', $countReport);
    }

    /**
     * Update the specified CountReport in storage.
     *
     * @param int $id
     * @param UpdateCountReportRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCountReportRequest $request)
    {
        $countReport = $this->countReportRepository->find($id);

        if (empty($countReport)) {
            Flash::error('Count Report not found');

            return redirect(route('countReports.index'));
        }

        $countReport = $this->countReportRepository->update($request->all(), $id);

        Flash::success('Count Report updated successfully.');

        return redirect(route('countReports.index'));
    }

    /**
     * Remove the specified CountReport from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $countReport = $this->countReportRepository->find($id);

        if (empty($countReport)) {
            Flash::error('Count Report not found');

            return redirect(route('countReports.index'));
        }

        $this->countReportRepository->delete($id);

        Flash::success('Count Report deleted successfully.');

        return redirect(route('countReports.index'));
    }
}
