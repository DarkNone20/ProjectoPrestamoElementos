<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; 
use Laravel\Sanctum\HasApiTokens;                      
use Illuminate\Notifications\Notifiable;

class Usuarios extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'usuarios';  
    protected $primaryKey = 'Cedula'; 
    public $incrementing = false;    
    protected $keyType = 'string';   

    protected $fillable = [
        'Cedula', 
        'Nombre', 
        'Alias', 
        'Password', 
        'Cargo'
    ];

    protected $hidden = [
        'Password',
    ];

    
    public function getAuthPassword()
    {
        return $this->Password;
    }
}
