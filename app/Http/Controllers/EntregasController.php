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
        // Esta función simplemente carga la vista que contiene el formulario.
        // El formulario ya está diseñado para ser moderno y responsive.
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
        // 1. Validación de los datos del formulario
        try {
            $validatedData = $request->validate([
                'Articulo' => 'required|string|max:255',
                'Nombre' => 'required|string|max:255',
                'Fecha' => 'required|date', 
            ]);

            // 2. Crear una nueva instancia del modelo Entrega y asignar los datos
            Entregas::create($validatedData);

           
            // 3. Redirigir al usuario con un mensaje de éxito
            return redirect()->route('entregas.create')->with('success', '¡Entrega registrada exitosamente!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            
            Log::error('Error de validación al registrar entrega: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->errors())->withInput();

        } catch (\Exception $e) {
            // Captura cualquier otro error inesperado
            Log::error('Error inesperado al registrar entrega: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Hubo un error al registrar la entrega. Por favor, inténtalo de nuevo.')->withInput();
        }
    }

    /**
     * Muestra una lista de todas las entregas (opcional, para una vista de listado).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $entregas = Entregas::all(); 
        return view('Entregas.listado', compact('entregas')); 
    }

}