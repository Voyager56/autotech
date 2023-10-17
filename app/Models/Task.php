<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $casts = [
        "planned_finish_time" => "hh:mm:ss",
        "actual_finish_time" => "hh:mm:ss",
    ];

    protected $fillable = [
        "name",
        "product_of_the_task",
        "planned_finish_time",
        "actual_finish_time",
        "finished_date",
    ];
}