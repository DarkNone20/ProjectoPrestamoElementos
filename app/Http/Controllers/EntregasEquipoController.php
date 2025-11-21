<?php

namespace App\Http\Controllers;

use App\Models\EntregasEquipo;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // Importante: Necesario para usar la librería PDF

class EntregasEquipoController extends Controller
{
    /**
     * Mostrar listado de entregas de equipos con filtros y exportación
     */
    public function index(Request $request)
    {
        // 1. Obtener usuario autenticado
        $usuarioAutenticado = auth()->user();

        // 2. Iniciar la consulta base
        $query = EntregasEquipo::query();

        // --- APLICAR FILTROS ---

        // Filtro por Fecha (Busca coincidencia con la fecha de creación o entrega)
        if ($request->filled('fecha')) {
            // Nota: Si en tu BD la columna se llama 'fecha_entrega', cámbialo aquí.
            // Si usas los timestamps por defecto, usa 'created_at'.
            $query->whereDate('created_at', $request->fecha); 
        }

        // Filtro por Equipo (Búsqueda parcial o exacta)
        if ($request->filled('equipo')) {
            $query->where('nombre_equipo', 'LIKE', '%' . $request->equipo . '%');
        }

        // --- OBTENER DATOS AUXILIARES ---
        
        // Obtener lista única de equipos para llenar el <select> de filtro en la vista
        $listaEquipos = EntregasEquipo::select('nombre_equipo')
                                      ->distinct()
                                      ->pluck('nombre_equipo');

        // --- LÓGICA DE EXPORTACIÓN A PDF ---
        
        if ($request->has('export_pdf') && $request->export_pdf == 'true') {
            // Obtenemos los resultados filtrados
            $entregas = $query->orderBy('created_at', 'desc')->get();

            // Cargamos la vista del PDF (debes tener creada la vista 'EntregasEquipos.pdf')
            $pdf = Pdf::loadView('EntregasEquipos.pdf', compact('entregas'));

            // Descargamos el archivo
            return $pdf->download('reporte_entregas.pdf');
        }

        // --- VISTA NORMAL ---

        // Obtener resultados finales ordenados
        $entregas = $query->orderBy('created_at', 'desc')->get();

        return view('EntregasEquipos.index', compact('entregas', 'usuarioAutenticado', 'listaEquipos'));
    }

    /**
     * Mostrar formulario para crear nueva entrega
     */
    public function create()
    {
        return view('EntregasEquipos.create');
    }

    /**
     * Guardar una nueva entrega
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_equipo'     => 'required|string|max:150',
            'usuario'           => 'required|string|max:150',
            'auxiliar_entrega'  => 'required|string|max:150',
            'auxiliar_recibe'   => 'required|string|max:150',
            'estado'            => 'required|in:Libre,Remplazo',
            'aprobado'          => 'required|in:Pendiente,Aprobado',
            'archivo'           => 'nullable|file|max:5000'
        ]);

        // Guardar archivo si viene en la petición
        $archivoPath = null;

        if ($request->hasFile('archivo')) {
            $archivoPath = $request->file('archivo')->store('archivos_entregas', 'public');
        }

        // Crear registro en base de datos
        EntregasEquipo::create([
            'nombre_equipo'     => $request->nombre_equipo,
            'usuario'           => $request->usuario,
            'auxiliar_entrega'  => $request->auxiliar_entrega,
            'auxiliar_recibe'   => $request->auxiliar_recibe,
            'estado'            => $request->estado,
            'aprobado'          => $request->aprobado,
            'archivo'           => $archivoPath,
            // Si tienes una columna específica para fecha manual, agrégala aquí,
            // de lo contrario Laravel usará 'created_at' automáticamente.
        ]);

 
        return redirect()
            ->route('entregasEquipos.index')
            ->with('success', 'Entrega registrada correctamente.');
    }


      
    public function aprobar($id)
    {
        // 1. Buscar la entrega por ID
        $entrega = EntregasEquipo::findOrFail($id);

        // 2. Actualizar el estado
        $entrega->aprobado = 'Aprobado';
        $entrega->save();

        // 3. LÓGICA DE ENVÍO DE CORREO
        try {
            // Recolectar los correos de los colaboradores (Auxiliar Entrega y Recibe)
            // Asumimos que en la tabla entregas guardaste el NOMBRE del usuario.
            // Buscamos ese nombre en la tabla 'users' para sacar el 'Correo'.
            
            $correosDestino = [];

            // Buscar correo del Auxiliar Entrega
            $userEntrega = User::where('Nombre', $entrega->auxiliar_entrega)->first();
            if ($userEntrega && $userEntrega->Correo) {
                $correosDestino[] = $userEntrega->Correo;
            }

            // Buscar correo del Auxiliar Recibe
            $userRecibe = User::where('Nombre', $entrega->auxiliar_recibe)->first();
            if ($userRecibe && $userRecibe->Correo) {
                // Evitar duplicados si es la misma persona
                if (!in_array($userRecibe->Correo, $correosDestino)) {
                    $correosDestino[] = $userRecibe->Correo;
                }
            }

            // Si encontramos correos, enviamos el mail
            if (count($correosDestino) > 0) {
                Mail::to($correosDestino)->send(new EntregaAprobada($entrega));
            }

        } catch (\Exception $e) {
            // Si falla el correo (por internet o configuración), no detenemos la app, 
            // pero podrías loguear el error: \Log::error($e->getMessage());
            return redirect()
                ->route('entregasEquipos.index')
                ->with('success', 'Entrega aprobada, pero hubo un error enviando los correos: ' . $e->getMessage());
        }

        // 4. Redireccionar con éxito
        return redirect()
            ->route('entregasEquipos.index')
            ->with('success', 'La entrega ha sido aprobada y se notificó a los colaboradores.');
    }
}