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
        Schema::create('entregas_equipos', function (Blueprint $table) {
            $table->id();

            $table->string('nombre_equipo');
            $table->date('fecha_entrega')->nullable();

            // Usuario que realiza el préstamo (puede ser string o FK)
            $table->string('usuario');

            // Archivo subido (ruta)
            $table->string('archivo')->nullable();

            // Auxiliares
            $table->string('auxiliar_entrega')->nullable();
            $table->string('auxiliar_recibe')->nullable();

            // Estado (ej: entregado, devuelto, pendiente...)
            $table->string('estado')->default('pendiente');

            // Aprobado (true/false)
            $table->boolean('aprobado')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entregas_equipos');
    }
};
