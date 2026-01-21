<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - Sistema de Inventarios</title>
    <link rel="stylesheet" href="{{ asset('assets/style-home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style-dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Botón hamburguesa -->
    <div class="menu-toggle" onclick="toggleMenu()">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <!-- Menú lateral -->
    <nav id="sidebar">
        <ul id="navMenu">
            <li class="logo">
                <img src="{{ asset('Imagenes/Logo5.png') }}" alt="Logo">
            </li>
            <div class="Menu">
                <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="{{ route('dashboard') }}" class="active"><i class="fas fa-chart-pie"></i> Dashboard</a></li>
                <li><a href="{{ route('entregas.tablas') }}"><i class="fas fa-box"></i> Insumos</a></li>
                <li><a href="{{ route('entregasEquipos.index') }}"><i class="fas fa-laptop"></i> Equipos</a></li>
                <li><a href="{{ route('entregasDiscos.index') }}"><i class="fas fa-hdd"></i> Discos</a></li>
                <li><a href="{{ route('prestamos.index') }}"><i class="fas fa-handshake"></i> Préstamos</a></li>
                <li><a href="{{ route('usuarios.index') }}"><i class="fas fa-users"></i> Usuarios</a></li>
            </div>
            <div class="Prueba">
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Salir
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                    @csrf
                </form>
            </div>
        </ul>
    </nav>

    <!-- Contenido principal -->
    <div id="main-content-wrapper">
        <!-- Encabezado -->
        <header class="Encabezado">
            <div></div>
            <div class="Titulo">
                <h1><i class="fas fa-chart-line"></i> Dashboard de Inventarios</h1>
            </div>
            <div class="Alias">
                <a href="#">
                    <p>{{ Auth::user()->Nombre ?? 'Usuario' }}</p>
                    <img src="{{ asset('Imagenes/user.png') }}" alt="Usuario">
                </a>
            </div>
        </header>

        <!-- Dashboard Container -->
        <main class="dashboard-container">
            
            <!-- Alertas/Notificaciones -->
            @if($pendientes > 0)
            <div class="alert-banner warning">
                <i class="fas fa-exclamation-triangle"></i>
                <p>Tienes <strong>{{ $pendientes }}</strong> entregas pendientes de aprobación.</p>
                <button class="alert-close" onclick="this.parentElement.style.display='none'">&times;</button>
            </div>
            @endif

            <!-- Fecha y Bienvenida -->
            <div class="welcome-section">
                <div class="welcome-text">
                    <h2>¡Bienvenido, {{ Auth::user()->Nombre ?? 'Usuario' }}!</h2>
                    <p>{{ \Carbon\Carbon::now()->locale('es')->isoFormat('dddd, D [de] MMMM [de] YYYY') }}</p>
                </div>
                <div class="quick-stats">
                    <span><i class="fas fa-clock"></i> {{ \Carbon\Carbon::now()->format('H:i') }}</span>
                </div>
            </div>

            <!-- Acciones Rápidas -->
            <div class="quick-actions">
                <a href="{{ route('entregas.create') }}" class="quick-action-btn entregas">
                    <i class="fas fa-plus-circle"></i> Nueva Entrega
                </a>
                <a href="{{ route('entregasEquipos.create') }}" class="quick-action-btn equipos">
                    <i class="fas fa-laptop-medical"></i> Registrar Equipo
                </a>
                <a href="{{ route('entregasDiscos.create') }}" class="quick-action-btn discos">
                    <i class="fas fa-hdd"></i> Registrar Disco
                </a>
                <a href="{{ route('prestamos.create') }}" class="quick-action-btn prestamos">
                    <i class="fas fa-handshake"></i> Nuevo Préstamo
                </a>
            </div>

            <!-- Tarjetas de Estadísticas -->
            <div class="stats-cards">
                <a href="{{ route('entregas.tablas') }}" class="stat-card-link">
                    <div class="stat-card entregas">
                        <div class="stat-icon">
                            <i class="fas fa-box-open"></i>
                        </div>
                        <div class="stat-info">
                            <h3>Total Entregas</h3>
                            <span class="stat-number" data-target="{{ $totalEntregas }}">0</span>
                            <span class="stat-detail"><i class="fas fa-calendar-day"></i> {{ $entregasMes }} este mes</span>
                        </div>
                    </div>
                </a>

                <a href="{{ route('entregasEquipos.index') }}" class="stat-card-link">
                    <div class="stat-card equipos">
                        <div class="stat-icon">
                            <i class="fas fa-laptop"></i>
                        </div>
                        <div class="stat-info">
                            <h3>Equipos Registrados</h3>
                            <span class="stat-number" data-target="{{ $totalEquipos }}">0</span>
                            <span class="stat-detail"><i class="fas fa-calendar-day"></i> {{ $equiposMes }} este mes</span>
                        </div>
                    </div>
                </a>

                <a href="{{ route('entregasDiscos.index') }}" class="stat-card-link">
                    <div class="stat-card discos">
                        <div class="stat-icon">
                            <i class="fas fa-hdd"></i>
                        </div>
                        <div class="stat-info">
                            <h3>Discos Entregados</h3>
                            <span class="stat-number" data-target="{{ $totalDiscos }}">0</span>
                            <span class="stat-detail"><i class="fas fa-calendar-day"></i> {{ $discosMes }} este mes</span>
                        </div>
                    </div>
                </a>

                <a href="{{ route('prestamos.index') }}" class="stat-card-link">
                    <div class="stat-card prestamos">
                        <div class="stat-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <div class="stat-info">
                            <h3>Préstamos</h3>
                            <span class="stat-number" data-target="{{ $totalPrestamos }}">0</span>
                            <span class="stat-detail"><i class="fas fa-calendar-day"></i> {{ $prestamosMes }} este mes</span>
                        </div>
                    </div>
                </a>

                <a href="{{ route('entregasEquipos.index') }}" class="stat-card-link">
                    <div class="stat-card pendientes">
                        <div class="stat-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="stat-info">
                            <h3>Pendientes</h3>
                            <span class="stat-number" data-target="{{ $pendientes }}">0</span>
                            <span class="stat-detail"><i class="fas fa-hourglass-half"></i> Por aprobar</span>
                        </div>
                    </div>
                </a>

                <a href="{{ route('entregasEquipos.index') }}" class="stat-card-link">
                    <div class="stat-card aprobados">
                        <div class="stat-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="stat-info">
                            <h3>Aprobados</h3>
                            <span class="stat-number" data-target="{{ $aprobados }}">0</span>
                            <span class="stat-detail"><i class="fas fa-thumbs-up"></i> Completados</span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Gráficos -->
            <div class="dashboard-charts">
                <div class="chart-card">
                    <div class="chart-header">
                        <h3><i class="fas fa-chart-line"></i> Actividad por Mes</h3>
                        <span class="chart-subtitle">Últimos 12 meses</span>
                    </div>
                    <div class="chart-body">
                        <canvas id="actividadChart"></canvas>
                    </div>
                </div>

                <div class="chart-card">
                    <div class="chart-header">
                        <h3><i class="fas fa-chart-pie"></i> Distribución del Inventario</h3>
                        <span class="chart-subtitle">Por categoría</span>
                    </div>
                    <div class="chart-body">
                        <canvas id="distribucionChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Indicadores de Progreso -->
            <div class="progress-section">
                <div class="progress-card">
                    <h4><i class="fas fa-tasks"></i> Estado de Aprobaciones</h4>
                    <div class="progress-item">
                        <div class="progress-label">
                            <span><i class="fas fa-laptop"></i> Equipos Aprobados</span>
                            <strong>{{ $porcentajeEquiposAprobados }}%</strong>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill equipos" style="width: {{ $porcentajeEquiposAprobados }}%"></div>
                        </div>
                    </div>
                    <div class="progress-item">
                        <div class="progress-label">
                            <span><i class="fas fa-hdd"></i> Discos Aprobados</span>
                            <strong>{{ $porcentajeDiscosAprobados }}%</strong>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill discos" style="width: {{ $porcentajeDiscosAprobados }}%"></div>
                        </div>
                    </div>
                </div>

                <div class="progress-card summary">
                    <h4><i class="fas fa-chart-bar"></i> Resumen del Mes</h4>
                    <ul class="summary-list">
                        <li>
                            <span class="summary-icon entregas"><i class="fas fa-box"></i></span>
                            <span class="summary-label">Entregas</span>
                            <span class="summary-value">{{ $entregasMes }}</span>
                        </li>
                        <li>
                            <span class="summary-icon equipos"><i class="fas fa-laptop"></i></span>
                            <span class="summary-label">Equipos</span>
                            <span class="summary-value">{{ $equiposMes }}</span>
                        </li>
                        <li>
                            <span class="summary-icon discos"><i class="fas fa-hdd"></i></span>
                            <span class="summary-label">Discos</span>
                            <span class="summary-value">{{ $discosMes }}</span>
                        </li>
                        <li>
                            <span class="summary-icon prestamos"><i class="fas fa-handshake"></i></span>
                            <span class="summary-label">Préstamos</span>
                            <span class="summary-value">{{ $prestamosMes }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Tablas de Inventario -->
            <div class="dashboard-tables">
                <!-- Tabla de Equipos Recientes -->
                <div class="table-card">
                    <div class="table-header equipos">
                        <h3><i class="fas fa-laptop"></i> Últimos Equipos Registrados</h3>
                        <a href="{{ route('entregasEquipos.index') }}" class="view-all-btn">
                            Ver todos <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                    <table class="inventory-table">
                        <thead>
                            <tr>
                                <th>Equipo</th>
                                <th>Usuario</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($ultimosEquipos as $equipo)
                            <tr>
                                <td>
                                    <div class="item-info">
                                        <i class="fas fa-laptop item-icon"></i>
                                        <span>{{ $equipo->nombre_equipo }}</span>
                                    </div>
                                </td>
                                <td>{{ $equipo->usuario }}</td>
                                <td>{{ \Carbon\Carbon::parse($equipo->fecha_entrega)->format('d/m/Y') }}</td>
                                <td>
                                    <span class="status-badge {{ $equipo->aprobado ? 'aprobado' : 'pendiente' }}">
                                        <i class="fas fa-{{ $equipo->aprobado ? 'check' : 'clock' }}"></i>
                                        {{ $equipo->aprobado ? 'Aprobado' : 'Pendiente' }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="empty-state">
                                    <i class="fas fa-inbox"></i>
                                    <p>No hay equipos registrados</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Tabla de Discos Recientes -->
                <div class="table-card">
                    <div class="table-header discos">
                        <h3><i class="fas fa-hdd"></i> Últimos Discos Entregados</h3>
                        <a href="{{ route('entregasDiscos.index') }}" class="view-all-btn">
                            Ver todos <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                    <table class="inventory-table">
                        <thead>
                            <tr>
                                <th>Disco</th>
                                <th>Usuario</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($ultimosDiscos as $disco)
                            <tr>
                                <td>
                                    <div class="item-info">
                                        <i class="fas fa-hdd item-icon disco"></i>
                                        <span>{{ $disco->nombre_disco }}</span>
                                    </div>
                                </td>
                                <td>{{ $disco->usuario }}</td>
                                <td>{{ \Carbon\Carbon::parse($disco->fecha_entrega)->format('d/m/Y') }}</td>
                                <td>
                                    <span class="status-badge {{ $disco->aprobado ? 'aprobado' : 'pendiente' }}">
                                        <i class="fas fa-{{ $disco->aprobado ? 'check' : 'clock' }}"></i>
                                        {{ $disco->aprobado ? 'Aprobado' : 'Pendiente' }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="empty-state">
                                    <i class="fas fa-inbox"></i>
                                    <p>No hay discos registrados</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </main>

        <!-- Footer -->
        <footer>
            <p>&copy; {{ date('Y') }} Sistema de Inventarios - Todos los derechos reservados</p>
        </footer>
    </div>

    <script>
        // Toggle del menú
        function toggleMenu() {
            const nav = document.getElementById('sidebar');
            const toggle = document.querySelector('.menu-toggle');
            const body = document.body;

            nav.classList.toggle('active');
            toggle.classList.toggle('active');
            body.classList.toggle('menu-open');
        }

        // Animación de contadores
        function animateCounters() {
            const counters = document.querySelectorAll('.stat-number');
            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-target'));
                const duration = 1500;
                const step = target / (duration / 16);
                let current = 0;
                
                const updateCounter = () => {
                    current += step;
                    if (current < target) {
                        counter.textContent = Math.floor(current);
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.textContent = target;
                    }
                };
                updateCounter();
            });
        }

        // Ejecutar animación cuando el DOM esté listo
        document.addEventListener('DOMContentLoaded', animateCounters);

        // Datos de PHP a JavaScript
        const entregasPorMes = @json($entregasPorMes);
        const equiposPorMes = @json($equiposPorMes);
        const discosPorMes = @json($discosPorMes);

        // Meses para etiquetas
        const meses = [];
        for (let i = 11; i >= 0; i--) {
            const fecha = new Date();
            fecha.setMonth(fecha.getMonth() - i);
            meses.push(fecha.toLocaleString('es', { month: 'short' }));
        }

        // Gráfico de actividad por mes
        const actividadCtx = document.getElementById('actividadChart').getContext('2d');
        new Chart(actividadCtx, {
            type: 'line',
            data: {
                labels: meses,
                datasets: [
                    {
                        label: 'Entregas',
                        data: entregasPorMes,
                        borderColor: '#509af0',
                        backgroundColor: 'rgba(80, 154, 240, 0.1)',
                        fill: true,
                        tension: 0.4,
                        borderWidth: 3
                    },
                    {
                        label: 'Equipos',
                        data: equiposPorMes,
                        borderColor: '#28a745',
                        backgroundColor: 'rgba(40, 167, 69, 0.1)',
                        fill: true,
                        tension: 0.4,
                        borderWidth: 3
                    },
                    {
                        label: 'Discos',
                        data: discosPorMes,
                        borderColor: '#9b59b6',
                        backgroundColor: 'rgba(155, 89, 182, 0.1)',
                        fill: true,
                        tension: 0.4,
                        borderWidth: 3
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            usePointStyle: true,
                            padding: 20
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        // Gráfico de distribución
        const distribucionCtx = document.getElementById('distribucionChart').getContext('2d');
        new Chart(distribucionCtx, {
            type: 'doughnut',
            data: {
                labels: ['Entregas', 'Equipos', 'Discos', 'Préstamos'],
                datasets: [{
                    data: [{{ $totalEntregas }}, {{ $totalEquipos }}, {{ $totalDiscos }}, {{ $totalPrestamos }}],
                    backgroundColor: [
                        '#509af0',
                        '#28a745',
                        '#9b59b6',
                        '#fd7e14'
                    ],
                    borderWidth: 0,
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '65%',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            padding: 20
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
