<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/style-entregasCreate.css') }}">
    <title>Registro Público de Entrega</title>
</head>

<body>

    <!-- Encabezado -->
    <div class="Encabezado bg-success text-white py-3 shadow-sm">
        <div class="container d-flex justify-content-center align-items-center">
            <h1 class="h3 mb-0">Registro Público de Entrega</h1>
        </div>
    </div>

    <div class="container mt-5 mb-5">

        <div class="card shadow-lg border-0 rounded-4">

            <!-- Cabecera de la tarjeta -->
            <div class="card-header bg-gradient-success text-white text-center py-4 rounded-top-4" style="background-color: #1565dd;">
                <h2 class="mb-0">Nuevo Registro</h2>
            </div>

            <div class="card-body p-4 p-md-5">

                <form action="{{ route('entregasEquipos.store') }}" method="POST" enctype="multipart/form-data" id="formEntrega">
                    @csrf

                    <!-- Campo oculto para identificar que viene del formulario público -->
                    <input type="hidden" name="origen" value="publico">

                    <!-- Fecha automática -->
                    <input type="hidden" name="fecha_entrega" value="{{ now()->format('Y-m-d H:i:s') }}">
                    <input type="hidden" name="aprobado" value="Pendiente">

                    <!-- NOMBRE DEL EQUIPO -->
                    <div class="mb-4">
                        <label class="form-label fs-5 fw-semibold">Nombre del Equipo - Activo:</label>
                        <input type="text" name="nombre_equipo" class="form-control form-control-lg" required>
                    </div>

                    <!-- USUARIO -->
                    <div class="mb-4">
                        <label class="form-label fs-5 fw-semibold">Usuario:</label>
                        <input type="text" name="usuario" class="form-control form-control-lg" required>
                    </div>

                    <!-- ARCHIVO -->
                    <div class="mb-4">
                        <label class="form-label fs-5 fw-semibold">Archivo:</label>
                        <input type="file" name="archivo" class="form-control form-control-lg">
                    </div>

                    <!-- AUXILIAR ENTREGA -->
                    <div class="mb-4 position-relative">
                        <label class="form-label fs-5 fw-semibold">Auxiliar que Entrega:</label>

                        <input type="search" name="auxiliar_entrega" id="auxEntrega" autocomplete="off"
                            class="form-control form-control-lg" placeholder="Buscar auxiliar..." required>

                        <div id="listaEntrega" class="autocomplete-list d-none"></div>
                    </div>

                    <!-- AUXILIAR RECIBE -->
                    <div class="mb-4 position-relative">
                        <label class="form-label fs-5 fw-semibold">Auxiliar que Recibe:</label>

                        <input type="search" name="auxiliar_recibe" id="auxRecibe" autocomplete="off"
                            class="form-control form-control-lg" placeholder="Buscar auxiliar..." required>

                        <div id="listaRecibe" class="autocomplete-list d-none"></div>
                    </div>


                    <!-- ESTADO -->
                    <div class="mb-4">
                        <label class="form-label fs-5 fw-semibold">Estado:</label>
                        <select name="estado" class="form-select form-select-lg" required>
                            <option value="Libre">Libre</option>
                            <option value="Remplazo">Remplazo</option>
                        </select>
                    </div>

                    <!-- BOTONES MODIFICADOS -->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        
                        <!-- Botón Limpiar -->
                        <button type="reset" class="btn btn-outline-secondary btn-lg px-4">
                            Limpiar
                        </button>

                        <!-- CAMBIO AQUÍ: Se cambió btn-success por btn-primary -->
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