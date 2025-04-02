<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('playlists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->boolean('is_collaborative')->default(false);
            $table->timestamps();
        });
        
        Schema::create('playlist_track', function (Blueprint $table) {
            $table->id();
            $table->foreignId('playlist_id')->constrained()->onDelete('cascade');
            $table->foreignId('track_id')->constrained()->onDelete('cascade');
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('playlists');
    }
};
