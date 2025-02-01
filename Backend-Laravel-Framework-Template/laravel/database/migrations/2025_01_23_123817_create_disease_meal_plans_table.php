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
        Schema::create('disease_meal_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('disease_id')->constrained('diseases')->onDelete('cascade');
            $table->foreignId('meal_plan_id')->constrained('meal_plans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disease_meal_plans');
    }
};
