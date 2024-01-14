<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSportifTable extends Migration
{
    public function up()
    {
        Schema::create('sportif', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_de_naissance');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sportif');
    }
}
