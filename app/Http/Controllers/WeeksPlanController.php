<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWeekRequest;
use App\Models\WeeksPlan;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;

class WeeksPlanController extends Controller
{
    public function index()
    {
        $weeksPlan = WeeksPlan::latest()->first();
        if (!$weeksPlan) {
            return redirect()->route("weeks-plan.create");
        }
        $tasks = $weeksPlan->tasks()->get()->groupBy("task_type");
        $timeForEachTaskType = array();
        $totalTime = [
            "actual_time" => [
                "hours" => 0,
                "minutes" => 0,
                "seconds" => 0,
            ],
            "planned_time" => [
                "hours" => 0,
                "minutes" => 0,
                "seconds" => 0,
            ],
        ];
        foreach ($tasks as $taskType => $task) {
            $taskActualTime = [
                "hours" => 0,
                "minutes" => 0,
                "seconds" => 0,
            ];
            $taskPlannedtime = [
                "hours" => 0,
                "minutes" => 0,
                "seconds" => 0,
            ];
            foreach ($task as $t) {
                $plannedTime = date_parse($t->planned_finish_time);
                $taskPlannedtime["hours"] += $plannedTime["hour"];
                $taskPlannedtime["minutes"] += $plannedTime["minute"];
                $taskPlannedtime["seconds"] += $plannedTime["second"];

                $actualTime = date_parse($t->actual_finish_time);
                $taskActualTime["hours"] += $actualTime["hour"];
                $taskActualTime["minutes"] += $actualTime["minute"];
                $taskActualTime["seconds"] += $actualTime["second"];

                $totalTime["actual_time"]['hours'] += $actualTime["hour"];
                $totalTime["actual_time"]['minutes'] += $actualTime["minute"];
                $totalTime["actual_time"]['seconds'] += $actualTime["second"];

                $totalTime["planned_time"]['hours'] += $plannedTime["hour"];
                $totalTime["planned_time"]['minutes'] += $plannedTime["minute"];
                $totalTime["planned_time"]['seconds'] += $plannedTime["second"];
            }

            $timeForEachTaskType[$taskType] = [
                "planned_time" => $taskPlannedtime["hours"] . ":" . $taskPlannedtime["minutes"] . ":" . $taskPlannedtime["seconds"],
                "actual_time" => $taskActualTime["hours"] . ":" . $taskActualTime["minutes"] . ":" . $taskActualTime["seconds"],
            ];
        }

        $formatedTotalTime = [
            "actual_time" => $totalTime["actual_time"]["hours"] . ":" . $totalTime["actual_time"]["minutes"] . ":" . $totalTime["actual_time"]["seconds"],
            "planned_time" => $totalTime["planned_time"]["hours"] . ":" . $totalTime["planned_time"]["minutes"] . ":" . $totalTime["planned_time"]["seconds"],
        ];

        $weeksPlan->weeksTasks;
        return view("dashboard", [
            "weeksPlan" => $weeksPlan,
            "tasks" => $tasks,
            "timeForEachTaskType" => $timeForEachTaskType,
            "totalTime" => $formatedTotalTime,
        ]);
    }

    public function create(CreateWeekRequest $request)
    {
        $week = WeeksPlan::create([
            "first_last_name" => $request->name,
        ]);

        if ($week) {
            return response()->json(["redirect" => route("dashboard")], 200);
        }

        return response()->json('error', 500);
    }
}
