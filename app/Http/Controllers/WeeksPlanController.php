<?php

namespace App\Http\Controllers;

use App\Models\WeeksPlan;
use Illuminate\Http\Request;

class WeeksPlanController extends Controller
{
    public function index()
    {
        $weeksPlan = WeeksPlan::first();
        $tasks = $weeksPlan->tasks()->get()->groupBy("task_type");
        $weeksPlan->weeksTasks;
        return view("dashboard", compact("weeksPlan", "tasks"));
    }
}
