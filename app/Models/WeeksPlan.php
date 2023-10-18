<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WeeksPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        "start_of_week",
        "first_last_name",
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function weeksTasks(): HasMany
    {
        return $this->hasMany(WeeksTask::class);
    }
}
