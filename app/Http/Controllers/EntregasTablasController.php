<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entregas;

class EntregasTablasController extends Controller
{
    public function index(Request $request)
    {
        // Número de registros por página (puedes ajustarlo)
        $porPagina = 10;

        // Obtener entregas ordenadas con paginación
        $entregas = Entregas::orderBy('Fecha', 'desc')->paginate($porPagina);

        return view('entregastablas', compact('entregas'));
    }

    public function edit($id)
    {
        $entrega = Entregas::findOrFail($id);
        return view('entregas.editar', compact('entrega'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Articulo' => 'required|string|max:255',
            'Nombre'   => 'required|string|max:255',
            'Caso'     => 'required|integer|min:1',
            'Fecha'    => 'required|date',
        ]);

        $entrega = Entregas::findOrFail($id);
        $entrega->update($request->only(['Articulo', 'Nombre', 'Caso', 'Fecha']));

        return redirect()->route('entregas.tablas')->with('success', 'Entrega actualizada correctamente');
    }
}
