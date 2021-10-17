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
        $repository = $this->app->make(TaskRepository::class);

        $this->assertCount(Task::get()->count(), $repository->findAll());
    }

    public function test_findOne()
    {
        $target = Task::factory()->create();

        $repository = $this->app->make(TaskRepository::class);

        $this->assertSame($target->id, $repository->findOne($target->id)->id);
    }

    public function test_creteOne()
    {
        $recordCountBeforeStoring = Task::get()->count();
        $params = [
            'title' => "test",
            'content' => "text"
        ];

        $repository = $this->app->make(TaskRepository::class);
        $repository->createOne($params);
        $recordsAfterStoring = Task::get();

        $this->assertCount(($recordCountBeforeStoring + 1), $recordsAfterStoring);
    }

    public function test_updateOne()
    {
        $targetTaskIndex = Task::first()->id;
        $updatedTitle = "updatedTitle";
        $updatedContent = "updatedText";

        $repository = $this->app->make(TaskRepository::class);
        $repository->updateOne(
            $targetTaskIndex,
            [
                'title' => $updatedTitle,
                'content' => $updatedContent
            ]
        );

        $this->assertSame(Task::find($targetTaskIndex)->title, $updatedTitle);
        $this->assertSame(Task::find($targetTaskIndex)->content, $updatedContent);
    }
}
