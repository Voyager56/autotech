<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
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

    public function delete(Task $task)
    {
        $task->delete();

        return response()->json(["redirect" => route("dashboard")], 200);
    }

    public function edit(UpdateTaskRequest $request, Task $task)
    {
        $task->update([
            "task_name" => $request->taskName,
            "planned_finish_time" => $request->plannedDate,
            "task_type" => $request->taskType,
            "product_of_the_task" => $request->productOfTask,
            "actual_finish_time" => $request->completionTime,
            "finished_date" => $request->completionDate,
        ]);

        return response()->json(["redirect" => route("dashboard")], 200);
    }
}
