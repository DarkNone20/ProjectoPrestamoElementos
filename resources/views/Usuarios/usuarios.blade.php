<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/style-usuarios.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <title>Gestión de Usuarios</title>
</head>

<body>

  {{-- BOTÓN HAMBURGUESA --}}
  <button class="menu-toggle" id="menuToggle">
    <span></span><span></span><span></span>
  </button>

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

  {{-- CONTENIDO PRINCIPAL CON WRAPPER --}}
  <div id="main-content-wrapper">

    {{-- ENCABEZADO --}}
    <div class="Encabezado">
      <div class="Logo"></div>
      <div class="Titulo">
        <h1>Gestión de Usuarios Administrador</h1>
      </div>
      <div class="Alias">
        <a href="#">
          <img src="{{ asset('Imagenes/Icon.png') }}" alt="Icono Usuario">
          <p>{{ $usuarioAutenticado->Alias ?? 'Admin' }}</p>
        </a>
      </div>
    </div>

    {{-- CONTENIDO PRINCIPAL --}}
    <div class="Principal">
      <div class="Principal-Uno">
        {{-- Mensajes de éxito y errores --}}
        @if(session('success'))
          <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        @if($errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        {{-- FORMULARIO DE REGISTRO --}}
        <div class="card form-card mb-4">
          <div class="card-header form-header">
            <h2 class="mb-0">
              <i class="bi bi-person-plus"></i> Registrar Nuevo Usuario
            </h2>
          </div>
          <div class="card-body form-body">
            <form action="{{ route('usuarios.store') }}" method="POST" class="form-improved">
              @csrf
              <div class="form-container">
                {{-- Tus campos del formulario aquí --}}
                <div class="form-group">
                  <label class="form-label" for="Cedula">
                    <span class="label-text">Cédula</span>
                    <span class="required">*</span>
                  </label>
                  <input type="text" id="Cedula" name="Cedula"
                    class="form-control form-input @error('Cedula') is-invalid @enderror" required
                    placeholder="Ej: 123456789">
                  @error('Cedula')
                    <small class="form-error">{{ $message }}</small>
                  @enderror
                </div>

                <div class="form-group">
                  <label class="form-label" for="Nombre">
                    <span class="label-text">Nombre</span>
                    <span class="required">*</span>
                  </label>
                  <input type="text" id="Nombre" name="Nombre"
                    class="form-control form-input @error('Nombre') is-invalid @enderror" required
                    placeholder="Nombre completo">
                  @error('Nombre')
                    <small class="form-error">{{ $message }}</small>
                  @enderror
                </div>

                <div class="form-group">
                  <label class="form-label" for="Alias">
                    <span class="label-text">Alias</span>
                  </label>
                  <input type="text" id="Alias" name="Alias"
                    class="form-control form-input @error('Alias') is-invalid @enderror"
                    placeholder="Nombre de usuario (opcional)">
                  @error('Alias')
                    <small class="form-error">{{ $message }}</small>
                  @enderror
                </div>

                <div class="form-group">
                  <label class="form-label" for="Password">
                    <span class="label-text">Contraseña</span>
                    <span class="required">*</span>
                  </label>
                  <input type="password" id="Password" name="Password"
                    class="form-control form-input @error('Password') is-invalid @enderror" required
                    placeholder="Mínimo 8 caracteres">
                  @error('Password')
                    <small class="form-error">{{ $message }}</small>
                  @enderror
                </div>

                <div class="form-group">
                  <label class="form-label" for="Cargo">
                    <span class="label-text">Cargo</span>
                  </label>
                  <input type="text" id="Cargo" name="Cargo"
                    class="form-control form-input @error('Cargo') is-invalid @enderror"
                    placeholder="Ej: Administrador (opcional)">
                  @error('Cargo')
                    <small class="form-error">{{ $message }}</small>
                  @enderror
                </div>
              </div>

              <div class="form-actions">
                <button type="submit" class="btn btn-submit">
                  <i class="bi bi-check-circle"></i> Guardar Usuario
                </button>
                <button type="reset" class="btn btn-reset">
                  <i class="bi bi-arrow-counterclockwise"></i> Limpiar
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="Principal-Dos">
        {{-- TABLA DE USUARIOS --}}
        <div class="card">
          <div class="card-header">Lista de Usuarios</div>
          <div class="table-responsive">
            <table class="table table-striped text-center align-middle mb-0">
              <thead class="table-dark">
                <tr>
                  <th>Cédula</th>
                  <th>Nombre</th>
                  <th>Alias</th>
                  <th>Cargo</th>
                  <th>Acción</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($usuarios as $u)
                  <tr>
                    <td>{{ $u->Cedula }}</td>
                    <td>{{ $u->Nombre }}</td>
                    <td>{{ $u->Alias }}</td>
                    <td>{{ $u->Cargo }}</td>
                    <td>
                      <div class="d-flex justify-content-center gap-2">
                        <form action="{{ route('usuarios.destroy', $u->Cedula) }}" method="POST"
                          onsubmit="return confirm('¿Seguro que deseas eliminar este usuario?')">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i> Eliminar
                          </button>
                        </form>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="5" class="text-muted">No hay usuarios registrados</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>

          {{-- PAGINACIÓN --}}
          @if ($usuarios->hasPages())
            <div class="card-footer pagination-footer d-flex justify-content-between align-items-center">
              <div class="pagination-info text-muted">
                Mostrando
                <span class="fw-bold">{{ $usuarios->firstItem() }}</span>
                a
                <span class="fw-bold">{{ $usuarios->lastItem() }}</span>
                de
                <span class="fw-bold">{{ $usuarios->total() }}</span>
                resultados
              </div>

              <ul class="pagination mb-0">
                <li class="page-item {{ $usuarios->onFirstPage() ? 'disabled' : '' }}">
                  <a class="page-link" href="{{ $usuarios->previousPageUrl() }}" aria-label="Anterior">
                    &laquo;
                  </a>
                </li>

                @foreach ($usuarios->getUrlRange(1, $usuarios->lastPage()) as $page => $url)
                  <li class="page-item {{ $usuarios->currentPage() == $page ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                  </li>
                @endforeach

                <li class="page-item {{ $usuarios->currentPage() == $usuarios->lastPage() ? 'disabled' : '' }}">
                  <a class="page-link" href="{{ $usuarios->nextPageUrl() }}" aria-label="Siguiente">
                    &raquo;
                  </a>
                </li>
              </ul>
            </div>
          @endif
        </div>
      </div>
    </div>

    {{-- BOTÓN FLOTANTE --}}
    @if(isset($usuarios) && count($usuarios) > 0)
      <a href="{{ route('user.index', $usuarios[0]->Cedula) }}" class="floating-button">
        <i class="bi bi-person-fill"></i> Gestionar Usuario
      </a>
    @endif

    {{-- PIE DE PÁGINA --}}
    <footer>
      <p class="text-center text-white pt-2">© {{ date('Y') }} Sistema de Préstamos</p>
    </footer>

  </div> {{-- Cierre del main-content-wrapper --}}

  {{-- JS --}}
  <script src="{{ asset('Javascript/scriptHome.js') }}"></script>
</body>

</html>