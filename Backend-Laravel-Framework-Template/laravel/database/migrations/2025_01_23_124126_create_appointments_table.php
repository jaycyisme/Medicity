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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('doctor_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('status_id')->constrained('appointment_statuses')->onDelete('cascade');
            $table->foreignId('type_id')->constrained('consultation_types')->onDelete('cascade');
            $table->json('business_hour')->nullable();
            $table->string('appointment_code')->nullable();
            $table->foreignId('clinic_id')->nullable()->constrained('clinics')->onDelete('cascade');
            $table->foreignId('service_id')->nullable()->constrained('services')->onDelete('cascade');
            $table->foreignId('speciality_id')->nullable()->constrained('specialities')->onDelete('cascade');
            $table->string('patient_name')->nullable();
            $table->string('patient_phone')->nullable();
            $table->string('patient_email')->nullable();
            $table->string('patient_symptoms')->nullable();
            $table->string('patient_province')->nullable();
            $table->string('patient_district')->nullable();
            $table->string('patient_ward')->nullable();
            $table->longText('patient_address_detail')->nullable();
            $table->longText('patient_reason_visit')->nullable();
            $table->double('appointment_price')->default(0);
            $table->double('appointment_tax')->default(0);
            $table->double('appointment_discount')->default(0);
            $table->double('appointment_final_price')->default(0);
            $table->foreignId('payment_method_id')->nullable()->constrained('payment_methods')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
