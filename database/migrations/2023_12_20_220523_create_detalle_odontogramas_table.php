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
        Schema::create('detalle_odontogramas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('diente_id')->unsigned();
            $table->bigInteger('odontograma_tratamiento_id')->unsigned();
            $table->bigInteger('odontograma_id')->unsigned();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_odontogramas');
    }
};
