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
            $table->enum('name', ["ამოცანები პროგრამებისა და პროექტებისთვის", "კვოტის მისაღწევად საჭირო ამოცანები", "რეგულარული ამოცანები", "ამოცანები ტრენინგებთან მიმართებაში"]);
            $table->string("product_of_the_task");
            $table->timestamp("planned_finish_time");
            $table->timestamp("actual_finish_time");
            $table->timestamp("finished_date");
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
