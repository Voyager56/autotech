<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('weeks_tasks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("task_name");
            $table->string("dimension");
            $table->integer("past_weeks_amount");
            $table->integer("quota_for_this_week");
            $table->string("note");
            $table->foreignId("weeks_plan_id")->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weeks_tasks');
    }
};
