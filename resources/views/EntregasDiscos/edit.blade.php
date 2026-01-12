<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/style-entregasCreate.css') }}">
    <title>Editar Entrega de Disco</title>
</head>
<body>
    <div class="Encabezado bg-primary text-white py-3 shadow-sm">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-0">Modificar Registro de Disco</h1>
        </div>
    </div>

    <div class="container mt-5 mb-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-warning text-dark text-center py-4 rounded-top-4">
                <h2 class="mb-0">Editar: {{ $entrega->nombre_disco }}</h2>
            </div>

            <div class="card-body p-4 p-md-5">
                <form action="{{ route('entregasDiscos.update', $entrega->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="form-label fs-5 fw-semibold">Nombre del Equipo:</label>
                        <input type="text" name="nombre_disco" class="form-control form-control-lg" value="{{ $entrega->nombre_disco }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fs-5 fw-semibold">Usuario:</label>
                        <input type="text" name="usuario" class="form-control form-control-lg" value="{{ $entrega->usuario }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fs-5 fw-semibold">Archivo (Dejar vacío para mantener el actual):</label>
                        @if($entrega->archivo)
                            <div class="mb-2"><small>Archivo actual: <a href="{{ asset('storage/' . $entrega->archivo) }}" target="_blank">Ver archivo</a></small></div>
                        @endif
                        <input type="file" name="archivo" class="form-control form-control-lg">
                    </div>

                    <div class="mb-4 position-relative">
                        <label class="form-label fs-5 fw-semibold">Auxiliar que Entrega:</label>
                        <input type="text" name="auxiliar_entrega" class="form-control form-control-lg" value="{{ $entrega->auxiliar_entrega }}" required>
                    </div>

                    <div class="mb-4 position-relative">
                        <label class="form-label fs-5 fw-semibold">Auxiliar que Recibe:</label>
                        <input type="text" name="auxiliar_recibe" class="form-control form-control-lg" value="{{ $entrega->auxiliar_recibe }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fs-5 fw-semibold">Estado:</label>
                        <select name="estado" class="form-select form-select-lg" required>
                            <option value="Libre" {{ $entrega->estado == 'Libre' ? 'selected' : '' }}>Libre</option>
                            <option value="Remplazo" {{ $entrega->estado == 'Remplazo' ? 'selected' : '' }}>Remplazo</option>
                        </select>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" onclick="window.close()" class="btn btn-outline-secondary btn-lg px-4">Cerrar</button>
                        <button type="submit" class="btn btn-primary btn-lg px-4">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>