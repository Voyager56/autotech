<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeksPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        "start_of_week",
        "name",
        "statistics",
        "name",
        "dimension",
        "past_weeks_amount",
        "quota_for_this_week",
        "note",
    ];
}
