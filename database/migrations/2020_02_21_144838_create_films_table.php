<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('string', 50);
            $table->year('release_year');
            $table->integer('length');
            $table->text('description');
            $table->string('rating');
            $table->integer('language_id');
            $table->string('specialfeatures');
            $table->string('image');
            $table->datetime('created_at');
            $table->timestamps();

            $table->primary('id');
            $table->foreign('language_id')->references('id')->on('languages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('films');
    }
}
