<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/style-entregas.css') }}">
    <title>Registrar Préstamo</title>
</head>

<body>

<!-- ENCABEZADO -->
<div class="Encabezado bg-primary text-white py-3 shadow-sm">
    <div class="container d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-0">Registrar Préstamo</h1>
    </div>
</div>

<!-- CONTENEDOR PRINCIPAL -->
<div class="container mt-5 mb-5">

    <div class="card shadow-lg border-0 rounded-4">

        <!-- CABECERA DEL CARD -->
        <div class="card-header bg-gradient-primary text-white text-center py-4 rounded-top-4">
            <h2 class="mb-0"><i class="fas fa-plus-circle me-2"></i>Nuevo Registro</h2>
        </div>

        <!-- CUERPO DEL CARD -->
        <div class="card-body p-4 p-md-5">

            <form action="{{ route('prestamos.store') }}" method="POST">
                @csrf

                <!-- ARTÍCULO -->
                <div class="mb-4">
                    <label class="form-label fs-5 fw-semibold">Artículo:</label>
                    <input type="text" name="Articulo"
                           class="form-control form-control-lg @error('Articulo') is-invalid @enderror"
                           value="{{ old('Articulo') }}" required>
                    @error('Articulo')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- COLABORADOR -->
                <div class="mb-4">
                    <label class="form-label fs-5 fw-semibold">Colaborador:</label>
                    <input type="text" name="Colaborador"
                           class="form-control form-control-lg @error('Colaborador') is-invalid @enderror"
                           value="{{ old('Colaborador') }}" required>
                    @error('Colaborador')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- FECHA -->
                <div class="mb-4">
                    <label class="form-label fs-5 fw-semibold">Fecha:</label>
                    <input type="date" name="Fecha"
                           class="form-control form-control-lg @error('Fecha') is-invalid @enderror"
                           value="{{ old('Fecha') }}" required>
                    @error('Fecha')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- BOTONES -->
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('prestamos.index') }}" class="btn btn-outline-secondary btn-lg px-4 me-md-2">
                        <i class="fas fa-arrow-left me-2"></i>Cancelar
                    </a>

                    <button type="submit" class="btn btn-primary btn-lg px-4">
                        <i class="fas fa-save me-2"></i>Guardar
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

</body>
</html>
