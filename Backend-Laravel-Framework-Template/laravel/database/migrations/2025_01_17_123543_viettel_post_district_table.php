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
        Schema::create('viettel_post_districts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('district_id');
            $table->string('district_value');
            $table->text('district_name');
            $table->bigInteger('province_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
