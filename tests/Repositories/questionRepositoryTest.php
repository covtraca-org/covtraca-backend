<?php namespace Tests\Repositories;

use App\Models\question;
use App\Repositories\questionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class questionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var questionRepository
     */
    protected $questionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->questionRepo = \App::make(questionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_question()
    {
        $question = factory(question::class)->make()->toArray();

        $createdquestion = $this->questionRepo->create($question);

        $createdquestion = $createdquestion->toArray();
        $this->assertArrayHasKey('id', $createdquestion);
        $this->assertNotNull($createdquestion['id'], 'Created question must have id specified');
        $this->assertNotNull(question::find($createdquestion['id']), 'question with given id must be in DB');
        $this->assertModelData($question, $createdquestion);
    }

    /**
     * @test read
     */
    public function test_read_question()
    {
        $question = factory(question::class)->create();

        $dbquestion = $this->questionRepo->find($question->id);

        $dbquestion = $dbquestion->toArray();
        $this->assertModelData($question->toArray(), $dbquestion);
    }

    /**
     * @test update
     */
    public function test_update_question()
    {
        $question = factory(question::class)->create();
        $fakequestion = factory(question::class)->make()->toArray();

        $updatedquestion = $this->questionRepo->update($fakequestion, $question->id);

        $this->assertModelData($fakequestion, $updatedquestion->toArray());
        $dbquestion = $this->questionRepo->find($question->id);
        $this->assertModelData($fakequestion, $dbquestion->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_question()
    {
        $question = factory(question::class)->create();

        $resp = $this->questionRepo->delete($question->id);

        $this->assertTrue($resp);
        $this->assertNull(question::find($question->id), 'question should not exist in DB');
    }
}
