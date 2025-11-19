<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entregas;

class EntregasTablasController extends Controller
{
    public function index(Request $request)
    {
        $porPagina = 10;

        // Obtener entregas ordenadas por fecha
        $entregas = Entregas::orderBy('Fecha', 'desc')->paginate($porPagina);

        // Usuario logueado (con Alias y Nombre)
        $usuarioAutenticado = auth()->user();

        return view('entregas.entregastablas', [
            'entregas'           => $entregas,
            'usuarioAutenticado' => $usuarioAutenticado,
        ]);
    }

    public function edit($id)
    {
        $entrega = Entregas::findOrFail($id);
        return view('entregas.editar', compact('entrega'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Articulo'   => 'required|string|max:255',
            'Nombre'     => 'required|string|max:255',
            'Caso'       => 'required|numeric',
            'Fecha'      => 'required|date',
        ]);

        $entrega = Entregas::findOrFail($id);
        $entrega->update($request->only(['Articulo', 'Nombre', 'Caso', 'Fecha']));

        return redirect()->route('entregas.tablas')
                         ->with('success', 'Entrega actualizada correctamente');
    }
}
