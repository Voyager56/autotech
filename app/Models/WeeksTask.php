<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeksTask extends Model
{
    use HasFactory;


    protected $fillable = [
        "task_name",
        "name",
        "dimension",
        "past_weeks_amount",
        "quota_for_this_week",
        "note",
    ];
}
