<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        $paginaActual = $request->input('pagina', 1); 
        $elementosPorPagina = $request->input('per_page', 10);
    
        $query = Usuarios::query();
        $totalElementos = $query->count();
        $totalPaginas = ceil($totalElementos / $elementosPorPagina);
    
        $usuarios = $query
            ->skip(($paginaActual - 1) * $elementosPorPagina)
            ->take($elementosPorPagina)
            ->get();
    
        // Obtener el usuario autenticado
        $usuarioAutenticado = auth()->user();
    
        return view('Usuarios.usuarios', compact('usuarios', 'paginaActual', 'totalPaginas', 'elementosPorPagina', 'usuarioAutenticado'));
    }

    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Cedula' => 'required|string|max:20|unique:UsuariosAdmin,Cedula',
            'Nombre' => 'required|string|max:50',
            'Alias' => 'nullable|string|max:50',
            'Password' => 'required|string|min:6',
            'Cargo' => 'nullable|string|max:50',
        ]);

        Usuarios::create([
            'Cedula' => $validatedData['Cedula'],
            'Nombre' => $validatedData['Nombre'],
            'Alias' => $validatedData['Alias'],
            'Password' => Hash::make($validatedData['Password']),
            'Cargo' => $validatedData['Cargo'],
        ]);

        return redirect()->route('usuarios.index')
                         ->with('success', 'Usuario creado exitosamente');
    }

    public function destroy($cedula)
    {
        $usuario = Usuarios::findOrFail($cedula);
        $usuario->delete();
        return back()->with('success', 'Usuario eliminado correctamente');
    }
}
