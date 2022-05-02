<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->integer('userID');
            $table->string('title',256);
            $table->string('description')->nullable();
            $table->string('prep_time');
            $table->string('total_time');
            $table->longText('ingredients');
            $table->longText('instructions')->nullable();
            $table->json('images')->nullable();
            $table->longText('nutritional');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
};
