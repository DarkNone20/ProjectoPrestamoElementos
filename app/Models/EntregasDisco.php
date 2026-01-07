<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntregasDisco extends Model
{
    use HasFactory;

    // Definimos la tabla explícitamente para evitar errores de pluralización automática
    protected $table = 'entregas_discos';

    protected $fillable = [
        'nombre_disco',    
        'fecha_entrega',
        'usuario',
        'archivo', 
        'auxiliar_entrega',
        'auxiliar_recibe',
        'estado',
        'aprobado',
    ];

    public $timestamps = true;
}