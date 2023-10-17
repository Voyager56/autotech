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
        Schema::create('weeks_plans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime("start_of_week");
            $table->string("name");
            $table->integer("statistics");
            $table->string("name");
            $table->string("dimension");
            $table->integer("past_weeks_amount");
            $table->integer("quota_for_this_week");
            $table->string("note");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weeks_plans');
    }
};
