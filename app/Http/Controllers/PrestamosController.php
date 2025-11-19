<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamos;

class PrestamosController extends Controller
{
    public function index()
    {

 // Usuario logueado (con Alias y Nombre)
        $usuarioAutenticado = auth()->user();


        $prestamos = Prestamos::orderBy('created_at', 'desc')->get();
        return view('Prestamos.index', compact('prestamos','usuarioAutenticado'));
    }

    public function create()
    {
        return view('Prestamos.prestamo'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'Articulo' => 'required|string|max:255',
            'Colaborador' => 'required|string|max:255',
            'Fecha' => 'required|date',
        ]);

        Prestamos::create([
            'Articulo' => $request->Articulo,
            'Colaborador' => $request->Colaborador,
            'Fecha' => $request->Fecha,
        ]);

        return redirect()->route('prestamos.index')->with('success', '¡Préstamo registrado correctamente!');
    }
}
