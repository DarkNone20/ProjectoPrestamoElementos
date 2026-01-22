<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/style-entregasCreate.css') }}">
    <title>Registro Confirmado</title>
    <style>
        .success-icon {
            font-size: 5rem;
            color: #28a745;
            animation: bounce 1s ease-in-out;
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-20px); }
            60% { transform: translateY(-10px); }
        }
        
        .detail-card {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-left: 4px solid #1565dd;
        }
        
        .detail-label {
            font-weight: 600;
            color: #495057;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .detail-value {
            font-size: 1.1rem;
            color: #212529;
        }
        
        .status-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: 600;
        }
        
        .status-pendiente {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .status-aprobado {
            background-color: #d4edda;
            color: #155724;
        }
        
        .btn-action {
            padding: 0.75rem 2rem;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        
        .btn-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
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
            <div class="card-header bg-gradient-success text-white text-center py-4 rounded-top-4" style="background-color: #28a745;">
                <div class="success-icon mb-3">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h2 class="mb-0">¡Registro Exitoso!</h2>
                <p class="mb-0 mt-2 opacity-75">La entrega ha sido registrada correctamente</p>
            </div>

            <div class="card-body p-4 p-md-5">

                <!-- Mensaje informativo -->
                <div class="alert alert-info d-flex align-items-center mb-4" role="alert">
                    <i class="fas fa-info-circle me-3 fs-4"></i>
                    <div>
                        Tu registro está <strong>pendiente de aprobación</strong>. Un administrador revisará la información y aprobará la entrega.
                    </div>
                </div>

                <!-- Resumen del registro -->
                <h4 class="mb-4 text-center">
                    <i class="fas fa-clipboard-list me-2"></i>
                    Resumen del Registro
                </h4>

                <div class="row g-4">
                    
                    <!-- Nombre del Equipo -->
                    <div class="col-md-6">
                        <div class="detail-card p-3 rounded-3 h-100">
                            <div class="detail-label mb-1">
                                <i class="fas fa-laptop me-1"></i> Nombre del Equipo
                            </div>
                            <div class="detail-value">{{ $entrega->nombre_equipo }}</div>
                        </div>
                    </div>

                    <!-- Activo Fijo -->
                    <div class="col-md-6">
                        <div class="detail-card p-3 rounded-3 h-100">
                            <div class="detail-label mb-1">
                                <i class="fas fa-barcode me-1"></i> Activo Fijo
                            </div>
                            <div class="detail-value">{{ $entrega->activo_fijo ?? 'No especificado' }}</div>
                        </div>
                    </div>

                    <!-- Marca -->
                    <div class="col-md-6">
                        <div class="detail-card p-3 rounded-3 h-100">
                            <div class="detail-label mb-1">
                                <i class="fas fa-building me-1"></i> Marca
                            </div>
                            <div class="detail-value">{{ $entrega->marca ?? 'No especificada' }}</div>
                        </div>
                    </div>

                    <!-- Modelo -->
                    <div class="col-md-6">
                        <div class="detail-card p-3 rounded-3 h-100">
                            <div class="detail-label mb-1">
                                <i class="fas fa-tag me-1"></i> Modelo
                            </div>
                            <div class="detail-value">{{ $entrega->modelo ?? 'No especificado' }}</div>
                        </div>
                    </div>

                    <!-- Nombre del Colaborador -->
                    <div class="col-md-6">
                        <div class="detail-card p-3 rounded-3 h-100">
                            <div class="detail-label mb-1">
                                <i class="fas fa-user me-1"></i> Nombre del Colaborador
                            </div>
                            <div class="detail-value">{{ $entrega->usuario }}</div>
                        </div>
                    </div>

                    <!-- Motivo de Entrega -->
                    <div class="col-md-6">
                        <div class="detail-card p-3 rounded-3 h-100">
                            <div class="detail-label mb-1">
                                <i class="fas fa-clipboard-list me-1"></i> Motivo de Entrega
                            </div>
                            <div class="detail-value">{{ $entrega->motivo_entrega ?? 'No especificado' }}</div>
                        </div>
                    </div>

                    <!-- Fecha de Entrega -->
                    <div class="col-md-6">
                        <div class="detail-card p-3 rounded-3 h-100">
                            <div class="detail-label mb-1">
                                <i class="fas fa-calendar-alt me-1"></i> Fecha de Entrega
                            </div>
                            <div class="detail-value">
                                {{ \Carbon\Carbon::parse($entrega->fecha_entrega)->format('d/m/Y H:i') }}
                            </div>
                        </div>
                    </div>

                    <!-- Auxiliar que Entrega -->
                    <div class="col-md-6">
                        <div class="detail-card p-3 rounded-3 h-100">
                            <div class="detail-label mb-1">
                                <i class="fas fa-user-check me-1"></i> Auxiliar que Entrega
                            </div>
                            <div class="detail-value">{{ $entrega->auxiliar_entrega }}</div>
                        </div>
                    </div>

                    <!-- Auxiliar que Recibe -->
                    <div class="col-md-6">
                        <div class="detail-card p-3 rounded-3 h-100">
                            <div class="detail-label mb-1">
                                <i class="fas fa-user-tag me-1"></i> Auxiliar que Recibe
                            </div>
                            <div class="detail-value">{{ $entrega->auxiliar_recibe }}</div>
                        </div>
                    </div>

                    <!-- Estado -->
                    <div class="col-md-6">
                        <div class="detail-card p-3 rounded-3 h-100">
                            <div class="detail-label mb-1">
                                <i class="fas fa-toggle-on me-1"></i> Estado
                            </div>
                            <div class="detail-value">{{ $entrega->estado }}</div>
                        </div>
                    </div>

                    <!-- Archivo (si existe) -->
                    @if($entrega->archivo)
                    <div class="col-md-6">
                        <div class="detail-card p-3 rounded-3 h-100">
                            <div class="detail-label mb-1">
                                <i class="fas fa-file me-1"></i> Archivo Adjunto
                            </div>
                            <div class="detail-value">
                                <a href="{{ asset('storage/' . $entrega->archivo) }}" target="_blank" class="text-primary">
                                    <i class="fas fa-download me-1"></i> Ver archivo
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Condiciones Físicas del Equipo -->
                    <div class="col-12">
                        <div class="detail-card p-3 rounded-3">
                            <div class="detail-label mb-3">
                                <i class="fas fa-clipboard-check me-1"></i> Condiciones Físicas del Equipo
                            </div>
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <span class="badge {{ $entrega->con_memoria_ram == 'Si' ? 'bg-success' : 'bg-danger' }} me-1">
                                        <i class="fas {{ $entrega->con_memoria_ram == 'Si' ? 'fa-check' : 'fa-times' }}"></i>
                                    </span>
                                    Con memoria RAM
                                </div>
                                <div class="col-md-4">
                                    <span class="badge {{ $entrega->con_disco_duro == 'Si' ? 'bg-success' : 'bg-danger' }} me-1">
                                        <i class="fas {{ $entrega->con_disco_duro == 'Si' ? 'fa-check' : 'fa-times' }}"></i>
                                    </span>
                                    Con disco duro
                                </div>
                                <div class="col-md-4">
                                    <span class="badge {{ $entrega->eliminar_info_disco == 'Si' ? 'bg-success' : ($entrega->eliminar_info_disco == 'No' ? 'bg-danger' : 'bg-secondary') }} me-1">
                                        <i class="fas {{ $entrega->eliminar_info_disco == 'Si' ? 'fa-check' : ($entrega->eliminar_info_disco == 'No' ? 'fa-times' : 'fa-minus') }}"></i>
                                    </span>
                                    Eliminar info disco: {{ $entrega->eliminar_info_disco }}
                                </div>
                                <div class="col-md-4">
                                    <span class="badge {{ $entrega->bisagras_buen_estado == 'Si' ? 'bg-success' : 'bg-danger' }} me-1">
                                        <i class="fas {{ $entrega->bisagras_buen_estado == 'Si' ? 'fa-check' : 'fa-times' }}"></i>
                                    </span>
                                    Bisagras buen estado
                                </div>
                                <div class="col-md-4">
                                    <span class="badge {{ $entrega->tiene_golpes_rayones == 'No' ? 'bg-success' : 'bg-warning text-dark' }} me-1">
                                        <i class="fas {{ $entrega->tiene_golpes_rayones == 'No' ? 'fa-check' : 'fa-exclamation-triangle' }}"></i>
                                    </span>
                                    {{ $entrega->tiene_golpes_rayones == 'Si' ? 'Tiene golpes/rayones' : 'Sin golpes/rayones' }}
                                </div>
                                <div class="col-md-4">
                                    <span class="badge {{ $entrega->viene_con_cargador == 'Si' ? 'bg-success' : 'bg-danger' }} me-1">
                                        <i class="fas {{ $entrega->viene_con_cargador == 'Si' ? 'fa-check' : 'fa-times' }}"></i>
                                    </span>
                                    Viene con cargador
                                </div>
                                <div class="col-md-4">
                                    @php
                                        $batColor = match($entrega->estado_bateria) {
                                            'Bueno' => 'bg-success',
                                            'Regular' => 'bg-warning text-dark',
                                            'Malo' => 'bg-danger',
                                            default => 'bg-secondary'
                                        };
                                    @endphp
                                    <span class="badge {{ $batColor }} me-1">
                                        <i class="fas fa-battery-half"></i>
                                    </span>
                                    Batería: {{ $entrega->estado_bateria ?? 'N/A' }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Observaciones Adicionales -->
                    @if($entrega->observaciones_adicionales)
                    <div class="col-12">
                        <div class="detail-card p-3 rounded-3">
                            <div class="detail-label mb-1">
                                <i class="fas fa-comment-alt me-1"></i> Observaciones Adicionales
                            </div>
                            <div class="detail-value">{{ $entrega->observaciones_adicionales }}</div>
                        </div>
                    </div>
                    @endif

                    <!-- Estado de Aprobación -->
                    <div class="col-12">
                        <div class="detail-card p-3 rounded-3 text-center">
                            <div class="detail-label mb-2">
                                <i class="fas fa-clipboard-check me-1"></i> Estado de Aprobación
                            </div>
                            <span class="status-badge {{ $entrega->aprobado == 'Aprobado' ? 'status-aprobado' : 'status-pendiente' }}">
                                <i class="fas {{ $entrega->aprobado == 'Aprobado' ? 'fa-check' : 'fa-clock' }} me-1"></i>
                                {{ $entrega->aprobado }}
                            </span>
                        </div>
                    </div>

                </div>

                <!-- Número de registro -->
                <div class="text-center mt-4 p-3 bg-light rounded-3">
                    <small class="text-muted">Número de Registro:</small>
                    <h5 class="mb-0 text-primary fw-bold">#{{ str_pad($entrega->id, 6, '0', STR_PAD_LEFT) }}</h5>
                </div>

                <!-- Botones de acción -->
                <div class="d-flex flex-column flex-md-row justify-content-center gap-3 mt-5">
                    
                    <!-- Botón Editar (si hay error) -->
                    <a href="{{ route('entregasEquipos.editPublico', $entrega->id) }}" class="btn btn-outline-warning btn-action">
                        <i class="fas fa-edit me-2"></i>
                        Editar Registro
                    </a>

                    <!-- Botón Nuevo Registro -->
                    <a href="{{ route('entregasEquipos.createDos') }}" class="btn btn-outline-primary btn-action">
                        <i class="fas fa-plus me-2"></i>
                        Nuevo Registro
                    </a>

                    <!-- Botón Salir -->
                    <a href="{{ route('entregasEquipos.createDos') }}" class="btn btn-primary btn-action" onclick="window.close(); return false;">
                        <i class="fas fa-times-circle me-2"></i>
                        Salir
                    </a>

                </div>

            </div>
        </div>

        <!-- Mensaje adicional -->
        <div class="text-center mt-4 text-muted">
            <small>
                <i class="fas fa-shield-alt me-1"></i>
                Este registro quedará almacenado en el sistema y será revisado por un administrador.
            </small>
        </div>

    </div>

</body>
</html>
