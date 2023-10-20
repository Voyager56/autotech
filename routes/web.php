<?php

use App\Http\Controllers\TasksController;
use App\Http\Controllers\WeeksPlanController;
use App\Http\Controllers\WeeksTasksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [WeeksPlanController::class, "index"])->name("dashboard");

Route::get("/weeks-plan", function () {
    return view("week-create");
})->name("weeks-plan.create");

Route::post("/weeks-plan", [WeeksPlanController::class, "create"])->name("weeks-plan.create");


Route::post("/weeks-task/{weeksPlan}", [WeeksTasksController::class, "create"])->name("weeks-task.create");
Route::delete("/weeks-task/{weeksTask}", [WeeksTasksController::class, "delete"])->name("weeks-task.delete");
Route::put("/weeks-task/{weeksTask}", [WeeksTasksController::class, "edit"])->name("weeks-task.edit");

Route::post("/tasks/{weeksTask}", [TasksController::class, "create"])->name("tasks.create");
