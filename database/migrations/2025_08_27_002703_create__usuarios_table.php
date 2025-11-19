<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user', function (Blueprint $table) {
            $table->string("Cedula", 20)->primary();
            $table->string("Nombre", 60);
            $table->string("Alias", 50)->nullable();
            $table->string("password");
            $table->string("Cargo", 50)->nullable();
            $table->string("Correo", 80)->nullable()->unique();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
