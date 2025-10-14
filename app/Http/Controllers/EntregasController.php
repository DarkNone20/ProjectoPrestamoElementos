<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entregas;
use Illuminate\Support\Facades\Log;

class EntregasController extends Controller
{
    /**
     * Muestra el formulario o listado de entregas.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $entregas = Entregas::orderBy('created_at', 'desc')->get();
        return view('Entregas.entregas', compact('entregas'));
    }

    /**
     * Muestra el formulario para crear una nueva entrega.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('Entregas.entregas');
    }

    /**
     * Guarda una nueva entrega en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            // Validación de los datos
            $validatedData = $request->validate([
                'Articulo' => 'required|string|max:255',
                'Nombre'   => 'required|string|max:255',
                'Fecha'    => 'required|date',
            ]);

            // Crear el registro
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
}
