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

  <nav>
    <ul id="navMenu">
      <li class="logo"><img src="{{ asset('Imagenes/Logo5.png') }}" alt="Logo"></li>
      <div class="Menu">
        <li><a href="{{ asset('home') }}"><img src="{{ asset('Imagenes/Home.png') }}" alt="inicio"> Home</a></li>
        <li><a href="{{ asset(path: 'usuarios') }}"><img src="{{ asset('Imagenes/Group.png') }}" alt="user">
            Usuarios</a></li>
        <li><a href="#"><img src="{{ asset(path: 'Imagenes/Elementos.png') }}" alt="grupos"> Isumos</a></li>
        <li><a href="#"><img src="{{ asset(path: 'Imagenes/lista.png') }}" alt="equipos"> Entregas</a></li>
      </div>
      <div class="Prueba">
        <li><a href="{{ asset('/') }}"><img src="{{ asset('Imagenes/salir.png') }}" alt="login"> Logout</a></li>
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