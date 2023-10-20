<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Models\WeeksPlan;

class TasksController extends Controller
{
    public function create(CreateTaskRequest $request, WeeksPlan $weeksTask)
    {
        $task = $weeksTask->tasks()->create([
            "task_name" => $request->taskName,
            "planned_finish_time" => $request->plannedDate,
            "task_type" => $request->taskType,
            "product_of_the_task" => $request->productOfTask,
        ]);

        if (!$task) {
            return response()->json("error", 500);
        }

        return response()->json(["redirect" => route("dashboard")], 200);
    }
}
