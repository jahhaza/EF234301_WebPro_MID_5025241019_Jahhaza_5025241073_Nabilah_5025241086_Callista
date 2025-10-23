<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('plan'); // free, premium-monthly, premium-yearly
            $table->enum('status', ['active', 'cancelled', 'expired'])->default('active');
            $table->timestamp('started_at');
            $table->timestamp('expires_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->decimal('price', 10, 2)->default(0);
            $table->string('payment_method')->nullable();
            
            // Additional fields
            $table->string('stripe_subscription_id')->nullable();
            $table->boolean('auto_renew')->default(true);
            $table->json('payment_history')->nullable();
            
            $table->timestamps();
            
            // Indexes for better performance
            $table->index(['user_id', 'status']);
            $table->index('expires_at');
            $table->index('created_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('memberships');
    }
};