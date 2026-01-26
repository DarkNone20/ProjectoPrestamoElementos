<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/style-equipos.css') }}">
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
    <button class="menu-toggle" id="menuToggle"><span></span><span></span><span></span></button>

    <!-- MENÚ LATERAL -->
   
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

    <div class="main-content-wrapper">
        <main id="content">
            <div class="container-fluid px-4 py-4">
                <div class="card shadow p-4 card-custom">

                    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                        <h2 class="m-0">Entregas de Equipos</h2>
                        <a href="{{ route('entregasEquipos.create') }}" class="btn btn-primary btn-lg">
                            <i class="bi bi-plus-circle"></i> Nueva Entrega
                        </a>
                    </div>

                    <!-- FILTROS -->
                    <div class="card bg-light border-0 mb-4">
                        <div class="card-body">
                            <form method="GET" action="{{ route('entregasEquipos.index') }}">
                                <div class="row g-3 align-items-end">
                                    <div class="col-md-3">
                                        <label for="fecha" class="form-label fw-bold text-secondary small">Filtrar Fecha:</label>
                                        <input type="date" name="fecha" id="fecha" class="form-control" value="{{ request('fecha') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="equipo" class="form-label fw-bold text-secondary small">Buscar Equipo:</label>
                                        <input type="text" name="equipo" id="equipo" class="form-control" placeholder="Escribe el equipo..." value="{{ request('equipo') }}">
                                    </div>
                                    <div class="col-md-6 d-flex gap-2 flex-wrap">
                                        <button type="submit" class="btn btn-primary text-white"><i class="bi bi-search"></i> Filtrar</button>
                                        <a href="{{ route('entregasEquipos.index') }}" class="btn btn-secondary text-white"><i class="bi bi-x-circle"></i> Limpiar</a>
                                        <button type="submit" name="export_pdf" value="true" class="btn btn-danger ms-auto"><i class="bi bi-file-earmark-pdf"></i> PDF</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <!-- TABLA -->
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle mt-2" style="font-size: 0.8rem; width: 100%; table-layout: auto;">
                            <thead class="table-dark">
                                <tr>
                                    <th class="text-nowrap" title="Nombre del Equipo">Equipo</th>
                                    <th class="text-nowrap" title="Activo Fijo">Act. Fijo</th>
                                    <th class="text-nowrap" title="Marca del Equipo">Marca</th>
                                    <th class="text-nowrap" title="Modelo del Equipo">Modelo</th>
                                    <th class="text-nowrap" title="Nombre del Colaborador">Colaborador</th>
                                    <th class="text-nowrap" title="Motivo de Entrega">Motivo</th>
                                    <th class="text-nowrap" title="Auxiliar que Entrega">Aux. Ent.</th>
                                    <th class="text-nowrap" title="Auxiliar que Recibe">Aux. Rec.</th>
                                    <th class="text-nowrap" title="Estado del Equipo">Estado</th>
                                    <th class="text-nowrap" title="Estado de la Batería">Batería</th>
                                    <th class="text-nowrap" title="¿Con Memoria RAM?">RAM</th>
                                    <th class="text-nowrap" title="¿Con Disco Duro?">Disco</th>
                                    <th class="text-nowrap" title="¿Eliminar Info del Disco?">Elim.</th>
                                    <th class="text-nowrap" title="¿Bisagras en Buen Estado?">Bisag.</th>
                                    <th class="text-nowrap" title="¿Tiene Golpes o Rayones?">Golpes</th>
                                    <th class="text-nowrap" title="¿Viene con Cargador?">Carg.</th>
                                    <th class="text-nowrap" title="Observaciones Adicionales">Obs.</th>
                                    <th class="text-nowrap" title="Estado de Aprobación">Aprob.</th>
                                    <th class="text-nowrap" title="Fecha de Registro">Fecha</th>
                                    <th class="text-nowrap" title="Archivo Adjunto">Archivo</th>
                                    <th class="text-center" title="Acciones">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($entregas as $e)
                                    <tr>
                                        <td class="fw-bold">{{ $e->nombre_equipo }}</td>
                                        <td>{{ $e->activo_fijo ?? '--' }}</td>
                                        <td>{{ $e->marca ?? '--' }}</td>
                                        <td>{{ $e->modelo ?? '--' }}</td>
                                        <td>{{ $e->usuario }}</td>
                                        <td>{{ $e->motivo_entrega ?? '--' }}</td>
                                        <td>{{ $e->auxiliar_entrega }}</td>
                                        <td>{{ $e->auxiliar_recibe }}</td>
                                        <td class="text-center">
                                            @if($e->estado == 'Equipo Libre') <span class="badge bg-warning text-dark">Libre</span>
                                            @elseif($e->estado == 'Equipo para reemplazo') <span class="badge bg-success">Reemplazo</span>
                                            @else <span class="badge bg-secondary">{{ $e->estado }}</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($e->estado_bateria == 'Bueno') <span class="badge bg-success">Bueno</span>
                                            @elseif($e->estado_bateria == 'Regular') <span class="badge bg-warning text-dark">Regular</span>
                                            @elseif($e->estado_bateria == 'Malo') <span class="badge bg-danger">Malo</span>
                                            @else <span class="badge bg-secondary">{{ $e->estado_bateria ?? 'N/A' }}</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($e->con_memoria_ram == 'Si') <i class="bi bi-check-circle-fill text-success"></i>
                                            @else <i class="bi bi-x-circle-fill text-danger"></i>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($e->con_disco_duro == 'Si') <i class="bi bi-check-circle-fill text-success"></i>
                                            @else <i class="bi bi-x-circle-fill text-danger"></i>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($e->eliminar_info_disco == 'Si') <i class="bi bi-check-circle-fill text-success"></i>
                                            @elseif($e->eliminar_info_disco == 'No') <i class="bi bi-x-circle-fill text-danger"></i>
                                            @else <span class="text-muted">N/A</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($e->bisagras_buen_estado == 'Si') <i class="bi bi-check-circle-fill text-success"></i>
                                            @else <i class="bi bi-x-circle-fill text-danger"></i>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($e->tiene_golpes_rayones == 'Si') <i class="bi bi-x-circle-fill text-danger"></i>
                                            @else <i class="bi bi-check-circle-fill text-success"></i>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($e->viene_con_cargador == 'Si') <i class="bi bi-check-circle-fill text-success"></i>
                                            @else <i class="bi bi-x-circle-fill text-danger"></i>
                                            @endif
                                        </td>
                                        <td style="max-width: 80px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="{{ $e->observaciones_adicionales }}">
                                            {{ Str::limit($e->observaciones_adicionales, 15) ?? '--' }}
                                        </td>
                                        <td class="text-center">
                                            @if($e->aprobado == 'Pendiente')
                                                <span class="badge bg-secondary mb-1">Pendiente</span>
                                                <form action="{{ route('entregasEquipos.aprobar', $e->id) }}" method="POST">
                                                    @csrf @method('PATCH')
                                                    <button type="submit" class="btn btn-sm btn-success text-white py-0" onclick="return confirm('¿Aprobar?')">Aprobar</button>
                                                </form>
                                            @else
                                                <span class="badge bg-success">Aprobado</span>
                                            @endif
                                        </td>
                                        <td>{{ $e->created_at->format('Y-m-d') }}</td>
                                        <td class="text-center">
                                            @if($e->archivo)
                                                <a href="{{ asset('storage/' . $e->archivo) }}" target="_blank" class="btn btn-sm btn-info text-white"><i class="bi bi-eye"></i></a>
                                            @else
                                                <span class="text-muted small">--</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex gap-1 justify-content-center">
                                                <!-- EDITAR -->
                                                <a href="{{ route('entregasEquipos.edit', $e->id) }}" target="_blank" class="btn btn-sm btn-warning">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <!-- ELIMINAR -->
                                                <form action="{{ route('entregasEquipos.destroy', $e->id) }}" method="POST" onsubmit="return confirm('¿Eliminar registro?')">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="21" class="text-center text-muted py-4">No hay registros.</td></tr>
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