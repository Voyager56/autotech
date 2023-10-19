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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->enum('task_type', ["programming_and_project_task", "quota_task", "regular_task", "training_task"]);
            $table->string("task_name");
            $table->string("product_of_the_task");
            $table->time("planned_finish_time");
            $table->time("actual_finish_time");
            $table->timestamp("finished_date");
            $table->foreignId("weeks_plan_id")->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
