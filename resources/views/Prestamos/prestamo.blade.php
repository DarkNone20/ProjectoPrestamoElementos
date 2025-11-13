<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/style-prestamos.css') }}">
    <title>Registrar Préstamo</title>
</head>

<body class="bg-light p-5">

<div class="container">
    <div class="card shadow p-4" style="max-width: 600px; margin: auto;">
        <h3 class="mb-4 text-center">Registrar Préstamo</h3>

        <form action="{{ route('prestamos.store') }}" method="POST">
            @csrf

            <label class="form-label fs-5 fw-semibold">Artículo:</label>
            <input type="text" name="Articulo" class="form-control form-control-lg @error('Articulo') is-invalid @enderror" value="{{ old('Articulo') }}" required>
            @error('Articulo') <div class="invalid-feedback">{{ $message }}</div> @enderror

            <label class="form-label fs-5 fw-semibold mt-3">Colaborador:</label>
            <input type="text" name="Colaborador" class="form-control form-control-lg @error('Colaborador') is-invalid @enderror" value="{{ old('Colaborador') }}" required>
            @error('Colaborador') <div class="invalid-feedback">{{ $message }}</div> @enderror

            <label class="form-label fs-5 fw-semibold mt-3">Fecha:</label>
            <input type="date" name="Fecha" class="form-control form-control-lg @error('Fecha') is-invalid @enderror" value="{{ old('Fecha') }}" required>
            @error('Fecha') <div class="invalid-feedback">{{ $message }}</div> @enderror

            <div class="mt-4 text-center">
                <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
                <a href="{{ route('prestamos.index') }}" class="btn btn-outline-secondary btn-lg">Cancelar</a>
            </div>

        </form>
    </div>
</div>

</body>
</html>
