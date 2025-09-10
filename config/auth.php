<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | Controla el guard predeterminado y las opciones de restablecimiento de
    | contraseña. Deben coincidir con las claves definidas en guards y passwords.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'Passwords' => 'Usuarios', 
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Aquí defines los guards para tu aplicación. En este caso usamos el
    | provider 'Usuarios' que apunta a tu modelo App\Models\Usuarios.
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'Usuarios',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | Los providers definen cómo se obtienen los usuarios. Usamos el driver
    | Eloquent con el modelo App\Models\Usuarios.
    |
    */

    'providers' => [
        'Usuarios' => [
            'driver' => 'eloquent',
            'model' => App\Models\Usuarios::class,
        ],

        // Si quisieras usar la base de datos directamente:
        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | Configuración para el restablecimiento de contraseñas. La clave 'users'
    | debe coincidir con defaults.passwords. Usa el provider 'Usuarios'.
    |
    */

    'passwords' => [
        'Usuarios' => [
            'provider' => 'Usuarios',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Tiempo en segundos antes de que caduque la confirmación de contraseña.
    | Por defecto, tres horas (10800 segundos).
    |
    */

    'password_timeout' => 10800,

];
