<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte de Entregas</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        h1 { text-align: center; color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #0f5fb9; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .badge { padding: 3px 6px; color: white; border-radius: 3px; font-size: 10px; }
        .bg-warning { background-color: #ffc107; color: black; }
        .bg-success { background-color: #28a745; }
        .bg-info { background-color: #17a2b8; }
        .bg-secondary { background-color: #6c757d; }
    </style>
</head>
<body>

    <h1>Listado de Entregas</h1>
    <p>Fecha de generación: {{ date('d/m/Y H:i') }}</p>
    
    @if(request('fecha'))
        <p>Filtro Fecha: {{ request('fecha') }}</p>
    @endif
    @if(request('equipo'))
        <p>Filtro Equipo: {{ request('equipo') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Equipo</th>
                <th>Usuario</th>
                <th>Aux. Entrega</th>
                <th>Aux. Recibe</th>
                <th>Estado</th>
                <th>Aprobado</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entregas as $e)
                <tr>
                    <td>{{ $e->nombre_equipo }}</td>
                    <td>{{ $e->usuario }}</td>
                    <td>{{ $e->auxiliar_entrega }}</td>
                    <td>{{ $e->auxiliar_recibe }}</td>
                    <td>
                        @if($e->estado == 'Libre')
                            <span class="badge bg-warning">Libre</span>
                        @elseif($e->estado == 'Remplazo')
                            <span class="badge bg-success">Remplazo</span>
                
                        @endif
                    </td>
                    <td>
                        @if($e->aprobado == 'Pendiente')
                            <span class="badge bg-secondary">Pendiente</span>
                        @else
                            <span class="badge bg-success">Aprobado</span>
                        @endif
                    </td>
                    <td>{{ $e->fecha_entrega }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>