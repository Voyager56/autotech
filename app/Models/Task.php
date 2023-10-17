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
}
