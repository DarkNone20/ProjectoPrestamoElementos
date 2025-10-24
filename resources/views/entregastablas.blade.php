<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Entregas</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="{{ asset('assets/style-tablasentregas.css') }}">

    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <!-- Encabezado -->
    <div class="Encabezado bg-primary text-white py-3 shadow-sm">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="Titulo">
                <h1 class="h3 mb-0">Listado de Entregas</h1>
            </div>
            <div class="Alias d-flex align-items-center">
                <img src="{{ asset('Imagenes/Icon.png') }}" alt="Usuario" class="rounded-circle me-2" style="width: 40px; height: 40px;">
                <p class="mb-0 fw-bold d-none d-md-block">JJCASTILLO</p>
            </div>
        </div>
    </div>

    <!-- Contenido principal -->
    <main class="flex-grow-1">
        <div class="container mt-5 mb-5">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-gradient-primary text-white text-center py-4 rounded-top-4">
                    <h2 class="mb-0"><i class="fas fa-table me-2"></i>Entregas Registradas</h2>
                </div>
                <div class="card-body p-4 p-md-5">

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <table class="table table-hover align-middle text-center">
                        <thead class="table-primary">
                            <tr>
                                <th>ID</th>
                                <th>Artículo</th>
                                <th>Auxiliar</th>
                                <th>Caso</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($entregas as $entrega)
                                <tr>
                                    <td>{{ $entrega->id }}</td>
                                    <td>{{ $entrega->Articulo }}</td>
                                    <td>{{ $entrega->Nombre }}</td>
                                    <td>{{ $entrega->Caso }}</td>
                                    <td>{{ \Carbon\Carbon::parse($entrega->Fecha)->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route('entregas.edit', $entrega->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-muted">No hay entregas registradas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- 🔹 Paginación -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $entregas->links('pagination::bootstrap-5') }}
                    </div>

                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <p class="mb-0">&copy; {{ date('Y') }} Sistemas de Entregas. Todos los derechos reservados.</p>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
