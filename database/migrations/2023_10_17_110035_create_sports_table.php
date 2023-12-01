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
    public function up(): void
    {
        Schema::create('sports', function (Blueprint $table) {
            $table->string('nom')->nullable(false)->primary();
            $table->string('description');
            $table->integer('annee_ajout')->nullable(false);
            $table->integer('nb_disciplines');
            $table->integer('nb_epreuves')->nullable(false);
            $table->datetime('date_debut')->nullable(false);
            $table->datetime('date_fin');
            $table->datetime('created_at')->nullable(false);
            $table->datetime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('sports');
    }
};
