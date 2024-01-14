<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSportTable extends Migration
{
    public function up()
    {
        Schema::create('sport', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sport');
    }
}
