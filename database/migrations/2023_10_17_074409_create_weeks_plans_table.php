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
            $table->timestamp("start_of_week")->default(now());
            $table->string("first_last_name");
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
