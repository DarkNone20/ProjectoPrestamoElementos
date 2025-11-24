<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Reutilizamos el mismo CSS para mantener la consistencia visual -->
    <link rel="stylesheet" href="{{ asset('assets/style-entregasCreate.css') }}">
    <title>Registrar Entrega de Disco</title>

    <style>
        .autocomplete-list {
            position: absolute;
            width: 100%;
            background: white;
            border: 1px solid #ced4da;
            border-radius: 0.5rem;
            max-height: 180px;
            overflow-y: auto;
            z-index: 1000;
        }

        .autocomplete-item {
            padding: 10px;
            cursor: pointer;
        }

        .autocomplete-item:hover {
            background-color: #f1f1f1;
        }
    </style>

</head>

<body>

    <!-- Encabezado -->
    <div class="Encabezado bg-primary text-white py-3 shadow-sm">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-0">Registrar Entrega de Disco</h1>
        </div>
    </div>

    <div class="container mt-5 mb-5">

        <div class="card shadow-lg border-0 rounded-4">

            <div class="card-header bg-gradient-primary text-white text-center py-4 rounded-top-4">
                <h2 class="mb-0">Nuevo Registro de Disco</h2>
            </div>

            <div class="card-body p-4 p-md-5">

                
                <form action="{{ route('entregasDiscos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                  
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
                        <label class="form-label fs-5 fw-semibold">Archivo:</label>
                        <input type="file" name="archivo" class="form-control form-control-lg">
                    </div>

                    <div class="mb-4 position-relative">
                        <label class="form-label fs-5 fw-semibold">Auxiliar que Entrega:</label>

                        <input type="search" name="auxiliar_entrega" id="auxEntrega" autocomplete="off"
                            class="form-control form-control-lg" placeholder="Buscar auxiliar..." required>

                        <div id="listaEntrega" class="autocomplete-list d-none"></div>
                    </div>

                   
                    <div class="mb-4 position-relative">
                        <label class="form-label fs-5 fw-semibold">Auxiliar que Recibe:</label>

                        <input type="search" name="auxiliar_recibe" id="auxRecibe" autocomplete="off"
                            class="form-control form-control-lg" placeholder="Buscar auxiliar..." required>

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
                   
                        <a href="{{ route('entregasDiscos.index') }}" class="btn btn-outline-secondary btn-lg px-4">
                            Cancelar
                        </a>

                        <button type="submit" class="btn btn-primary btn-lg px-4">
                            Guardar
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    
    <script src="{{ asset('Javascript/scriptEntregasEequipos.js') }}"></script>

</body>

</html>