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
}
