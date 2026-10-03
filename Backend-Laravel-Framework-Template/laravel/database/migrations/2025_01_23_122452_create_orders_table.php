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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->double('total_amount');
            $table->double('discount_amount')->default(0);
            $table->double('final_amount');
            $table->string('order_code');
            $table->foreignId('order_type_id')->constrained('order_types')->onDelete('cascade');
            $table->foreignId('order_status_id')->constrained('order_statuses')->onDelete('cascade');
            $table->foreignId('payment_method_id')->constrained('payment_methods')->onDelete('cascade');
            $table->foreignId('payment_status_id')->constrained('payment_statuses')->onDelete('cascade');
            $table->longText('note')->nullable();
            $table->string('employee')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_address')->nullable();
            $table->string('shipping_city');
            $table->string('shipping_district');
            $table->string('shipping_ward');
            $table->longText('shipping_detail');
            $table->string('shipping_phone');
            $table->double('shipping_fee')->nullable()->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
