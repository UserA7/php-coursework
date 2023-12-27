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
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('release_year');
            $table->unsignedInteger('producer_id');
            $table->unsignedInteger('genre_id');
            $table->timestamps();

            $table->foreign('producer_id')->references('id')->on('producers');
            $table->foreign('genre_id')->references('id')->on('genres');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Schema::dropIfExists('games');
    }
};
