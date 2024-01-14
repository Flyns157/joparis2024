<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpreuveTable extends Migration
{
    public function up()
    {
        Schema::create('epreuve', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sport');
            $table->date('date');
            $table->string('discipline');
            $table->string('description');
            $table->timestamps();

            $table->foreign('id_sport')->references('id')->on('sport');
        });
    }

    public function down()
    {
        Schema::dropIfExists('epreuve');
    }
}
