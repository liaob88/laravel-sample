<?php

namespace Tests\Feature;

use App\Models\Task;
use Tests\TestCase;

class TasksControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_index()
    {
        $response = $this->get('/api/tasks');
        $response->assertStatus(200);
    }

    public function test_show()
    {
        $response = $this->get('/api/tasks/1');
        $response->assertStatus(200);
    }

    public function test_store()
    {
        $response = $this->post('api/tasks/store', ['title' => 'title', 'content' => 'text']);
        $response->assertStatus(200);
    }

    public function test_update()
    {
        $target = Task::first()->id;
        $endPoint = 'api/tasks/' . $target . '/update';
        $response = $this->post($endPoint, ['title' => 'updatedTitle', 'content' => 'updatedText']);

        $response->assertStatus(200);
        $this->assertSame($response['id'], $target);
    }
}
