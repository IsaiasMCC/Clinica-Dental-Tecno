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
        Schema::create('dientes', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_diente');
            $table->integer('cuadrante');
            $table->string('nombre_cuadrante');
            $table->string('nombre_diente');
            // $table->boolean('estado');
            // $table->bigInteger('odontograma_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dientes');
    }
};
