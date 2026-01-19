<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/style-equipos.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Listado de Discos</title>
</head>
<body>

    <!-- ENCABEZADO -->
    <div class="Encabezado bg-primary text-white py-3 shadow-sm">
        <div class="container d-flex justify-content-center align-items-center position-relative">
            <div class="Titulo">
                <h1 class="h3 mb-0">Listado de Entregas de Discos</h1>
            </div>
            <div class="Alias">
                <a href="#">
                    <img src="{{ asset('Imagenes/Icon.png') }}" alt="Icono Usuario">
                    <p>{{ $usuarioAutenticado->Alias ?? 'Admin' }}</p>
                </a>
            </div>
        </div>
    </div>

    <!-- SIDEBAR -->
    <button class="menu-toggle" id="menuToggle"><span></span><span></span><span></span></button>
   
  {{-- MENÚ LATERAL --}}
  <nav id="sidebar">
    <ul id="navMenu">
      <li class="logo">
        <img src="{{ asset('Imagenes/Logo5.png') }}" alt="Logo">
      </li>
      <div class="Menu">
        <li><a href="{{ route('home') }}"><img src="{{ asset('Imagenes/Home.png') }}" alt="Inicio"> Home</a></li>
        <li><a href="{{ route('usuarios.index') }}"><img src="{{ asset('Imagenes/Group.png') }}" alt="Usuarios">
            Usuarios</a></li>
        <li><a href="{{ route('entregas.tablas') }}"><img src="{{ asset('Imagenes/Elementos.png') }}" alt="Insumos">
            Insumos</a></li>
        <li><a href="{{ route('prestamos.index') }}"><img src="{{ asset('Imagenes/lista.png') }}" alt="Entregas">
            Entregas</a></li>
        <li><a href="{{ route('entregasDiscos.index') }}"><img src="{{ asset('Imagenes/Discos.png') }}" alt="Discos">
            Discos</a></li>
        <li><a href="{{ route('entregasEquipos.index') }}"><img src="{{ asset('Imagenes/Pc.png') }}" alt="Portatiles">
            Portatiles</a></li>
      </div>
      <div class="Prueba">
        <li>
          <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <img src="{{ asset('Imagenes/salir.png') }}" alt="Salir"> Logout
          </a>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
          @csrf
        </form>
      </div>
    </ul>
  </nav>

    <!-- CONTENIDO -->
    <div class="main-content-wrapper">
        <main id="content">
            <div class="container py-4">
                <div class="card shadow p-4 card-custom">

                    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                        <h2 class="m-0">Entregas de Discos</h2>
                        <a href="{{ route('entregasDiscos.create') }}" class="btn btn-primary btn-lg">
                            <i class="bi bi-plus-circle"></i> Nueva Entrega
                        </a>
                    </div>

                    <!-- FILTROS -->
                    <div class="card bg-light border-0 mb-4">
                        <div class="card-body">
                            <form method="GET" action="{{ route('entregasDiscos.index') }}">
                                <div class="row g-3 align-items-end">
                                    <div class="col-md-3">
                                        <label for="fecha" class="form-label fw-bold text-secondary small">Fecha:</label>
                                        <input type="date" name="fecha" id="fecha" class="form-control" value="{{ request('fecha') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="disco" class="form-label fw-bold text-secondary small">Buscar Disco:</label>
                                        <input type="text" name="disco" id="disco" class="form-control" placeholder="Nombre del disco..." value="{{ request('disco') }}">
                                    </div>
                                    <div class="col-md-6 d-flex gap-2 flex-wrap">
                                        <button type="submit" class="btn btn-primary text-white"><i class="bi bi-search"></i> Filtrar</button>
                                        <a href="{{ route('entregasDiscos.index') }}" class="btn btn-secondary text-white"><i class="bi bi-x-circle"></i> Limpiar</a>
                                        <button type="submit" name="export_pdf" value="true" class="btn btn-danger ms-auto"><i class="bi bi-file-earmark-pdf"></i> PDF</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- ALERTAS -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <!-- TABLA -->
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle mt-2">
                            <thead class="table-dark">
                                <tr>
                                    <th>Disco</th>
                                    <th>Usuario</th>
                                    <th>Aux. Entrega</th>
                                    <th>Aux. Recibe</th>
                                    <th>Estado</th>
                                    <th>Aprobado</th>
                                    <th>Fecha</th>
                                    <th>Archivo</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($entregas as $e)
                                    <tr>
                                        <td class="fw-bold">{{ $e->nombre_disco }}</td>
                                        <td>{{ $e->usuario }}</td>
                                        <td>{{ $e->auxiliar_entrega }}</td>
                                        <td>{{ $e->auxiliar_recibe }}</td>
                                        <td class="text-center">
                                            @if($e->estado == 'Libre') <span class="badge bg-warning text-dark">Libre</span>
                                            @elseif($e->estado == 'Remplazo') <span class="badge bg-success">Remplazo</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($e->aprobado == 'Pendiente')
                                                <span class="badge bg-secondary mb-1">Pendiente</span>
                                                <div class="mt-1">
                                                    <form action="{{ route('entregasDiscos.aprobar', $e->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-sm btn-success text-white" onclick="return confirm('¿Aprobar?')">
                                                            <i class="bi bi-check-circle"></i> Aprobar
                                                        </button>
                                                    </form>
                                                </div>
                                            @else
                                                <span class="badge bg-success">Aprobado</span>
                                            @endif
                                        </td>
                                        <td>{{ $e->created_at->format('Y-m-d H:i') }}</td>
                                        <td class="text-center">
                                            @if($e->archivo)
                                                <a href="{{ asset('storage/' . $e->archivo) }}" target="_blank" class="btn btn-sm btn-info text-white"><i class="bi bi-eye"></i></a>
                                            @else
                                                <span class="text-muted small">--</span>
                                            @endif
                                        </td>
                                        <!-- NUEVAS ACCIONES -->
                                        <td class="text-center">
                                            <div class="d-flex gap-2 justify-content-center">
                                                <a href="{{ route('entregasDiscos.edit', $e->id) }}" target="_blank" class="btn btn-sm btn-warning" title="Editar">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                
                                                <form action="{{ route('entregasDiscos.destroy', $e->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este registro?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Eliminar">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="9" class="text-center text-muted">No hay entregas de discos registradas.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('Javascript/scriptHome.js') }}"></script>
</body>
</html>