<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout', 'apiLogout');
    }

    // --- LOGIN WEB ---
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'DocumentoId' => 'required|string',
            'password' => 'required|string',
        ]);

        $usuario = Usuarios::where('Cedula', $request->DocumentoId)->first();

        if (!$usuario || !Hash::check($request->password, $usuario->Password)) {
            return back()->withErrors([
                'loginError' => 'Usuario o contraseña incorrectos',
            ])->withInput();
        }

        Auth::login($usuario);
        return redirect()->intended('/home');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    // --- LOGIN API ---
    public function apiLogin(Request $request)
    {
        $request->validate([
            'Cedula' => 'required|string',
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
                'Alias' => $usuario->Alias,
                'Cargo' => $usuario->Cargo
            ],
            'token' => $token
        ]);
    }

    public function apiLogout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Sesión cerrada correctamente']);
    }
}
