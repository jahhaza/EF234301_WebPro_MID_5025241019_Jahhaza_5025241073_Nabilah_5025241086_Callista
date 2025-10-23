<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('avatar')->nullable();
            $table->boolean('is_admin')->default(false);
            
            // Membership fields
            $table->enum('membership_status', ['free', 'premium', 'cancelled'])->default('free');
            $table->enum('membership_plan', ['monthly', 'yearly'])->nullable();
            $table->timestamp('membership_expires_at')->nullable();
            
            // Payment fields
            $table->string('stripe_customer_id')->nullable();
            $table->json('billing_address')->nullable();
            
            // Additional fields from your HTML
            $table->json('membership_history')->nullable();
            $table->json('transaction_history')->nullable();
            
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};