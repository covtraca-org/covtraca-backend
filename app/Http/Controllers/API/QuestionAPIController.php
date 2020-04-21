<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateQuestionAPIRequest;
use App\Http\Requests\API\UpdateQuestionAPIRequest;
use App\Models\Question;
use App\Repositories\QuestionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class QuestionController
 * @package App\Http\Controllers\API
 */

class QuestionAPIController extends AppBaseController
{
    /** @var  QuestionRepository */
    private $QuestionRepository;

    public function __construct(QuestionRepository $QuestionRepo)
    {
        $this->QuestionRepository = $QuestionRepo;
    }

    /**
     * Display a listing of the Question.
     * GET|HEAD /Questions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $Questions = $this->QuestionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($Questions->toArray(), 'Questions retrieved successfully');
    }

    /**
     * Store a newly created Question in storage.
     * POST /Questions
     *
     * @param CreateQuestionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateQuestionAPIRequest $request)
    {
        $input = $request->all();

        $Question = $this->QuestionRepository->create($input);

        return $this->sendResponse($Question->toArray(), 'Question saved successfully');
    }

    /**
     * Display the specified Question.
     * GET|HEAD /Questions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Question $Question */
        $Question = $this->QuestionRepository->find($id);

        if (empty($Question)) {
            return $this->sendError('Question not found');
        }

        return $this->sendResponse($Question->toArray(), 'Question retrieved successfully');
    }

    /**
     * Update the specified Question in storage.
     * PUT/PATCH /Questions/{id}
     *
     * @param int $id
     * @param UpdateQuestionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuestionAPIRequest $request)
    {
        $input = $request->all();

        /** @var Question $Question */
        $Question = $this->QuestionRepository->find($id);

        if (empty($Question)) {
            return $this->sendError('Question not found');
        }

        $Question = $this->QuestionRepository->update($input, $id);

        return $this->sendResponse($Question->toArray(), 'Question updated successfully');
    }

    /**
     * Remove the specified Question from storage.
     * DELETE /Questions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Question $Question */
        $Question = $this->QuestionRepository->find($id);

        if (empty($Question)) {
            return $this->sendError('Question not found');
        }

        $Question->delete();

        return $this->sendSuccess('Question deleted successfully');
    }
}
