<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/style-prestamos.css') }}">
    <title>Listado de Préstamos</title>
</head>

<body class="bg-light p-4">

<div class="container">
    <div class="card shadow p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="m-0">Listado de Préstamos</h2>
            <a href="{{ route('prestamos.create') }}" class="btn btn-primary btn-lg">Nuevo</a>
        </div>

        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Artículo</th>
                    <th>Colaborador</th>
                    <th>Fecha</th>
                    <th>Registrado</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($prestamos as $p)
                <tr>
                    <td>{{ $p->Articulo }}</td>
                    <td>{{ $p->Colaborador }}</td>
                    <td>{{ $p->Fecha }}</td>
                    <td>{{ $p->created_at->format('d/m/Y H:i') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">No hay registros aún.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-3 text-center">
            <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-lg">Volver</a>
        </div>

    </div>
</div>

</body>
</html>
