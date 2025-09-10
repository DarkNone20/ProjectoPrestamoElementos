<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\Usuarios;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout', 'apiLogout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validar campos
        $credentials = $request->validate([
            'Cedula'   => 'required|string',
            'Password' => 'required|string',
        ]);

        // Buscar usuario por Cedula
        $usuario = Usuarios::where('Cedula', $credentials['Cedula'])->first();

        // Verificar contraseña usando Hash
        if ($usuario && Hash::check($credentials['Password'], $usuario->Password)) {
            Auth::login($usuario); // Login manual
            $request->session()->regenerate(); // Evitar session fixation
            Log::info('Usuario autenticado', ['id' => $usuario->Cedula]);
            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'loginError' => 'Usuario o contraseña incorrectos',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    // Login API
    public function apiLogin(Request $request)
    {
        $request->validate([
            'Cedula'   => 'required|string',
            'Password' => 'required|string',
        ]);

        $usuario = Usuarios::where('Cedula', $request->Cedula)->first();

        if (!$usuario || !Hash::check($request->Password, $usuario->Password)) {
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }

        $token = $usuario->createToken('api-token')->plainTextToken;

        return response()->json([
            'message' => 'Login exitoso',
            'usuario' => [
                'Cedula' => $usuario->Cedula,
                'Nombre' => $usuario->Nombre,
                'Alias'  => $usuario->Alias,
                'Cargo'  => $usuario->Cargo,
            ],
            'token' => $token,
        ]);
    }

    public function apiLogout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Sesión cerrada correctamente']);
    }
}
