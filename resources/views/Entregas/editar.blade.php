<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Entrega</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/style-entregas.css') }}">
</head>
<body>

<div class="Encabezado bg-primary text-white py-3 shadow-sm">
    <div class="container d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-0">Editar Entrega</h1>
    </div>
</div>

<div class="container mt-5 mb-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-gradient-primary text-white text-center py-4 rounded-top-4">
            <h2 class="mb-0"><i class="fas fa-edit me-2"></i>Actualizar Datos</h2>
        </div>
        <div class="card-body p-4 p-md-5">
            <form action="{{ route('entregas.update', $entrega->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="Articulo" class="form-label fs-5 fw-semibold">Artículo:</label>
                    <input type="text" id="Articulo" name="Articulo" class="form-control form-control-lg" value="{{ old('Articulo', $entrega->Articulo) }}" required>
                </div>

                <div class="mb-4">
                    <label for="Nombre" class="form-label fs-5 fw-semibold">Nombre:</label>
                    <input type="text" id="Nombre" name="Nombre" class="form-control form-control-lg" value="{{ old('Nombre', $entrega->Nombre) }}" required>
                </div>

                <div class="mb-4">
                    <label for="Caso" class="form-label fs-5 fw-semibold">Caso:</label>
                    <input type="number" id="Caso" name="Caso" class="form-control form-control-lg" value="{{ old('Caso', $entrega->Caso) }}" required>
                </div>

                <div class="mb-4">
                    <label for="Fecha" class="form-label fs-5 fw-semibold">Fecha:</label>
                    <input type="date" id="Fecha" name="Fecha" class="form-control form-control-lg" value="{{ old('Fecha', $entrega->Fecha) }}" required>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('entregas.tablas') }}" class="btn btn-outline-secondary btn-lg px-4 me-md-2">
                        <i class="fas fa-arrow-left me-2"></i>Volver
                    </a>
                    <button type="submit" class="btn btn-primary btn-lg px-4">
                        <i class="fas fa-save me-2"></i>Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
