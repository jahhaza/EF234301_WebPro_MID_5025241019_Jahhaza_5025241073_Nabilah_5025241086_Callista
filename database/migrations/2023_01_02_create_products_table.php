<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('image');
            $table->string('badge')->nullable();
            $table->text('full_description')->nullable();
            $table->text('features')->nullable();
            
            // Additional fields from your HTML data
            $table->integer('stock')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->string('sku')->unique()->nullable();
            $table->json('gallery')->nullable();
            $table->integer('sort_order')->default(0);
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
