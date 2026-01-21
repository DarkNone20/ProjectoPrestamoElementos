<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entregas;
use App\Models\EntregasEquipo;
use App\Models\EntregasDisco;
use App\Models\Prestamos;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function showHome()
    {
        return view('Home.Insumos');
    }

    public function dashboard()
    {
        // Contadores totales
        $totalEntregas = Entregas::count();
        $totalEquipos = EntregasEquipo::count();
        $totalDiscos = EntregasDisco::count();
        $totalPrestamos = Prestamos::count();

        // Estados de aprobación (el campo tiene valores como "Aprobado", "Pendiente", etc.)
        $pendientes = EntregasEquipo::where('aprobado', '!=', 'Aprobado')->count() 
                    + EntregasDisco::where('aprobado', '!=', 'Aprobado')->count();
        $aprobados = EntregasEquipo::where('aprobado', 'Aprobado')->count() 
                   + EntregasDisco::where('aprobado', 'Aprobado')->count();

        // Estadísticas del mes actual
        $inicioMes = Carbon::now()->startOfMonth();
        $finMes = Carbon::now()->endOfMonth();

        $entregasMes = Entregas::whereBetween('Fecha', [$inicioMes, $finMes])->count();
        $equiposMes = EntregasEquipo::whereBetween('fecha_entrega', [$inicioMes, $finMes])->count();
        $discosMes = EntregasDisco::whereBetween('fecha_entrega', [$inicioMes, $finMes])->count();
        $prestamosMes = Prestamos::whereBetween('Fecha', [$inicioMes, $finMes])->count();

        // Últimos registros (5 más recientes)
        $ultimosEquipos = EntregasEquipo::orderBy('created_at', 'desc')->take(5)->get();
        $ultimosDiscos = EntregasDisco::orderBy('created_at', 'desc')->take(5)->get();
        $ultimasEntregas = Entregas::orderBy('Fecha', 'desc')->take(5)->get();

        // Datos para gráficos - Entregas por mes (últimos 12 meses)
        $entregasPorMes = [];
        $equiposPorMes = [];
        $discosPorMes = [];
        
        for ($i = 11; $i >= 0; $i--) {
            $mes = Carbon::now()->subMonths($i);
            $inicio = $mes->copy()->startOfMonth();
            $fin = $mes->copy()->endOfMonth();
            
            $entregasPorMes[] = Entregas::whereBetween('Fecha', [$inicio, $fin])->count();
            $equiposPorMes[] = EntregasEquipo::whereBetween('fecha_entrega', [$inicio, $fin])->count();
            $discosPorMes[] = EntregasDisco::whereBetween('fecha_entrega', [$inicio, $fin])->count();
        }

        // Porcentajes de aprobación (el campo tiene string "Aprobado")
        $totalEquiposAprobados = EntregasEquipo::where('aprobado', 'Aprobado')->count();
        $totalDiscosAprobados = EntregasDisco::where('aprobado', 'Aprobado')->count();
        
        $porcentajeEquiposAprobados = $totalEquipos > 0 
            ? round(($totalEquiposAprobados / $totalEquipos) * 100) : 0;
        $porcentajeDiscosAprobados = $totalDiscos > 0 
            ? round(($totalDiscosAprobados / $totalDiscos) * 100) : 0;

        return view('Home.dashboard', compact(
            'totalEntregas',
            'totalEquipos',
            'totalDiscos',
            'totalPrestamos',
            'pendientes',
            'aprobados',
            'entregasMes',
            'equiposMes',
            'discosMes',
            'prestamosMes',
            'ultimosEquipos',
            'ultimosDiscos',
            'ultimasEntregas',
            'entregasPorMes',
            'equiposPorMes',
            'discosPorMes',
            'porcentajeEquiposAprobados',
            'porcentajeDiscosAprobados'
        ));
    }
}
