<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entregas;
use Illuminate\Support\Facades\Log;

class EntregasController extends Controller
{
    /**
     * Muestra el listado de entregas.
     */
    public function index()
    {
        $entregas = Entregas::orderBy('created_at', 'desc')->get();
        return view('Entregas.entregas', compact('entregas'));
    }

    /**
     * Muestra el formulario para crear una nueva entrega.
     */
    public function create()
    {
        return view('Entregas.entregas');
    }

    /**
     * Guarda una nueva entrega en la base de datos.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'Articulo' => 'required|string|max:255',
                'Nombre'   => 'required|string|max:255',
                'Caso' => 'required|numeric',
                'Fecha'    => 'required|date',
            ]);

            Entregas::create($validatedData);

            return redirect()
                ->route('entregas.index')
                ->with('success', '¡Entrega registrada exitosamente!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Error de validación al registrar entrega: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->errors())->withInput();

        } catch (\Exception $e) {
            Log::error('Error inesperado al registrar entrega: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Hubo un error al registrar la entrega.')->withInput();
        }
    }

    /**
     * Muestra el formulario para editar una entrega existente.
     */
    public function edit($id)
    {
        $entrega = Entregas::findOrFail($id);
        return view('Entregas.edit', compact('entrega'));
    }

    /**
     * Actualiza los datos de una entrega existente.
     */
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'Articulo' => 'required|string|max:255',
                'Nombre'   => 'required|string|max:255',
                'Caso' => 'required|numeric',
                'Fecha'    => 'required|date',
            ]);

            $entrega = Entregas::findOrFail($id);
            $entrega->update($validatedData);

            return redirect()
                ->route('entregas.index')
                ->with('success', 'Entrega actualizada correctamente.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Error de validación al actualizar entrega: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->errors())->withInput();

        } catch (\Exception $e) {
            Log::error('Error inesperado al actualizar entrega: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Hubo un error al actualizar la entrega.')->withInput();
        }
    }
}
