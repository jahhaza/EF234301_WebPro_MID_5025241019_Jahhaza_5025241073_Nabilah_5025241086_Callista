<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('total', 10, 2);
            $table->enum('status', ['pending', 'processing', 'completed', 'cancelled'])->default('pending');
            
            // Customer information (JSON format)
            $table->json('customer_info');
            
            // Shipping address (JSON format)
            $table->json('shipping_address');
            
            // Payment information
            $table->string('payment_method')->default('bca_transfer');
            $table->string('payment_proof')->nullable();
            $table->timestamp('payment_verified_at')->nullable();
            
            // Shipping information
            $table->string('shipping_method')->nullable();
            $table->decimal('shipping_cost', 10, 2)->default(0);
            $table->string('tracking_number')->nullable();
            
            // Additional fields
            $table->text('notes')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};