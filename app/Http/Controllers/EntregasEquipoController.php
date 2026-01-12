<?php

namespace App\Http\Controllers;

use App\Models\EntregasEquipo;
use App\Mail\EntregaAprobada;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Para manejar archivos
use Barryvdh\DomPDF\Facade\Pdf;

class EntregasEquipoController extends Controller
{
    /**
     * Listado con filtros y exportación
     */
    public function index(Request $request)
    {
        $usuarioAutenticado = auth()->user();
        $query = EntregasEquipo::query();

        // Filtros
        if ($request->filled('fecha')) {
            $query->whereDate('fecha_entrega', $request->fecha);
        }
        if ($request->filled('equipo')) {
            $query->where('nombre_equipo', 'LIKE', '%' . $request->equipo . '%');
        }

        // Exportar PDF
        if ($request->has('export_pdf')) {
            $entregas = $query->orderBy('created_at', 'desc')->get();
            $pdf = Pdf::loadView('EntregasEquipos.pdf', compact('entregas'));
            return $pdf->download('reporte_entregas_equipos.pdf');
        }

        $entregas = $query->orderBy('created_at', 'desc')->get();
        $listaEquipos = EntregasEquipo::select('nombre_equipo')->distinct()->pluck('nombre_equipo');

        return view('EntregasEquipos.index', compact('entregas', 'usuarioAutenticado', 'listaEquipos'));
    }

    public function create()
    {
        return view('EntregasEquipos.create');
    }

    public function createDos()
    {
        return view('EntregasEquipos.createDos');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_equipo'     => 'required|string|max:150',
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
            $archivoPath = $request->file('archivo')->store('archivos_entregas', 'public');
        }

        EntregasEquipo::create([
            'nombre_equipo'     => $request->nombre_equipo,
            'usuario'           => $request->usuario,
            'auxiliar_entrega'  => $request->auxiliar_entrega,
            'auxiliar_recibe'   => $request->auxiliar_recibe,
            'fecha_entrega'     => $request->fecha_entrega,
            'estado'            => $request->estado,
            'aprobado'          => $request->aprobado,
            'archivo'           => $archivoPath,
        ]);

        return redirect()->route('entregasEquipos.index')->with('success', 'Entrega registrada correctamente.');
    }

    // --- MÉTODOS PARA EDITAR ---

    public function edit($id)
    {
        $entrega = EntregasEquipo::findOrFail($id);
        return view('EntregasEquipos.edit', compact('entrega'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_equipo'     => 'required|string|max:150',
            'usuario'           => 'required|string|max:150',
            'auxiliar_entrega'  => 'required|string|max:150',
            'auxiliar_recibe'   => 'required|string|max:150',
            'estado'            => 'required|in:Remplazo,Libre',
            'archivo'           => 'nullable|file|max:5000'
        ]);

        $entrega = EntregasEquipo::findOrFail($id);
        $data = $request->except(['archivo']);

        if ($request->hasFile('archivo')) {
            // Eliminar archivo viejo si existe
            if ($entrega->archivo) {
                Storage::disk('public')->delete($entrega->archivo);
            }
            $data['archivo'] = $request->file('archivo')->store('archivos_entregas', 'public');
        }

        $entrega->update($data);

        return redirect()->route('entregasEquipos.index')->with('success', 'Registro actualizado correctamente.');
    }

    // --- MÉTODO PARA ELIMINAR ---

    public function destroy($id)
    {
        $entrega = EntregasEquipo::findOrFail($id);

        // Eliminar el archivo físico del disco
        if ($entrega->archivo) {
            Storage::disk('public')->delete($entrega->archivo);
        }

        $entrega->delete();

        return redirect()->route('entregasEquipos.index')->with('success', 'La entrega ha sido eliminada correctamente.');
    }

    public function aprobar($id)
    {
        $entrega = EntregasEquipo::findOrFail($id);
        $entrega->aprobado = 'Aprobado';
        $entrega->save();

        try {
            $correosDestino = ['camosquera@icesi.edu.co'];
            $userEntrega = User::where('Nombre', $entrega->auxiliar_entrega)->first();
            if ($userEntrega && $userEntrega->Correo) {
                if (!in_array($userEntrega->Correo, $correosDestino)) $correosDestino[] = $userEntrega->Correo;
            }
            $userRecibe = User::where('Nombre', $entrega->auxiliar_recibe)->first();
            if ($userRecibe && $userRecibe->Correo) {
                if (!in_array($userRecibe->Correo, $correosDestino)) $correosDestino[] = $userRecibe->Correo;
            }
            Mail::to($correosDestino)->send(new EntregaAprobada($entrega));
        } catch (\Exception $e) {
            return redirect()->route('entregasEquipos.index')->with('success', 'Aprobada, pero hubo error en correos.');
        }

        return redirect()->route('entregasEquipos.index')->with('success', 'Entrega aprobada y notificada.');
    }
}