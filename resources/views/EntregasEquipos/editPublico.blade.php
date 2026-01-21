<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/style-entregasCreate.css') }}">
    <title>Editar Registro de Entrega</title>
</head>

<body>

    <!-- Encabezado -->
    <div class="Encabezado bg-warning text-dark py-3 shadow-sm">
        <div class="container d-flex justify-content-center align-items-center">
            <h1 class="h3 mb-0">
                <i class="fas fa-edit me-2"></i>
                Editar Registro de Entrega
            </h1>
        </div>
    </div>

    <div class="container mt-5 mb-5">

        <div class="card shadow-lg border-0 rounded-4">

            <!-- Cabecera de la tarjeta -->
            <div class="card-header bg-gradient-warning text-dark text-center py-4 rounded-top-4" style="background-color: #ffc107;">
                <h2 class="mb-0">Editar Registro #{{ str_pad($entrega->id, 6, '0', STR_PAD_LEFT) }}</h2>
                <p class="mb-0 mt-2 opacity-75">Corrige los datos que necesites modificar</p>
            </div>

            <div class="card-body p-4 p-md-5">

                <form action="{{ route('entregasEquipos.updatePublico', $entrega->id) }}" method="POST" enctype="multipart/form-data" id="formEntrega">
                    @csrf
                    @method('PUT')

                    <!-- Campo oculto para identificar que viene del formulario público -->
                    <input type="hidden" name="origen" value="publico">

                    <!-- NOMBRE DEL EQUIPO -->
                    <div class="mb-4">
                        <label class="form-label fs-5 fw-semibold">
                            <i class="fas fa-laptop me-1 text-primary"></i>
                            Nombre del Equipo - Activo:
                        </label>
                        <input type="text" name="nombre_equipo" class="form-control form-control-lg" 
                               value="{{ old('nombre_equipo', $entrega->nombre_equipo) }}" required>
                        @error('nombre_equipo')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- USUARIO -->
                    <div class="mb-4">
                        <label class="form-label fs-5 fw-semibold">
                            <i class="fas fa-user me-1 text-primary"></i>
                            Usuario:
                        </label>
                        <input type="text" name="usuario" class="form-control form-control-lg" 
                               value="{{ old('usuario', $entrega->usuario) }}" required>
                        @error('usuario')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- ARCHIVO -->
                    <div class="mb-4">
                        <label class="form-label fs-5 fw-semibold">
                            <i class="fas fa-file me-1 text-primary"></i>
                            Archivo:
                        </label>
                        @if($entrega->archivo)
                            <div class="mb-2">
                                <span class="badge bg-info">
                                    <i class="fas fa-paperclip me-1"></i>
                                    Archivo actual: 
                                    <a href="{{ asset('storage/' . $entrega->archivo) }}" target="_blank" class="text-white">
                                        Ver archivo
                                    </a>
                                </span>
                            </div>
                        @endif
                        <input type="file" name="archivo" class="form-control form-control-lg">
                        <small class="text-muted">Deja vacío para mantener el archivo actual</small>
                    </div>

                    <!-- AUXILIAR ENTREGA -->
                    <div class="mb-4 position-relative">
                        <label class="form-label fs-5 fw-semibold">
                            <i class="fas fa-user-check me-1 text-primary"></i>
                            Auxiliar que Entrega:
                        </label>

                        <input type="search" name="auxiliar_entrega" id="auxEntrega" autocomplete="off"
                            class="form-control form-control-lg" placeholder="Buscar auxiliar..." 
                            value="{{ old('auxiliar_entrega', $entrega->auxiliar_entrega) }}" required>

                        <div id="listaEntrega" class="autocomplete-list d-none"></div>
                        @error('auxiliar_entrega')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- AUXILIAR RECIBE -->
                    <div class="mb-4 position-relative">
                        <label class="form-label fs-5 fw-semibold">
                            <i class="fas fa-user-tag me-1 text-primary"></i>
                            Auxiliar que Recibe:
                        </label>

                        <input type="search" name="auxiliar_recibe" id="auxRecibe" autocomplete="off"
                            class="form-control form-control-lg" placeholder="Buscar auxiliar..." 
                            value="{{ old('auxiliar_recibe', $entrega->auxiliar_recibe) }}" required>

                        <div id="listaRecibe" class="autocomplete-list d-none"></div>
                        @error('auxiliar_recibe')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>


                    <!-- ESTADO -->
                    <div class="mb-4">
                        <label class="form-label fs-5 fw-semibold">
                            <i class="fas fa-toggle-on me-1 text-primary"></i>
                            Estado:
                        </label>
                        <select name="estado" class="form-select form-select-lg" required>
                            <option value="Libre" {{ $entrega->estado == 'Libre' ? 'selected' : '' }}>Libre</option>
                            <option value="Remplazo" {{ $entrega->estado == 'Remplazo' ? 'selected' : '' }}>Remplazo</option>
                        </select>
                    </div>

                    <!-- BOTONES -->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-between mt-5">
                        
                        <!-- Botón Cancelar -->
                        <a href="{{ route('entregasEquipos.confirmacion', $entrega->id) }}" class="btn btn-outline-secondary btn-lg px-4">
                            <i class="fas fa-arrow-left me-2"></i>
                            Cancelar
                        </a>

                        <!-- Botón Guardar Cambios -->
                        <button type="submit" class="btn btn-warning btn-lg px-4">
                            <i class="fas fa-save me-2"></i>
                            Guardar Cambios
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script src="{{ asset('Javascript/scriptEntregasEequipos.js') }}"></script>

</body>
</html>
