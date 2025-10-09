<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entregas; 
use Illuminate\Support\Facades\Log; 

class EntregasController extends Controller
{
    /**
     * Muestra el formulario para crear una nueva entrega.
     * Corresponde al método GET de la URL /entregas/create
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Carga la vista del formulario principal de entregas
        return view('Entregas.entregas');
    }

    /**
     * Almacena una nueva entrega en la base de datos.
     * Corresponde al método POST de la URL /entregas
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            // 1️⃣ Validación de datos
            $validatedData = $request->validate([
                'Articulo' => 'required|string|max:255',
                'Nombre'   => 'required|string|max:255',
                'Fecha'    => 'required|date',
            ]);

            // 2️⃣ Crear registro
            Entregas::create($validatedData);

            // 3️⃣ Redirigir con mensaje de éxito
            return redirect()->route('entregas.create')->with('success', '¡Entrega registrada exitosamente!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Error de validación al registrar entrega: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->errors())->withInput();

        } catch (\Exception $e) {
            Log::error('Error inesperado al registrar entrega: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Hubo un error al registrar la entrega. Por favor, inténtalo de nuevo.')->withInput();
        }
    }

    /**
     * Muestra una lista de todas las entregas registradas.
     * Ahora usará la misma vista entregas.blade.php para mostrar el listado.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $entregas = Entregas::all();

        // 🔹 Usamos la misma vista entregas.blade.php
        return view('Entregas.entregas', compact('entregas'));
    }
}
