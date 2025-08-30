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
        Schema::create('insumos', function (Blueprint $table) {
            
            $table->increments('IdInsumos');
            $table->string("Articulo",45)->nullable();
            $table->date('FechaE')->nullable();
            $table->string("Modelo",45)->nullable();
            $table->string("Estado")->nullable();
            $table->date('FechaD');
     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insumos');
    }
};
