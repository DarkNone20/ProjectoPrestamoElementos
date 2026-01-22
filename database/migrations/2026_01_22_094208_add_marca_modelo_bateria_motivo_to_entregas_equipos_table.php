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
    public function up()
    {
        Schema::table('entregas_equipos', function (Blueprint $table) {
            // Marca del equipo
            $table->enum('marca', ['HP', 'Lenovo', 'Dell', 'Otro'])->nullable()->after('activo_fijo');
            
            // Modelo del equipo (texto libre)
            $table->string('modelo', 150)->nullable()->after('marca');
            
            // Estado de la batería
            $table->enum('estado_bateria', ['Bueno', 'Regular', 'Malo', 'Sin batería'])->nullable()->after('viene_con_cargador');
            
            // Motivo de entrega
            $table->enum('motivo_entrega', ['Paz y salvo', 'Cambio de equipo', 'Otro'])->nullable()->after('estado_bateria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entregas_equipos', function (Blueprint $table) {
            $table->dropColumn(['marca', 'modelo', 'estado_bateria', 'motivo_entrega']);
        });
    }
};
