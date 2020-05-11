<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Repositories\ReportRepository;
use App\Repositories\CountReportRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ReportController extends AppBaseController
{
    /** @var  ReportRepository */
    private $reportRepository;
    /** @var  CountReportRepository */
    private $countReportRepository;

    public function __construct(ReportRepository $reportRepo, CountReportRepository $countReportRepo)
    {
        $this->middleware('role:Administrator');
        $this->reportRepository = $reportRepo;
        $this->countReportRepository = $countReportRepo;
    }

    /**
     * Display a listing of the Report.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $reports = $this->reportRepository->all();

        return view('reports.index')
            ->with('reports', $reports);
    }

    /**
     * Show the form for creating a new Report.
     *
     * @return Response
     */
    public function create()
    {
        return view('reports.create');
    }

    /**
     * Store a newly created Report in storage.
     *
     * @param CreateReportRequest $request
     *
     * @return Response
     */
    public function store(CreateReportRequest $request)
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

        Flash::success('Report saved successfully.');

        return redirect(route('reports.index'));
    }

    /**
     * Display the specified Report.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $report = $this->reportRepository->find($id);

        if (empty($report)) {
            Flash::error('Report not found');

            return redirect(route('reports.index'));
        }

        return view('reports.show')->with('report', $report);
    }

    /**
     * Show the form for editing the specified Report.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $report = $this->reportRepository->find($id);

        if (empty($report)) {
            Flash::error('Report not found');

            return redirect(route('reports.index'));
        }

        return view('reports.edit')->with('report', $report);
    }

    /**
     * Update the specified Report in storage.
     *
     * @param int $id
     * @param UpdateReportRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReportRequest $request)
    {
        $report = $this->reportRepository->find($id);

        if (empty($report)) {
            Flash::error('Report not found');

            return redirect(route('reports.index'));
        }

        $report = $this->reportRepository->update($request->all(), $id);

        Flash::success('Report updated successfully.');

        return redirect(route('reports.index'));
    }

    /**
     * Remove the specified Report from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $report = $this->reportRepository->find($id);

        if (empty($report)) {
            Flash::error('Report not found');

            return redirect(route('reports.index'));
        }

        $this->reportRepository->delete($id);

        Flash::success('Report deleted successfully.');

        return redirect(route('reports.index'));
    }
}
