<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('type', ['Anime', 'Manga', 'Drama', 'Light Novel']);
            $table->float('score', 3, 1)->default(0.0);
            $table->integer('year');
            $table->string('creator')->nullable(); // Studio / Author / Network / Publisher
            $table->integer('total_count')->nullable(); // Episodes / Chapters / Volumes
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
