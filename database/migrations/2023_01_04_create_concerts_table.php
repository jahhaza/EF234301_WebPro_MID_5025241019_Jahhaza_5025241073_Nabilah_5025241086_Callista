<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('concerts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('venue');
            $table->timestamp('date');
            $table->string('city');
            $table->string('country');
            $table->string('ticket_url')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['upcoming', 'ongoing', 'completed', 'cancelled'])->default('upcoming');
            
            // Additional fields
            $table->string('time')->nullable();
            $table->decimal('ticket_price', 10, 2)->nullable();
            $table->integer('capacity')->nullable();
            $table->integer('available_tickets')->nullable();
            $table->boolean('is_featured')->default(false);
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('concerts');
    }
};