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
        Schema::create('diseases', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('overview');
            $table->longText('symptoms');
            $table->longText('causes');
            $table->longText('risk_factors');
            $table->longText('diagnosis');
            $table->longText('prevention');
            $table->longText('treatment');
            $table->longText('image_url');
            $table->longText('doctor_name');
            $table->longText('doctor_image');
            $table->longText('doctor_overview');
            $table->foreignId('body_part_id')->nullable()->constrained('body_parts')->onDelete('set null');
            $table->foreignId('target_group_id')->nullable()->constrained('target_groups')->onDelete('set null');
            $table->foreignId('seasonal_group_id')->nullable()->constrained('seasonal_diseases')->onDelete('set null');
            $table->foreignId('speciality_group_id')->nullable()->constrained('specialities')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diseases');
    }
};
