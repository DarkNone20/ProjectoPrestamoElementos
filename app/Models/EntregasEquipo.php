<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntregasEquipo extends Model
{
    use HasFactory;


    protected $table = 'entregas_equipos';

    protected $fillable = [
        'nombre_equipo',
        'activo_fijo',
        'marca',
        'modelo',
        'fecha_entrega',
        'usuario',
        'archivo', 
        'auxiliar_entrega',
        'auxiliar_recibe',
        'estado',
        'aprobado',
        // Condiciones físicas
        'con_memoria_ram',
        'con_disco_duro',
        'eliminar_info_disco',
        'bisagras_buen_estado',
        'tiene_golpes_rayones',
        'viene_con_cargador',
        'estado_bateria',
        'motivo_entrega',
        'observaciones_adicionales',
    ];


    public $timestamps = true;
}
