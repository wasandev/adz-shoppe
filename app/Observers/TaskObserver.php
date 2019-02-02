<?php

namespace App\Observers;

use App\Task;

class TaskObserver
{
    public function creating(Task $task)
    {
        $task->user_id = auth()->user()->id;
    }
}
