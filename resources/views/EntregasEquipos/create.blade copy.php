<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/style-entregas.css') }}">
    <title>Registrar Entrega de Equipo</title>
</head>

<body>

<!-- ENCABEZADO -->
<div class="Encabezado bg-primary text-white py-3 shadow-sm">
    <div class="container d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-0">Registrar Entrega de Equipo</h1>
    </div>
</div>

<!-- CONTENEDOR PRINCIPAL -->
<div class="container mt-5 mb-5">

    <div class="card shadow-lg border-0 rounded-4">

        <!-- CABECERA DEL CARD -->
        <div class="card-header bg-gradient-primary text-white text-center py-4 rounded-top-4">
            <h2 class="mb-0">Nuevo Registro</h2>
        </div>

        <!-- CUERPO DEL CARD -->
        <div class="card-body p-4 p-md-5">

            <form action="{{ route('entregasEquipos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- NOMBRE DEL EQUIPO -->
                <div class="mb-4">
                    <label class="form-label fs-5 fw-semibold">Nombre del Equipo:</label>
                    <input type="text" name="nombre_equipo"
                           class="form-control form-control-lg @error('nombre_equipo') is-invalid @enderror"
                           required>

                    @error('nombre_equipo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- FECHA AUTOMÁTICA -->
                <div class="mb-4">
                    <label class="form-label fs-5 fw-semibold">Fecha de Entrega:</label>
                    <input type="date" name="fecha_entrega"
                           class="form-control form-control-lg @error('fecha_entrega') is-invalid @enderror"
                           value="{{ date('Y-m-d') }}" required>

                    @error('fecha_entrega')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- USUARIO -->
                <div class="mb-4">
                    <label class="form-label fs-5 fw-semibold">Usuario:</label>
                    <input type="text" name="usuario"
                           class="form-control form-control-lg @error('usuario') is-invalid @enderror"
                           required>

                    @error('usuario')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- ARCHIVO -->
                <div class="mb-4">
                    <label class="form-label fs-5 fw-semibold">Archivo (opcional):</label>
                    <input type="file" name="archivo"
                           class="form-control form-control-lg @error('archivo') is-invalid @enderror">

                    @error('archivo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- AUXILIAR ENTREGA -->
                <div class="mb-4">
                    <label class="form-label fs-5 fw-semibold">Auxiliar que Entrega:</label>
                    <input type="text" name="auxiliar_entrega"
                           class="form-control form-control-lg @error('auxiliar_entrega') is-invalid @enderror"
                           required>

                    @error('auxiliar_entrega')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- AUXILIAR RECIBE -->
                <div class="mb-4">
                    <label class="form-label fs-5 fw-semibold">Auxiliar que Recibe:</label>
                    <input type="text" name="auxiliar_recibe"
                           class="form-control form-control-lg @error('auxiliar_recibe') is-invalid @enderror"
                           required>

                    @error('auxiliar_recibe')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- ESTADO -->
                <div class="mb-4">
                    <label class="form-label fs-5 fw-semibold">Estado:</label>
                    <select name="estado" class="form-select form-select-lg @error('estado') is-invalid @enderror" required>
                        <option value="Libre">Libre</option>
                        <option value="Remplazo">Remplazo</option>
                    </select>

                    @error('estado')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- APROBADO -->
                <div class="mb-4">
                    <label class="form-label fs-5 fw-semibold">Aprobado:</label>
                    <select name="aprobado" class="form-select form-select-lg @error('aprobado') is-invalid @enderror" required>
                        <option value="Pendiente">Pendiente</option>
                        <option value="Aprobado">Aprobado</option>
                    </select>

                    @error('aprobado')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- BOTONES -->
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('entregasEquipos.index') }}" class="btn btn-outline-secondary btn-lg px-4">
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

</body>
</html>
