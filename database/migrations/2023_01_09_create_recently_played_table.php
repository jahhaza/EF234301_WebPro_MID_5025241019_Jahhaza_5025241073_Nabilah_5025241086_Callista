<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('recently_played', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('song_id')->constrained()->onDelete('cascade');
            $table->timestamp('played_at');
            $table->timestamps();
            
            $table->index(['user_id', 'played_at']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('recently_played');
    }
};