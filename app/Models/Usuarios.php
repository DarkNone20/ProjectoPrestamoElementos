<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; 
use Laravel\Sanctum\HasApiTokens;                      
use Illuminate\Notifications\Notifiable;

class Usuarios extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * Nombre de la tabla en la base de datos
     */
    protected $table = 'usuarioadmin';  

    /**
     * Clave primaria personalizada
     */
    protected $primaryKey = 'Cedula'; 

    /**
     * Indica si la clave primaria es autoincremental
     */
    public $incrementing = false;    

    /**
     * Tipo de la clave primaria
     * Usa 'string' si manejas texto, o 'int' si Cedula es numérica
     */
    protected $keyType = 'string';   

    /**
     * Campos que se pueden asignar masivamente
     */
    protected $fillable = [
        'Cedula', 
        'Nombre', 
        'Alias', 
        'Password', 
        'Cargo'
    ];

    /**
     * Campos ocultos cuando el modelo se convierte en array o JSON
     */
    protected $hidden = [
        'Password',
        'remember_token', 
    ];

    /**
     * Sobrescribe el método para indicar a Laravel qué columna contiene el hash de la contraseña.
     */
    public function getAuthPassword()
    {
        return $this->Password;
    }
}
