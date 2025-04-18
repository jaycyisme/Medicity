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
        Schema::create('medical_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appointment_id')->nullable()->constrained('appointments')->onDelete('cascade');
            $table->foreignId('clinic_id')->nullable()->constrained('clinics')->onDelete('cascade');
            $table->foreignId('service_id')->nullable()->constrained('services')->onDelete('cascade');
            $table->foreignId('speciality_id')->nullable()->constrained('specialities')->onDelete('cascade');
            $table->string('medical_record_code')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->string('job')->nullable();
            $table->string('symptoms')->nullable();
            $table->string('main_desease')->nullable();
            $table->string('comorbidities')->nullable();
            $table->string('province')->nullable();
            $table->string('district')->nullable();
            $table->string('ward')->nullable();
            $table->longText('address_detail')->nullable();
            $table->string('dependant_role')->nullable();
            $table->string('dependant_name')->nullable();
            $table->string('dependant_phone')->nullable();
            $table->string('temperature')->nullable();
            $table->string('pulse')->nullable();
            $table->string('systolic')->nullable();
            $table->string('diastolic')->nullable();
            $table->string('spo2')->nullable();
            $table->string('bsa')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('body_mass_index')->nullable();
            $table->string('previous_medical_history')->nullable();
            $table->string('clinical_notes')->nullable();
            $table->string('laboratory_tests')->nullable();
            $table->string('advice')->nullable();
            $table->double('price')->default(0);
            $table->double('guarantee_paid')->default(0);
            $table->double('appointment_final_price')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_records');
    }
};
