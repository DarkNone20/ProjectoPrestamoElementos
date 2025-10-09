<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistemas de Entregas</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
   
    <link rel="stylesheet" href="{{ asset('assets/style-entregas.css') }}">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <div class="Encabezado bg-primary text-white py-3 shadow-sm">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="Logo">
                <!-- Logo -->
                <img src="{{ asset('Imagenes/Icon.png') }}" alt="Logo" class="img-fluid" style="max-height: 50px;">
            </div>
            <div class="Titulo">
                <h1 class="h3 mb-0">Gestión de Entregas</h1>
            </div>
            <div class="Alias d-flex align-items-center">
                <a href="#" class="text-white text-decoration-none d-flex align-items-center">
                    <img src="{{ asset('Imagenes/Icon.png') }}" alt="Usuario" class="rounded-circle me-2" style="width: 40px; height: 40px; object-fit: cover;">
                    <p class="mb-0 fw-bold d-none d-md-block">JJCASTILLO</p>
                </a>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-gradient-primary text-white text-center py-4 rounded-top-4">
                        <h2 class="mb-0"><i class="fas fa-box-open me-2"></i>Registrar Nueva Entrega</h2>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <form action="{{ route('entregas.store') }}" method="POST" class="needs-validation" novalidate>
                            @csrf 

                            <div class="mb-4">
                                <label for="Articulo" class="form-label fs-5 fw-semibold">Artículo:</label>
                                <input type="text" id="Articulo" name="Articulo" class="form-control form-control-lg @error('Articulo') is-invalid @enderror" placeholder="Nombre o descripción del artículo" value="{{ old('Articulo') }}" required>
                                @error('Articulo')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="Nombre" class="form-label fs-5 fw-semibold">Nombre del Auxiliar:</label>
                                <input type="text" id="Nombre" name="Nombre" class="form-control form-control-lg @error('Nombre') is-invalid @enderror" placeholder="Nombre completo de quien recibe" value="{{ old('Nombre') }}" required>
                                @error('Nombre')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="Caso" class="form-label fs-5 fw-semibold">Caso:</label>
                                <input type="text" id="Caso" name="Caso" class="form-control form-control-lg @error('Caso') is-invalid @enderror" placeholder="Numero del caso del solicitante" value="{{ old('Articulo') }}" required>
                                @error('Caso')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <label for="Fecha" class="form-label fs-5 fw-semibold">Fecha de Entrega:</label>
                                <input type="date" id="Fecha" name="Fecha" class="form-control form-control-lg @error('Fecha') is-invalid @enderror" value="{{ old('Fecha') }}" required>
                                @error('Fecha')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="reset" class="btn btn-outline-secondary btn-lg px-4 me-md-2">
                                    <i class="fas fa-times-circle me-2"></i>Cancelar
                                </button>
                                <button type="submit" class="btn btn-primary btn-lg px-4">
                                    <i class="fas fa-paper-plane me-2"></i>Registrar Entrega
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <p class="mb-0">&copy; {{ date('Y') }} Sistemas de Entregas. Todos los derechos reservados.</p>
    </footer>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script>
        
        (function () {
            'use strict'

           
            var forms = document.querySelectorAll('.needs-validation')

          
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</body>
</html>