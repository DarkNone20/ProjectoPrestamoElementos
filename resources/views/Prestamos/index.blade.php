<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/style-prestamo.css') }}">
    <title>Listado de Préstamos</title>
</head>

<body>



    <div class="Encabezado bg-primary text-white py-3 shadow-sm">
        <div class="container d-flex justify-content-center align-items-center position-relative">

            <div class="Titulo">
                <h1 class="h3 mb-0">Listado de Entregas</h1>
            </div>
            <div class="Alias">
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
                <li><a href="{{ route('home') }}"><img src="{{ asset('Imagenes/Home.png') }}"> Home</a></li>
                <li><a href="{{ route('usuarios.index') }}"><img src="{{ asset('Imagenes/Group.png') }}"> Usuarios</a>
                </li>
                <li><a href="{{ route('entregas.tablas') }}"><img src="{{ asset('Imagenes/Elementos.png') }}">
                        Insumos</a></li>
                <li><a href="{{ route('entregas.index') }}"><img src="{{ asset('Imagenes/lista.png') }}"> Entregas</a>
                </li>
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

    {{-- CONTENIDO PRINCIPAL --}}
    <main id="content">

        <div class="container py-4">

            <div class="card shadow p-4 card-custom">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="m-0">Listado de Préstamos</h2>
                    <a href="{{ route('prestamos.create') }}" class="btn btn-primary btn-lg">Nuevo</a>
                </div>

                <table class="table table-hover table-bordered align-middle">
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


            </div>

        </div>

    </main>
    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <p class="mb-0">&copy; {{ date('Y') }} Sistemas de Entregas.</p>
    </footer>



     <script src="{{ asset('Javascript/scriptHome.js') }}"></script>

</body>

</html>
