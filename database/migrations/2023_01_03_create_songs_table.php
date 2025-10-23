<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('album');
            $table->string('duration');
            $table->string('file_path');
            $table->string('cover_image');
            $table->text('description');
            $table->text('lyrics')->nullable();
            
            // Additional fields for music functionality
            $table->integer('stream_count')->default(0);
            $table->integer('track_number')->nullable();
            $table->string('genre')->nullable();
            $table->date('release_date')->nullable();
            $table->boolean('is_explicit')->default(false);
            $table->boolean('is_active')->default(true);
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('songs');
    }
};