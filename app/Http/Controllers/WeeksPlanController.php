<?php

namespace App\Http\Controllers;

use App\Models\WeeksPlan;
use Carbon\Carbon;

class WeeksPlanController extends Controller
{
    public function index()
    {
        $weeksPlan = WeeksPlan::first();
        if (!$weeksPlan) {
            return redirect()->route("weeksplan.create");
        }
        $tasks = $weeksPlan->tasks()->get()->groupBy("task_type");
        $timeForEachTaskType = array();
        $totalTime = [
            "actual_time" => 0,
            "planned_time" => 0,
        ];
        foreach ($tasks as $taskType => $task) {
            $actualTotalSeconds = 0;
            $plannedTotalSeconds = 0;
            foreach ($task as $t) {
                $actualTotalSeconds += strtotime($t->actual_finish_time);
                $plannedTotalSeconds += strtotime($t->planned_finish_time);
                $totalTime["actual_time"] += strtotime($t->actual_finish_time);
                $totalTime["planned_time"] += strtotime($t->planned_finish_time);
            }
            $timeForEachTaskType[$taskType]['actual_time'] = date("H:i:s", $actualTotalSeconds);
            $timeForEachTaskType[$taskType]['planned_time'] = date("H:i:s", $plannedTotalSeconds);
        }
        $totalTime['actual_time'] = date("H:i:s", $totalTime['actual_time']);
        $totalTime['planned_time'] = date("H:i:s", $totalTime['planned_time']);
        $weeksPlan->weeksTasks;
        return view("dashboard", [
            "weeksPlan" => $weeksPlan,
            "tasks" => $tasks,
            "timeForEachTaskType" => $timeForEachTaskType,
            "totalTime" => $totalTime,
        ]);
    }
}
