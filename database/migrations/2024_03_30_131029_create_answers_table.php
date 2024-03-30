<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->longText('answer');
            $table->longText('attachment');
            $table->bigInteger('up_votes')->default(0);
            $table->bigInteger('down_votes')->default(0);
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('discussion_id')->constrained('discussions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
