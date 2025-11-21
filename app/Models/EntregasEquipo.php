<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntregasEquipo extends Model
{
    use HasFactory;

    // Nombre real de la tabla
    protected $table = 'entregas_equipos';

    // Campos que se pueden guardar masivamente
    protected $fillable = [
        'nombre_equipo',
        'fecha_entrega',
        'usuario',
        'archivo', 
        'auxiliar_entrega',
        'auxiliar_recibe',
        'estado',
        'aprobado',
    ];

    // Laravel ya maneja created_at y updated_at automáticamente
    public $timestamps = true;
}
