<?php

namespace Tests\Unit\Repositrory;

use App\Models\Task;
use App\Repository\TaskRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed('TaskSeeder');
    }

    public function test_findAll()
    {
        $repository = new TaskRepository();
        $this->assertCount( Task::get()->count(), $repository->findAll());
    }

    public function test_findOne()
    {
        $repository = new TaskRepository();
        $target = Task::factory()->create();
        $this->assertSame($target->id, $repository->findOne($target->id)->id);
    }

    public function test_creteOne()
    {
        $repository = new TaskRepository();
        $recordCountBeforeStoring = Task::get()->count();

        $params = [
            'title' => "test",
            'content' => "text"
        ];
        $repository->createOne($params);
        $recordsAfterStoring = Task::get();

        $this->assertCount(($recordCountBeforeStoring + 1), $recordsAfterStoring);
    }
}
