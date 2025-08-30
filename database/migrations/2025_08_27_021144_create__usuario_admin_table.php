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
        Schema::create('usuarioAdmin', function (Blueprint $table) {
            $table->string("Cedula" ,20)->primary();
            $table->string("Nombre",60)->nullable();
            $table->string("Alias",15)->nullable();
            $table->string("Password",300)->nullable();
            $table->string("Cargo",50)->nullable();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarioAdmin');
    }
};
