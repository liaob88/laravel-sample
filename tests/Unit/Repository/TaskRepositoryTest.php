<?php

namespace Tests\Unit\Repositrory;

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

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_findAll()
    {
        $repository = new TaskRepository();

        // MEMO: factoryで10個のデータを作成している
        $this->assertCount(10, $repository->findAll());
    }
}
