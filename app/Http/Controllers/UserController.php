<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $elementosPorPagina = 5;
        $usuarios = User::paginate($elementosPorPagina);
        $usuarioAutenticado = auth()->user();

        return view('Usuarios.user', compact('usuarios', 'usuarioAutenticado'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Cedula'   => 'required|string|max:20|unique:user,Cedula',
            'Nombre'   => 'required|string|max:60',
            'Alias'    => 'nullable|string|max:15',
            'Password' => 'required|string|min:6',
            'Cargo'    => 'nullable|string|max:50',
            'Correo'   => 'nullable|string|email|max:80'
        ]);

        User::create([
            'Cedula'   => $validatedData['Cedula'],
            'Nombre'   => $validatedData['Nombre'],
            'Alias'    => $validatedData['Alias'] ?? null,
            'password' => Hash::make($validatedData['Password']),
            'Cargo'    => $validatedData['Cargo'] ?? null,
            'Correo'   => $validatedData['Correo'] ?? null,
        ]);

        return redirect()->route('user.index')
                         ->with('success', 'Usuario creado exitosamente');
    }

    public function destroy($cedula)
    {
        $usuario = User::findOrFail($cedula);
        $usuario->delete();

        return back()->with('success', 'Usuario eliminado correctamente');
    }

    // AGREGA ESTA FUNCIÓN AL FINAL DE TU CONTROLADOR
    public function buscar(Request $request)
    {
        $term = $request->input('term');

        // Buscamos coincidencias por Nombre
        $usuarios = User::where('Nombre', 'LIKE', "%{$term}%")
            ->limit(10)
            ->get(['Cedula', 'Nombre']); // Traemos Cedula y Nombre

        return response()->json($usuarios);
    }
}