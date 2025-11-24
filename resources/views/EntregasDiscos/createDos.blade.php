<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Reutilizamos el CSS de entregas -->
    <link rel="stylesheet" href="{{ asset('assets/style-entregasCreate.css') }}">
    <title>Registro Público de Disco</title>
</head>

<body>

    <div class="Encabezado bg-secondary text-white py-3 shadow-sm" style="background-color: #6c757d !important;">
        <div class="container d-flex justify-content-center align-items-center">
            <h1 class="h3 mb-0">Registro Público - Entrega de Disco</h1>
        </div>
    </div>

    <div class="container mt-5 mb-5">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card shadow-lg border-0 rounded-4">

            <div class="card-header bg-gradient-secondary text-white text-center py-4 rounded-top-4" style="background-color: #495057;">
                <h2 class="mb-0">Nuevo Disco</h2>
            </div>

            <div class="card-body p-4 p-md-5">

                
                <form action="{{ route('entregasDiscos.store') }}" method="POST" enctype="multipart/form-data" id="formEntrega">
                    @csrf

                    <input type="hidden" name="origen" value="publico">
                    <input type="hidden" name="fecha_entrega" value="{{ now()->format('Y-m-d H:i:s') }}">
                    <input type="hidden" name="aprobado" value="Pendiente">

                    
                    <div class="mb-4">
                        <label class="form-label fs-5 fw-semibold">Nombre del Equipo :</label>
                        <input type="text" name="nombre_disco" class="form-control form-control-lg" required>
                    </div>

                    
                    <div class="mb-4">
                        <label class="form-label fs-5 fw-semibold">Usuario:</label>
                        <input type="text" name="usuario" class="form-control form-control-lg" required>
                    </div>

                    
                    <div class="mb-4">
                        <label class="form-label fs-5 fw-semibold">Archivo / Foto:</label>
                        <input type="file" name="archivo" class="form-control form-control-lg">
                    </div>

                  
                    <div class="mb-4 position-relative">
                        <label class="form-label fs-5 fw-semibold">Auxiliar que Entrega:</label>
                        <input type="search" name="auxiliar_entrega" id="auxEntrega" autocomplete="off" class="form-control form-control-lg" required>
                        <div id="listaEntrega" class="autocomplete-list d-none"></div>
                    </div>

                    <div class="mb-4 position-relative">
                        <label class="form-label fs-5 fw-semibold">Auxiliar que Recibe:</label>
                        <input type="search" name="auxiliar_recibe" id="auxRecibe" autocomplete="off" class="form-control form-control-lg" required>
                        <div id="listaRecibe" class="autocomplete-list d-none"></div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fs-5 fw-semibold">Estado:</label>
                        <select name="estado" class="form-select form-select-lg" required>
                            <option value="Libre">Libre</option>
                            <option value="Remplazo">Remplazo</option>
                        </select>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="reset" class="btn btn-outline-secondary btn-lg px-4">Limpiar</button>
                        <button type="submit" class="btn btn-dark btn-lg px-4">Guardar Disco</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

   
    <script src="{{ asset('Javascript/scriptEntregasEequipos.js') }}"></script>

</body>
</html>