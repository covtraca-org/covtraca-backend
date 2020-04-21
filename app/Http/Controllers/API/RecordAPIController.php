<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRecordAPIRequest;
use App\Http\Requests\API\UpdateRecordAPIRequest;
use App\Models\Record;
use App\Repositories\RecordRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class RecordController
 * @package App\Http\Controllers\API
 */

class RecordAPIController extends AppBaseController
{
    /** @var  RecordRepository */
    private $recordRepository;

    public function __construct(RecordRepository $recordRepo)
    {
        $this->recordRepository = $recordRepo;
    }

    /**
     * Display a listing of the Record.
     * GET|HEAD /records
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $records = $this->recordRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($records->toArray(), 'Records retrieved successfully');
    }

    /**
     * Store a newly created Record in storage.
     * POST /records
     *
     * @param CreateRecordAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRecordAPIRequest $request)
    {
        $input = $request->all();

        $record = $this->recordRepository->create($input);

        return $this->sendResponse($record->toArray(), 'Record saved successfully');
    }

    /**
     * Display the specified Record.
     * GET|HEAD /records/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Record $record */
        $record = $this->recordRepository->find($id);

        if (empty($record)) {
            return $this->sendError('Record not found');
        }

        return $this->sendResponse($record->toArray(), 'Record retrieved successfully');
    }

    /**
     * Update the specified Record in storage.
     * PUT/PATCH /records/{id}
     *
     * @param int $id
     * @param UpdateRecordAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRecordAPIRequest $request)
    {
        $input = $request->all();

        /** @var Record $record */
        $record = $this->recordRepository->find($id);

        if (empty($record)) {
            return $this->sendError('Record not found');
        }

        $record = $this->recordRepository->update($input, $id);

        return $this->sendResponse($record->toArray(), 'Record updated successfully');
    }

    /**
     * Remove the specified Record from storage.
     * DELETE /records/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Record $record */
        $record = $this->recordRepository->find($id);

        if (empty($record)) {
            return $this->sendError('Record not found');
        }

        $record->delete();

        return $this->sendSuccess('Record deleted successfully');
    }
}
