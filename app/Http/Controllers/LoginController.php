<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'Cedula' => 'required|string',
            'Password' => 'required|string',
        ]);

        $usuario = Usuarios::where('Cedula', $request->Cedula)->first();

        if (!$usuario || !Hash::check($request->password, $usuario->Password)) {
            return response()->json([
                'message' => 'Credenciales incorrectas'
            ], 401);
        }

       
        $token = $usuario->createToken('api-token')->plainTextToken;

        return response()->json([
            'message' => 'Login exitoso',
            'usuario' => [
                'Cedula' => $usuario->Cedula,
                'Nombre' => $usuario->Nombre,
                'Alias' => $usuario->Alias,
                'Cargo' => $usuario->Cargo
            ],
            'token' => $token
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Sesión cerrada correctamente'
        ]);
    }
}
