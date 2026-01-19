<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('assets/style-home.css') }}">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Insumos de Prestamos</title>
</head>

<body>

  <button class="menu-toggle" id="menuToggle">
    <span></span>
    <span></span>
    <span></span>

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
  <div class="Encabezado">
    <div class="Logo"></div>
    <div class="Titulo">
      <h1>Sistema de Prestamos</h1>
    </div>
    <div class="Alias">
      <a href="">
        <img src="{{ asset('Imagenes/Icon.png') }}" alt="Logo">
        <p>JJCASTILLO</p>
      </a>
    </div>

  </div>

  <div class="Principal">
    <div class="Principal-Uno">
      <div class="P-Uno">

      </div>
      <div class="P-Dos">

      </div>
      <div class="P-Tres">

      </div>
    </div>
    <div class="Principal-Dos">
      <div class="P-Uno">

      </div>
      <div class="P-Dos">

      </div>
      <div class="P-Tres">

      </div>
    </div>
    <div class="Principal-Tres">
      <div class="P-Uno">

      </div>
      <div class="P-Dos">

      </div>
      <div class="P-Tres">

      </div>
    </div>
    <div class="Principal-Cuatro">
      <div class="P-Uno">

      </div>
      <div class="P-Dos">

      </div>
      <div class="P-Tres">

      </div>
    </div>
  </div>

  <div class="Grafic">
    <div class="Grafic-Uno"></div>
    <div class="Grafic-Dos"></div>

  </div>


  <footer>
    <p></p>
  </footer>

  <script src="{{ asset('Javascript/scriptHome.js') }}"></script>



</body>

</html>