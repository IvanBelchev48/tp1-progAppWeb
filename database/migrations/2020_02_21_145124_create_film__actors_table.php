<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmActorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film__actors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('actor_id');
            $table->integer('film_id');
            $table->datetime('created_at');
            $table->datetime('update_at');
            $table->timestamps();

            $table->foreign('actor_id')->references('id')->on('actors');
            $table->foreign('film_id')->references('id')->on('films');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('film__actors');
    }
}
