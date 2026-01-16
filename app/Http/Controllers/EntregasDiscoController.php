<?php

namespace App\Http\Controllers;

use App\Models\EntregasDisco;
use App\Mail\EntregaDiscoAprobada;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Para manejar archivos
use Barryvdh\DomPDF\Facade\Pdf;

class EntregasDiscoController extends Controller
{
    public function index(Request $request)
    {
        $usuarioAutenticado = auth()->user();
        $query = EntregasDisco::query();

        if ($request->filled('fecha')) {
            $query->whereDate('fecha_entrega', $request->fecha);
        }

        if ($request->filled('disco')) {
            $query->where('nombre_disco', 'LIKE', '%' . $request->disco . '%');
        }

        $listaDiscos = EntregasDisco::select('nombre_disco')
            ->distinct()
            ->pluck('nombre_disco');

        if ($request->has('export_pdf')) {
            $entregas = $query->orderBy('created_at', 'desc')->get();
            $pdf = Pdf::loadView('EntregasDiscos.pdf', compact('entregas'));
            return $pdf->download('reporte_entregas_discos.pdf');
        }

        $entregas = $query->orderBy('created_at', 'desc')->get();

        return view('EntregasDiscos.index', compact(
            'entregas',
            'usuarioAutenticado',
            'listaDiscos'
        ));
    }

    public function create()
    {
        return view('EntregasDiscos.create');
    }

    // --- MÉTODO RESTAURADO ---
    public function createDos()
    {
        return view('EntregasDiscos.createDos');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_disco' => 'required|string|max:150',
            'usuario' => 'required|string|max:150',
            'auxiliar_entrega' => 'required|string|max:150',
            'auxiliar_recibe' => 'required|string|max:150',
            'fecha_entrega' => 'required|date',
            'estado' => 'required|in:Remplazo,Libre',
            'aprobado' => 'required|in:Pendiente,Aprobado',
            'archivo' => 'nullable|file|max:5000'
        ]);

        $archivoPath = null;
        if ($request->hasFile('archivo')) {
            $archivoPath = $request->file('archivo')->store('archivos_entregas_discos', 'public');
        }

        EntregasDisco::create([
            'nombre_disco' => $request->nombre_disco,
            'usuario' => $request->usuario,
            'auxiliar_entrega' => $request->auxiliar_entrega,
            'auxiliar_recibe' => $request->auxiliar_recibe,
            'fecha_entrega' => $request->fecha_entrega,
            'estado' => $request->estado,
            'aprobado' => $request->aprobado,
            'archivo' => $archivoPath,
        ]);

        // SI viene del formulario público → volver al formulario público
        if ($request->input('origen') === 'publico') {
            return redirect()->route('entregasDiscos.createDos')
                ->with('success', 'Entrega de disco registrada correctamente.');
        }

        // SI viene del formulario privado → ir al index
        return redirect()->route('entregasDiscos.index')
            ->with('success', 'Entrega de disco registrada correctamente.');

    }

    public function edit($id)
    {
        $entrega = EntregasDisco::findOrFail($id);
        return view('EntregasDiscos.edit', compact('entrega'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_disco' => 'required|string|max:150',
            'usuario' => 'required|string|max:150',
            'auxiliar_entrega' => 'required|string|max:150',
            'auxiliar_recibe' => 'required|string|max:150',
            'estado' => 'required|in:Remplazo,Libre',
            'archivo' => 'nullable|file|max:5000'
        ]);

        $entrega = EntregasDisco::findOrFail($id);
        $data = $request->except(['archivo']);

        if ($request->hasFile('archivo')) {
            if ($entrega->archivo) {
                Storage::disk('public')->delete($entrega->archivo);
            }
            $data['archivo'] = $request->file('archivo')->store('archivos_entregas_discos', 'public');
        }

        $entrega->update($data);

        return redirect()->route('entregasDiscos.index')
            ->with('success', 'Registro actualizado correctamente.');
    }

    public function destroy($id)
    {
        $entrega = EntregasDisco::findOrFail($id);

        if ($entrega->archivo) {
            Storage::disk('public')->delete($entrega->archivo);
        }

        $entrega->delete();

        return redirect()->route('entregasDiscos.index')
            ->with('success', 'La entrega ha sido eliminada correctamente.');
    }

    public function aprobar($id)
    {
        $entrega = EntregasDisco::findOrFail($id);
        $entrega->aprobado = 'Aprobado';
        $entrega->save();

        try {
            $correosDestino = ['camosquera@icesi.edu.co'];
            $userEntrega = User::where('Nombre', $entrega->auxiliar_entrega)->first();
            if ($userEntrega && $userEntrega->Correo) {
                if (!in_array($userEntrega->Correo, $correosDestino))
                    $correosDestino[] = $userEntrega->Correo;
            }
            $userRecibe = User::where('Nombre', $entrega->auxiliar_recibe)->first();
            if ($userRecibe && $userRecibe->Correo) {
                if (!in_array($userRecibe->Correo, $correosDestino))
                    $correosDestino[] = $userRecibe->Correo;
            }

            Mail::to($correosDestino)->send(new EntregaDiscoAprobada($entrega));
        } catch (\Exception $e) {
            return redirect()->route('entregasDiscos.index')
                ->with('success', 'Entrega aprobada, pero hubo error en correos: ' . $e->getMessage());
        }

        return redirect()->route('entregasDiscos.index')
            ->with('success', 'Entrega aprobada y se enviaron notificaciones.');
    }
}