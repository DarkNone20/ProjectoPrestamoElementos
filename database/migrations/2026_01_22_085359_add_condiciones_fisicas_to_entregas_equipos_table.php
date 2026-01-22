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
            // Nuevo campo para Activo Fijo (separado del nombre del equipo)
            $table->string('activo_fijo', 100)->nullable()->after('nombre_equipo');
            
            // Condiciones físicas del equipo
            $table->enum('con_memoria_ram', ['Si', 'No'])->default('Si')->after('estado');
            $table->enum('con_disco_duro', ['Si', 'No'])->default('Si')->after('con_memoria_ram');
            $table->enum('eliminar_info_disco', ['Si', 'No', 'N/A'])->default('N/A')->after('con_disco_duro');
            $table->enum('bisagras_buen_estado', ['Si', 'No'])->default('Si')->after('eliminar_info_disco');
            $table->enum('tiene_golpes_rayones', ['Si', 'No'])->default('No')->after('bisagras_buen_estado');
            $table->enum('viene_con_cargador', ['Si', 'No'])->default('Si')->after('tiene_golpes_rayones');
            
            // Observaciones adicionales
            $table->text('observaciones_adicionales')->nullable()->after('viene_con_cargador');
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
            $table->dropColumn([
                'activo_fijo',
                'con_memoria_ram',
                'con_disco_duro',
                'eliminar_info_disco',
                'bisagras_buen_estado',
                'tiene_golpes_rayones',
                'viene_con_cargador',
                'observaciones_adicionales'
            ]);
        });
    }
};
