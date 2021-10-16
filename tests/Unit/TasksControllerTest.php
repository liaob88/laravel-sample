<?php

namespace Tests\Feature;

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
        $response = $this->post('api/tasks/1/update', ['title' => 'updatedTitle', 'content' => 'updatedText']);
        $response->assertStatus(200);
    }
}
