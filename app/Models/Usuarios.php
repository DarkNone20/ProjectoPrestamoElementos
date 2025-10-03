<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; 
use Laravel\Sanctum\HasApiTokens;                      
use Illuminate\Notifications\Notifiable;

class Usuarios extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'usuarioadmin';  
    protected $primaryKey = 'Cedula'; 
    public $incrementing = false;    
    protected $keyType = 'string';   

    // 👇 Esto evita que intente usar created_at / updated_at
    public $timestamps = false;

    protected $fillable = [
        'Cedula', 
        'Nombre', 
        'Alias', 
        'Password', 
        'Cargo'
    ];

    protected $hidden = [
        'Password',
        'remember_token', 
    ];

    public function getAuthPassword()
    {
        return $this->Password;
    }
}
