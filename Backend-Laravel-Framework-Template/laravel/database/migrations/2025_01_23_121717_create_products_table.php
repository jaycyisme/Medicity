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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('sub_category_id')->constrained('sub_categories')->onDelete('cascade');
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade');
            $table->foreignId('speciality_id')->nullable()->constrained('specialities')->onDelete('cascade');
            $table->foreignId('size_id')->nullable()->constrained('size')->onDelete('cascade');
            $table->foreignId('color_id')->nullable()->constrained('color')->onDelete('cascade');
            $table->foreignId('speciality_id')->nullable()->constrained('specialities')->onDelete('cascade');
            $table->longText('tag')->nullable();
            $table->longText('slug');
            $table->double('base_price');
            $table->longText('description');
            $table->longText('ingredient');
            $table->longText('indication');
            $table->longText('precaution');
            $table->longText('usage_instruction');
            $table->longText('manufacturing_info');
            $table->longText('faqs')->nullable();
            $table->string('thumbnail');
            $table->string('size_image');
            $table->boolean('is_prescription')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
