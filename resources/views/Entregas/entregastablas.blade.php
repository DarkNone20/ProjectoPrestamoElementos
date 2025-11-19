<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Entregas</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('assets/style-tablasentregas.css') }}">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>


    <div class="Encabezado bg-primary text-white py-3 shadow-sm">
        <div class="container d-flex justify-content-center align-items-center position-relative">

            <div class="Titulo">
                <h1 class="h3 mb-0">Listado de Entregas</h1>
            </div>
            <div class="Alias ">
                <a href="#">
                    <img src="{{ asset('Imagenes/Icon.png') }}" alt="Icono Usuario">
                    <p>{{ $usuarioAutenticado->Alias ?? 'Admin' }}</p>
                </a>
            </div>
        </div>
    </div>

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
                <li><a href="{{ route('home') }}"><img src="{{ asset('Imagenes/Home.png') }}" alt="Inicio"> Home</a>
                </li>
                <li><a href="{{ route('usuarios.index') }}"><img src="{{ asset('Imagenes/Group.png') }}" alt="Usuarios">
                        Usuarios</a></li>
                <li><a href="{{ route('entregas.tablas') }}"><img src="{{ asset('Imagenes/Elementos.png') }}"
                            alt="Insumos"> Insumos</a></li>
                <li><a href="{{ route('entregas.index') }}"><img src="{{ asset('Imagenes/lista.png') }}"
                            alt="Entregas"> Entregas</a></li>
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

    <div class="container mt-5 mb-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-gradient-primary text-white text-center py-4 rounded-top-4">
                <h2 class="mb-0">Entregas Registradas</h2>
            </div>
            <div class="card-body p-4 p-md-5">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <table class="table table-hover align-middle text-center">
                    <thead class="table-primary">
                        <tr>
                            <!-- <th>ID</th>-->
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
                                <!-- <td>{{ $entrega->id }}</td> -->
                                <td>{{ $entrega->Articulo }}</td>
                                <td>{{ $entrega->Nombre }}</td>
                                <td>{{ $entrega->Caso }}</td>
                                <td>{{ \Carbon\Carbon::parse($entrega->Fecha)->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('entregas.edit', $entrega->id) }}" class="btn btn-editar btn-sm">
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


                <div class="d-flex justify-content-center mt-4">
                    {{ $entregas->links('pagination::bootstrap-5') }}
                </div>

            </div>
        </div>
    </div>


    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <p class="mb-0">&copy; {{ date('Y') }} Sistemas de Entregas.</p>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('Javascript/scriptHome.js') }}"></script>
</body>

</html>
