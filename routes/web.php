<?php

use App\Http\Controllers\WeeksPlanController;
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

Route::get('/', [WeeksPlanController::class, "index"])->name("app");

Route::get("/weeks-plan", function () {
    return view("week-create");
})->name("weeks-plan.create");


// Route::view('/{any?}', 'app')
//     ->where('any', '.*');
