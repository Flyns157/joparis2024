<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipationsTable extends Migration
{
    public function up()
    {
        Schema::create('participations', function (Blueprint $table) {
            $table->unsignedBigInteger('id_sportif');
            $table->unsignedBigInteger('id_epreuve');
            $table->timestamps();

            $table->foreign('id_sportif')->references('id')->on('sportif');
            $table->foreign('id_epreuve')->references('id')->on('epreuve');
        });
    }

    public function down()
    {
        Schema::dropIfExists('participations');
    }
}
