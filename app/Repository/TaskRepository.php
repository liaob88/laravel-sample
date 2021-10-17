<?php

namespace App\Repository;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskRepository
{
    function findAll(): Collection
    {
        $tasks = Task::get();
        return $tasks;
    }

    function findOne(int $id)
    {
        $task = Task::find($id);
        return $task;
    }

    function createOne($params)
    {
        Task::create($params);
    }

    function updateOne(int $id, $params): Task
    {
        Task::where('id', $id)->update($params);
        
        return Task::find($id);
    }
}
