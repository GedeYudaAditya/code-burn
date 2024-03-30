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
        Schema::create('clans', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
            $table->longText('avatar');
            $table->longText('description');
            $table->bigInteger('reputation')->default(0);
            $table->bigInteger('war_points')->default(0);
            $table->bigInteger('bit_token')->default(0);
            $table->foreignId('leader_id')->constrained('users');
            $table->foreignId('deputy_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clans');
    }
};
