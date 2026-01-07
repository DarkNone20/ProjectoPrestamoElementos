<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tu CSS Personalizado -->
    <link rel="stylesheet" href="{{ asset('assets/style-equipos.css') }}">
    <!-- Iconos de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Listado de Entregas</title>
</head>

<body>

    <!-- ENCABEZADO -->
    <div class="Encabezado bg-primary text-white py-3 shadow-sm">
        <div class="container d-flex justify-content-center align-items-center position-relative">
            <div class="Titulo">
                <h1 class="h3 mb-0">Listado de Entregas de Equipos</h1>
            </div>
            <div class="Alias">
                <a href="#">
                    <img src="{{ asset('Imagenes/Icon.png') }}" alt="Icono Usuario">
                    <p>{{ $usuarioAutenticado->Alias ?? 'Admin' }}</p>
                </a>
            </div>
        </div>
    </div>

    <!-- BOTÓN HAMBURGUESA -->
    <button class="menu-toggle" id="menuToggle">
        <span></span><span></span><span></span>
    </button>

    <!-- MENÚ LATERAL -->
    <nav id="sidebar">
        <ul id="navMenu">
            <li class="logo">
                <img src="{{ asset('Imagenes/Logo5.png') }}" alt="Logo">
            </li>
            <div class="Menu">
                <li><a href="{{ route('home') }}"><img src="{{ asset('Imagenes/Home.png') }}"> Home</a></li>
                <li><a href="{{ route('usuarios.index') }}"><img src="{{ asset('Imagenes/Group.png') }}"> Usuarios</a>
                </li>
                <li><a href="{{ route('prestamos.index') }}"><img src="{{ asset('Imagenes/Elementos.png') }}">
                        Insumos</a></li>
                <li><a href="{{ route('entregasEquipos.index') }}"><img src="{{ asset('Imagenes/lista.png') }}">
                        Entregas</a></li>
            </div>
            <div class="Prueba">
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <img src="{{ asset('Imagenes/salir.png') }}"> Logout
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                    @csrf
                </form>
            </div>
        </ul>
    </nav>

    <!-- CONTENIDO PRINCIPAL WRAPPER -->
    <div class="main-content-wrapper">

        <!-- MAIN CONTENT -->
        <main id="content">

            <div class="container py-4">

                <div class="card shadow p-4 card-custom">

                    <!-- TÍTULO Y BOTÓN NUEVA ENTREGA -->
                    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                        <h2 class="m-0">Listado de Entregas</h2>
                        <a href="{{ route('entregasEquipos.create') }}" class="btn btn-primary btn-lg">
                            <i class="bi bi-plus-circle"></i> Nueva Entrega
                        </a>
                    </div>

                    <!-- === ZONA DE FILTROS Y EXPORTACIÓN === -->
                    <div class="card bg-light border-0 mb-4">
                        <div class="card-body">
                            <form method="GET" action="{{ route('entregasEquipos.index') }}">
                                <div class="row g-3 align-items-end">

                                    <!-- Filtro: Fecha -->
                                    <div class="col-md-3">
                                        <label for="fecha" class="form-label fw-bold text-secondary small">Filtrar por
                                            Fecha:</label>
                                        <input type="date" name="fecha" id="fecha" class="form-control"
                                            value="{{ request('fecha') }}">
                                    </div>

                                    <!-- Filtro: Equipo (CAMBIADO A INPUT TEXT) -->
                                    <div class="col-md-3">
                                        <label for="equipo" class="form-label fw-bold text-secondary small">Buscar
                                            Equipo:</label>
                                        <input type="text" name="equipo" id="equipo" class="form-control"
                                            placeholder="Escribe nombre del equipo..." value="{{ request('equipo') }}">
                                    </div>

                                    <!-- Botones de Acción -->
                                    <div class="col-md-6 d-flex gap-2 flex-wrap">
                                        <!-- Botón Buscar -->
                                        <button type="submit" class="btn btn-primary text-white">
                                            <i class="bi bi-search"></i> Filtrar
                                        </button>

                                        <!-- Botón Limpiar -->
                                        <a href="{{ route('entregasEquipos.index') }}"
                                            class="btn btn-secondary text-white">
                                            <i class="bi bi-x-circle"></i> Limpiar
                                        </a>

                                        <!-- Botón PDF (Alineado a la derecha en desktop) -->
                                        <button type="submit" name="export_pdf" value="true"
                                            class="btn btn-danger ms-auto">
                                            <i class="bi bi-file-earmark-pdf"></i> Exportar PDF
                                        </button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- === FIN ZONA FILTROS === -->

                    <!-- MENSAJES DE SESIÓN -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- TABLA DE RESULTADOS -->
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle mt-2">
                            <thead class="table-dark">
                                <tr>
                                    <th>Equipo</th>
                                    <th>Usuario</th>
                                    <th>Aux. Entrega</th>
                                    <th>Aux. Recibe</th>
                                    <th>Estado</th>
                                    <th>Aprobado</th>
                                    <th>Fecha Registro</th>
                                    <th>Archivo</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($entregas as $e)
                                    <tr>
                                        <td class="fw-bold">{{ $e->nombre_equipo }}</td>
                                        <td>{{ $e->usuario }}</td>
                                        <td>{{ $e->auxiliar_entrega }}</td>
                                        <td>{{ $e->auxiliar_recibe }}</td>

                                        <!-- Columna Estado -->
                                        <td class="text-center">
                                            @if($e->estado == 'Libre')
                                                <span class="badge bg-warning text-dark">Libre</span>
                                            @elseif($e->estado == 'Remplazo')
                                                <span class="badge bg-success">Remplazo</span>
                                            @endif
                                        </td>

                                        <!-- === COLUMNA APROBADO MODIFICADA === -->
                                        <td class="text-center">
                                            @if($e->aprobado == 'Pendiente')
                                                <!-- Muestra Badge Pendiente -->
                                                <span class="badge bg-secondary mb-1">Pendiente</span>
                                                
                                                <!-- Botón para Aprobar -->
                                                <div class="mt-1">
                                                    <form action="{{ route('entregasEquipos.aprobar', $e->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-sm btn-success text-white"
                                                                onclick="return confirm('¿Estás seguro de cambiar el estado a Aprobado?')">
                                                            <i class="bi bi-check-circle"></i> Aprobar
                                                        </button>
                                                    </form>
                                                </div>
                                            @else
                                                <!-- Si ya es Aprobado -->
                                                <span class="badge bg-success">Aprobado</span>
                                            @endif
                                        </td>
                                        <!-- =================================== -->

                                        <!-- Fecha -->
                                        <td>{{ $e->created_at->format('Y-m-d H:i') }}</td>

                                        <!-- Columna Archivo -->
                                        <td class="text-center">
                                            @if($e->archivo)
                                                <a href="{{ asset('storage/' . $e->archivo) }}" target="_blank"
                                                    class="btn btn-sm btn-info text-white" title="Ver documento">
                                                    <i class="bi bi-eye"></i> Ver
                                                </a>
                                            @else
                                                <span class="text-muted small fst-italic">Sin archivo</span>
                                            @endif
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center text-muted py-5">
                                            <div class="d-flex flex-column align-items-center">
                                                <i class="bi bi-inbox fs-1 mb-2"></i>
                                                <p class="mb-0">No se encontraron registros con los filtros seleccionados.
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- FIN TABLA -->

                </div>
            </div>

        </main>

    </div>

    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <p class="mb-0">&copy; {{ date('Y') }} Sistemas de Entregas.</p>
    </footer>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('Javascript/scriptHome.js') }}"></script>

</body>

</html>