<?php

namespace App\Http\Controllers;

use App\Models\EntregasDisco; // Modelo de Discos
use App\Mail\EntregaAprobada;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class EntregasDiscoController extends Controller
{
    /**
     * Mostrar listado de entregas de discos con filtros y exportación
     */
    public function index(Request $request)
    {
        $usuarioAutenticado = auth()->user();

        // Query base
        $query = EntregasDisco::query();

        // Filtro por fecha
        if ($request->filled('fecha')) {
            $query->whereDate('fecha_entrega', $request->fecha);
        }

        // Filtro por disco (Cambio de nombre_equipo a nombre_disco)
        if ($request->filled('disco')) {
            $query->where('nombre_disco', 'LIKE', '%' . $request->disco . '%');
        }

        // Lista de discos para filtro (sugerencias)
        $listaDiscos = EntregasDisco::select('nombre_disco')
            ->distinct()
            ->pluck('nombre_disco');

        // Exportar PDF
        if ($request->has('export_pdf')) {
            $entregas = $query->orderBy('created_at', 'desc')->get();
            // Asegúrate de tener la vista EntregasDiscos/pdf.blade.php creada
            $pdf = Pdf::loadView('EntregasDiscos.pdf', compact('entregas'));
            return $pdf->download('reporte_entregas_discos.pdf');
        }

        // Mostrar vista normal
        $entregas = $query->orderBy('created_at', 'desc')->get();

        return view('EntregasDiscos.index', compact(
            'entregas',
            'usuarioAutenticado',
            'listaDiscos'
        ));
    }


    /**
     * Formulario de nueva entrega (Administrador)
     */
    public function create()
    {
        return view('EntregasDiscos.create');
    }

    /**
     * Formulario PÚBLICO de nueva entrega (createDos)
     */
    public function createDos()
    {
        // Retorna la vista específica para el acceso público
        return view('EntregasDiscos.createDos');
    }

    /**
     * Guardar nueva entrega
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_disco'      => 'required|string|max:150', // Validación ajustada
            'usuario'           => 'required|string|max:150',
            'auxiliar_entrega'  => 'required|string|max:150',
            'auxiliar_recibe'   => 'required|string|max:150',
            'fecha_entrega'     => 'required|date',
            'estado'            => 'required|in:Remplazo,Libre',
            'aprobado'          => 'required|in:Pendiente,Aprobado',
            'archivo'           => 'nullable|file|max:5000'
        ]);

        $archivoPath = null;

        if ($request->hasFile('archivo')) {
            // Guardamos en una carpeta separada para orden: archivos_entregas_discos
            $archivoPath = $request->file('archivo')->store('archivos_entregas_discos', 'public');
        }

        EntregasDisco::create([
            'nombre_disco'      => $request->nombre_disco, // Campo ajustado
            'usuario'           => $request->usuario,
            'auxiliar_entrega'  => $request->auxiliar_entrega,
            'auxiliar_recibe'   => $request->auxiliar_recibe,
            'fecha_entrega'     => $request->fecha_entrega,
            'estado'            => $request->estado,
            'aprobado'          => $request->aprobado,
            'archivo'           => $archivoPath,
        ]);

        // Lógica de redirección:
        // Si viene del formulario público (createDos), idealmente lo devolvemos ahí.
        // Si no, lo mandamos al índice administrativo.
        if ($request->has('origen') && $request->origen == 'publico') {
             return redirect()->route('entregasDiscos.createDos')
                ->with('success', 'Entrega de disco registrada correctamente.');
        }

        return redirect()->route('entregasDiscos.index')
            ->with('success', 'Entrega de disco registrada correctamente.');
    }


    /**
     * Aprobar entrega + enviar correos
     */
   public function aprobar($id)
    {
        $entrega = EntregasDisco::findOrFail($id);

        $entrega->aprobado = 'Aprobado';
        $entrega->save();

        try {
            // Correo fijo
            $correosDestino = ['camosquera@icesi.edu.co'];

            // Buscar correo del Auxiliar que entrega
            $userEntrega = User::where('Nombre', $entrega->auxiliar_entrega)->first();
            if ($userEntrega && $userEntrega->Correo) {
                if (!in_array($userEntrega->Correo, $correosDestino)) {
                    $correosDestino[] = $userEntrega->Correo;
                }
            }

            // Buscar correo del Auxiliar que recibe
            $userRecibe = User::where('Nombre', $entrega->auxiliar_recibe)->first();
            if ($userRecibe && $userRecibe->Correo) {
                if (!in_array($userRecibe->Correo, $correosDestino)) {
                    $correosDestino[] = $userRecibe->Correo;
                }
            }

            Mail::to($correosDestino)->send(new EntregaAprobada($entrega));

        } catch (\Exception $e) {

            return redirect()
                ->route('entregasDiscos.index')
                ->with('success', 'Entrega aprobada, pero hubo error enviando correos: ' . $e->getMessage());
        }

        return redirect()
            ->route('entregasDiscos.index')
            ->with('success', 'Entrega aprobada y se enviaron notificaciones.');
    }
}