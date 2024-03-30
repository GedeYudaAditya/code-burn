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
        Schema::create('markers', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('icon');
            $table->bigInteger('stars_needed')->default(0);
            $table->bigInteger('bonus_reputation')->default(0);
            $table->bigInteger('bonus_bit_token')->default(0);
            $table->bigInteger('reward_reputation')->default(0);
            $table->bigInteger('reward_bit_token')->default(0);
            $table->bigInteger('reward_stars')->default(0);
            $table->bigInteger('reward_war_points')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('markers');
    }
};
