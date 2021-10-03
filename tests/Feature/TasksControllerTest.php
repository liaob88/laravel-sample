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
}
