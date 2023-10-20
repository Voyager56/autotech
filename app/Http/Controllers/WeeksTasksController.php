<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWeekTaskRequest;
use App\Models\WeeksPlan;
use App\Models\WeeksTask;

class WeeksTasksController extends Controller
{
    public function create(WeeksPlan $weeksPlan, CreateWeekTaskRequest $req,)
    {
        $weeksTask = $weeksPlan->weeksTasks()->create([
            "dimension" => $req->dimension,
            "note" => $req->note,
            "past_weeks_amount" => $req->pastWeeksAmount,
            "quota_for_this_week" => $req->quotaForThisWeek,
            "task_name" => $req->statistic,
            "weeks_plan_id" => $weeksPlan->id,
        ]);

        if (!$weeksTask) {
            return response()->json("error", 500);
        }

        return response()->json(["redirect" => route("dashboard")], 200);
    }

    public function delete(WeeksTask $weeksTask)
    {
        $weeksTask->delete();
        return response()->json(["redirect" => route("dashboard")], 200);
    }
}