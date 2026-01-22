<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/style-entregasCreate.css') }}">
    <title>Registro Público de Entrega</title>
    <style>
        .condiciones-card {
            background: #ffffff;
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            overflow: hidden;
        }
        .condiciones-header {
            background: linear-gradient(135deg, #1565dd 0%, #0d47a1 100%);
            color: white;
            padding: 1rem 1.5rem;
            font-weight: 600;
            font-size: 1.05rem;
        }
        .condiciones-header i {
            margin-right: 0.5rem;
        }
        .condicion-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #f0f0f0;
            transition: background-color 0.2s ease;
        }
        .condicion-item:hover {
            background-color: #f8f9ff;
        }
        .condicion-item:last-child {
            border-bottom: none;
        }
        .condicion-label {
            font-weight: 500;
            color: #374151;
            font-size: 0.95rem;
            flex: 1;
            margin-right: 1rem;
        }
        .condicion-label i {
            color: #1565dd;
            margin-right: 0.5rem;
            width: 20px;
            text-align: center;
        }
        .btn-group {
            flex-shrink: 0;
        }
        .btn-group .btn {
            padding: 0.4rem 0.9rem;
            font-size: 0.85rem;
            font-weight: 500;
            border-radius: 8px !important;
            margin-left: 4px;
            transition: all 0.2s ease;
        }
        .btn-group .btn:first-child {
            margin-left: 0;
        }
        .btn-check:checked + .btn-outline-success {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border-color: transparent;
            color: white;
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.4);
        }
        .btn-check:checked + .btn-outline-danger {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            border-color: transparent;
            color: white;
            box-shadow: 0 2px 8px rgba(239, 68, 68, 0.4);
        }
        .btn-check:checked + .btn-outline-secondary {
            background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);
            border-color: transparent;
            color: white;
            box-shadow: 0 2px 8px rgba(107, 114, 128, 0.4);
        }
        .btn-check:checked + .btn-outline-warning {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            border-color: transparent;
            color: white;
            box-shadow: 0 2px 8px rgba(245, 158, 11, 0.4);
        }
        .btn-outline-success {
            border-color: #10b981;
            color: #10b981;
        }
        .btn-outline-danger {
            border-color: #ef4444;
            color: #ef4444;
        }
        .btn-outline-secondary {
            border-color: #9ca3af;
            color: #6b7280;
        }
        .btn-outline-warning {
            border-color: #f59e0b;
            color: #d97706;
        }
        /* Secciones del formulario */
        .section-card {
            background: #ffffff;
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            overflow: hidden;
            margin-bottom: 1.5rem;
        }
        .section-header {
            background: linear-gradient(135deg, #1565dd 0%, #0d47a1 100%);
            color: white;
            padding: 1rem 1.5rem;
            font-weight: 600;
            font-size: 1.05rem;
        }
        .section-header i {
            margin-right: 0.5rem;
        }
        .section-body {
            padding: 1.5rem;
        }
        .section-body .form-label {
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.5rem;
        }
        .section-body .form-label i {
            color: #1565dd;
        }
    </style>
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
                <h2 class="mb-0">Nuevo Registro De Equipo</h2>
            </div>

            <div class="card-body p-4 p-md-5">

                <form action="{{ route('entregasEquipos.store') }}" method="POST" enctype="multipart/form-data" id="formEntrega">
                    @csrf

                    <!-- Campo oculto para identificar que viene del formulario público -->
                    <input type="hidden" name="origen" value="publico">

                    <!-- Fecha automática -->
                    <input type="hidden" name="fecha_entrega" value="{{ now()->format('Y-m-d H:i:s') }}">
                    <input type="hidden" name="aprobado" value="Pendiente">

                    <!-- ==================== SECCIÓN: INFORMACIÓN DEL EQUIPO ==================== -->
                    <div class="section-card">
                        <div class="section-header">
                            <i class="fas fa-laptop"></i>Información del Equipo
                        </div>
                        <div class="section-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        <i class="fas fa-laptop me-2"></i>Nombre del equipo:
                                    </label>
                                    <input type="text" name="nombre_equipo" class="form-control form-control-lg" 
                                           placeholder="Ej: Laptop ProBook 450" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        <i class="fas fa-barcode me-2"></i>Activo Fijo:
                                    </label>
                                    <input type="text" name="activo_fijo" class="form-control form-control-lg" 
                                           placeholder="Ej: AF-2026-001">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        <i class="fas fa-building me-2"></i>Marca:
                                    </label>
                                    <select name="marca" class="form-select form-select-lg">
                                        <option value="">Seleccione una marca...</option>
                                        <option value="HP">HP</option>
                                        <option value="Lenovo">Lenovo</option>
                                        <option value="Dell">Dell</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        <i class="fas fa-tag me-2"></i>Modelo:
                                    </label>
                                    <input type="text" name="modelo" class="form-control form-control-lg" 
                                           placeholder="Ej: ProBook 450 G8">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ==================== SECCIÓN: INFORMACIÓN DE LA ENTREGA ==================== -->
                    <div class="section-card">
                        <div class="section-header">
                            <i class="fas fa-exchange-alt"></i>Información de la Entrega
                        </div>
                        <div class="section-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        <i class="fas fa-user me-2"></i>Nombre del colaborador:
                                    </label>
                                    <input type="text" name="usuario" class="form-control form-control-lg" 
                                           placeholder="Nombre completo del colaborador" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        <i class="fas fa-clipboard-list me-2"></i>Motivo de Entrega:
                                    </label>
                                    <select name="motivo_entrega" class="form-select form-select-lg">
                                        <option value="">Seleccione un motivo...</option>
                                        <option value="Paz y salvo">Paz y salvo</option>
                                        <option value="Cambio de equipo">Cambio de equipo</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3 position-relative">
                                    <label class="form-label">
                                        <i class="fas fa-user-check me-2"></i>Auxiliar que Entrega:
                                    </label>
                                    <input type="search" name="auxiliar_entrega" id="auxEntrega" autocomplete="off"
                                        class="form-control form-control-lg" placeholder="Buscar auxiliar..." required>
                                    <div id="listaEntrega" class="autocomplete-list d-none"></div>
                                </div>
                                <div class="col-md-6 mb-3 position-relative">
                                    <label class="form-label">
                                        <i class="fas fa-user-tag me-2"></i>Auxiliar que Recibe:
                                    </label>
                                    <input type="search" name="auxiliar_recibe" id="auxRecibe" autocomplete="off"
                                        class="form-control form-control-lg" placeholder="Buscar auxiliar..." required>
                                    <div id="listaRecibe" class="autocomplete-list d-none"></div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        <i class="fas fa-toggle-on me-2"></i>Estado:
                                    </label>
                                    <select name="estado" class="form-select form-select-lg" required>
                                        <option value="Equipo Libre">Equipo Libre</option>
                                        <option value="Equipo para reemplazo">Equipo para reemplazo</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        <i class="fas fa-file-upload me-2"></i>Archivo adjunto:
                                    </label>
                                    <input type="file" name="archivo" class="form-control form-control-lg">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ==================== SECCIÓN: CONDICIONES FÍSICAS ==================== -->
                    <div class="section-card">
                        <div class="section-header">
                            <i class="fas fa-clipboard-check"></i>Condiciones Físicas del Equipo
                        </div>
                        <div class="section-body p-0">
                                
                            <!-- Con memoria RAM -->
                            <div class="condicion-item">
                                <span class="condicion-label"><i class="fas fa-memory"></i>¿Con memoria RAM?</span>
                                <div class="btn-group" role="group">
                                    <input type="radio" class="btn-check" name="con_memoria_ram" id="ram_si" value="Si" checked>
                                    <label class="btn btn-outline-success btn-sm" for="ram_si">Sí</label>
                                    <input type="radio" class="btn-check" name="con_memoria_ram" id="ram_no" value="No">
                                    <label class="btn btn-outline-danger btn-sm" for="ram_no">No</label>
                                </div>
                            </div>

                            <!-- Con disco duro -->
                            <div class="condicion-item">
                                <span class="condicion-label"><i class="fas fa-hdd"></i>¿Con disco duro?</span>
                                <div class="btn-group" role="group">
                                    <input type="radio" class="btn-check" name="con_disco_duro" id="disco_si" value="Si" checked>
                                    <label class="btn btn-outline-success btn-sm" for="disco_si">Sí</label>
                                    <input type="radio" class="btn-check" name="con_disco_duro" id="disco_no" value="No">
                                    <label class="btn btn-outline-danger btn-sm" for="disco_no">No</label>
                                </div>
                            </div>

                            <!-- Eliminar información del disco -->
                            <div class="condicion-item">
                                <span class="condicion-label"><i class="fas fa-trash-alt"></i>¿Se puede eliminar la información del disco?</span>
                                <div class="btn-group" role="group">
                                    <input type="radio" class="btn-check" name="eliminar_info_disco" id="elim_si" value="Si">
                                    <label class="btn btn-outline-success btn-sm" for="elim_si">Sí</label>
                                    <input type="radio" class="btn-check" name="eliminar_info_disco" id="elim_no" value="No">
                                    <label class="btn btn-outline-danger btn-sm" for="elim_no">No</label>
                                    <input type="radio" class="btn-check" name="eliminar_info_disco" id="elim_na" value="N/A" checked>
                                    <label class="btn btn-outline-secondary btn-sm" for="elim_na">N/A</label>
                                </div>
                            </div>

                            <!-- Bisagras en buen estado -->
                            <div class="condicion-item">
                                <span class="condicion-label"><i class="fas fa-laptop"></i>¿Bisagras en buen estado?</span>
                                <div class="btn-group" role="group">
                                    <input type="radio" class="btn-check" name="bisagras_buen_estado" id="bisagras_si" value="Si" checked>
                                    <label class="btn btn-outline-success btn-sm" for="bisagras_si">Sí</label>
                                    <input type="radio" class="btn-check" name="bisagras_buen_estado" id="bisagras_no" value="No">
                                    <label class="btn btn-outline-danger btn-sm" for="bisagras_no">No</label>
                                </div>
                            </div>

                            <!-- Tiene golpes o rayones -->
                            <div class="condicion-item">
                                <span class="condicion-label"><i class="fas fa-exclamation-triangle"></i>¿Tiene golpes o rayones?</span>
                                <div class="btn-group" role="group">
                                    <input type="radio" class="btn-check" name="tiene_golpes_rayones" id="golpes_si" value="Si">
                                    <label class="btn btn-outline-danger btn-sm" for="golpes_si">Sí</label>
                                    <input type="radio" class="btn-check" name="tiene_golpes_rayones" id="golpes_no" value="No" checked>
                                    <label class="btn btn-outline-success btn-sm" for="golpes_no">No</label>
                                </div>
                            </div>

                            <!-- Viene con cargador -->
                            <div class="condicion-item">
                                <span class="condicion-label"><i class="fas fa-plug"></i>¿Viene con cargador?</span>
                                <div class="btn-group" role="group">
                                    <input type="radio" class="btn-check" name="viene_con_cargador" id="cargador_si" value="Si" checked>
                                    <label class="btn btn-outline-success btn-sm" for="cargador_si">Sí</label>
                                    <input type="radio" class="btn-check" name="viene_con_cargador" id="cargador_no" value="No">
                                    <label class="btn btn-outline-danger btn-sm" for="cargador_no">No</label>
                                </div>
                            </div>

                            <!-- Estado de batería -->
                            <div class="condicion-item">
                                <span class="condicion-label"><i class="fas fa-battery-half"></i>Estado de la batería</span>
                                <div class="btn-group" role="group">
                                    <input type="radio" class="btn-check" name="estado_bateria" id="bat_bueno" value="Bueno" checked>
                                    <label class="btn btn-outline-success btn-sm" for="bat_bueno">Bueno</label>
                                    <input type="radio" class="btn-check" name="estado_bateria" id="bat_regular" value="Regular">
                                    <label class="btn btn-outline-warning btn-sm" for="bat_regular">Regular</label>
                                    <input type="radio" class="btn-check" name="estado_bateria" id="bat_malo" value="Malo">
                                    <label class="btn btn-outline-danger btn-sm" for="bat_malo">Malo</label>
                                    <input type="radio" class="btn-check" name="estado_bateria" id="bat_sin" value="Sin batería">
                                    <label class="btn btn-outline-secondary btn-sm" for="bat_sin">N/A</label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- ==================== SECCIÓN: OBSERVACIONES ==================== -->
                    <div class="section-card">
                        <div class="section-header">
                            <i class="fas fa-comment-alt"></i>Observaciones Adicionales
                        </div>
                        <div class="section-body">
                            <textarea name="observaciones_adicionales" class="form-control form-control-lg" 
                                      rows="4" placeholder="Escriba cualquier información adicional relevante sobre el equipo..."></textarea>
                        </div>
                    </div>

                    <!-- BOTONES -->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
                        
                        <!-- Botón Limpiar -->
                        <button type="reset" class="btn btn-outline-secondary btn-lg px-4">
                            <i class="fas fa-eraser me-2"></i>Limpiar
                        </button>

                        <!-- Botón Guardar -->
                        <button type="submit" class="btn btn-primary btn-lg px-4">
                            <i class="fas fa-save me-2"></i>Guardar
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script src="{{ asset('Javascript/scriptEntregasEequipos.js') }}"></script>

</body>
</html>