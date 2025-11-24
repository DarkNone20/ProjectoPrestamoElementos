<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
    {
        Schema::create('entregas_discos', function (Blueprint $table) {
            $table->id();
            // Cambiamos 'nombre_equipo' por 'nombre_disco'
            $table->string('nombre_disco', 150); 
            $table->date('fecha_entrega');
            $table->string('usuario', 150);
            $table->string('archivo')->nullable(); // Para la ruta del archivo (puede ser null)
            $table->string('auxiliar_entrega', 150);
            $table->string('auxiliar_recibe', 150);
            
            // Enums basados en tu validación del controlador
            $table->enum('estado', ['Remplazo', 'Libre']);
            $table->enum('aprobado', ['Pendiente', 'Aprobado'])->default('Pendiente');
            
            $table->timestamps(); // Crea created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('entregas_discos');
    }
};
