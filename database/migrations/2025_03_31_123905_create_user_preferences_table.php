<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('user_preferences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->json('genre_preferences')->nullable();
            $table->json('listening_history')->nullable();
            $table->boolean('dark_mode')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('user_preferences');
    }
};
