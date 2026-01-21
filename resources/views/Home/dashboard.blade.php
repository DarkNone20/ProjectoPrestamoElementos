<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - Inventarios</title>
    <link rel="stylesheet" href="{{ asset('assets/style-home.css') }}">
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
                <img src="{{ asset('Imagenes/Logo.png') }}" alt="Logo">
            </li>
            <div class="Menu">
                <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="{{ route('dashboard') }}"><i class="fas fa-chart-pie"></i> Dashboard</a></li>
                <li><a href="{{ route('entregas.index') }}"><i class="fas fa-box"></i> Entregas</a></li>
                <li><a href="{{ route('entregasEquipos.index') }}"><i class="fas fa-laptop"></i> Equipos</a></li>
                <li><a href="{{ route('entregasDiscos.index') }}"><i class="fas fa-hdd"></i> Discos</a></li>
                <li><a href="{{ route('prestamos.index') }}"><i class="fas fa-handshake"></i> Préstamos</a></li>
            </div>
            <div class="Prueba">
                <li><a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Salir</a></li>
            </div>
        </ul>
    </nav>

    <!-- Contenido principal -->
    <div id="main-content-wrapper">
        <!-- Encabezado -->
        <header class="Encabezado">
            <div></div>
            <div class="Titulo">
                <h1>Dashboard de Inventarios</h1>
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
            @if(isset($pendientes) && $pendientes > 0)
            <div class="alert-banner warning">
                <i class="fas fa-exclamation-triangle"></i>
                <p>Tienes <strong>{{ $pendientes }}</strong> entregas pendientes de aprobación.</p>
                <button class="alert-close" onclick="this.parentElement.style.display='none'">&times;</button>
            </div>
            @endif

            <!-- Acciones Rápidas -->
            <div class="quick-actions">
                <a href="{{ route('entregas.create') }}" class="quick-action-btn">
                    <i class="fas fa-plus"></i> Nueva Entrega
                </a>
                <a href="{{ route('entregasEquipos.create') }}" class="quick-action-btn">
                    <i class="fas fa-laptop"></i> Registrar Equipo
                </a>
                <a href="{{ route('entregasDiscos.create') }}" class="quick-action-btn">
                    <i class="fas fa-hdd"></i> Registrar Disco
                </a>
                <a href="{{ route('prestamos.create') }}" class="quick-action-btn">
                    <i class="fas fa-handshake"></i> Nuevo Préstamo
                </a>
            </div>

            <!-- Tarjetas de Estadísticas -->
            <div class="stats-cards">
                <div class="stat-card entregas">
                    <div class="stat-icon">
                        <i class="fas fa-box"></i>
                    </div>
                    <div class="stat-info">
                        <h3>Total Entregas</h3>
                        <span class="stat-number">{{ $totalEntregas ?? 0 }}</span>
                        <span class="stat-change positive">+12% este mes</span>
                    </div>
                </div>

                <div class="stat-card equipos">
                    <div class="stat-icon">
                        <i class="fas fa-laptop"></i>
                    </div>
                    <div class="stat-info">
                        <h3>Equipos Registrados</h3>
                        <span class="stat-number">{{ $totalEquipos ?? 0 }}</span>
                        <span class="stat-change positive">+5% este mes</span>
                    </div>
                </div>

                <div class="stat-card discos">
                    <div class="stat-icon">
                        <i class="fas fa-hdd"></i>
                    </div>
                    <div class="stat-info">
                        <h3>Discos Entregados</h3>
                        <span class="stat-number">{{ $totalDiscos ?? 0 }}</span>
                        <span class="stat-change positive">+8% este mes</span>
                    </div>
                </div>

                <div class="stat-card prestamos">
                    <div class="stat-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <div class="stat-info">
                        <h3>Préstamos Activos</h3>
                        <span class="stat-number">{{ $totalPrestamos ?? 0 }}</span>
                        <span class="stat-change negative">-3% este mes</span>
                    </div>
                </div>

                <div class="stat-card pendientes">
                    <div class="stat-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-info">
                        <h3>Pendientes</h3>
                        <span class="stat-number">{{ $pendientes ?? 0 }}</span>
                        <span class="stat-change">Por aprobar</span>
                    </div>
                </div>

                <div class="stat-card aprobados">
                    <div class="stat-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-info">
                        <h3>Aprobados</h3>
                        <span class="stat-number">{{ $aprobados ?? 0 }}</span>
                        <span class="stat-change positive">Completados</span>
                    </div>
                </div>
            </div>

            <!-- Panel de Filtros -->
            <div class="filter-panel">
                <form class="filter-row" method="GET" action="">
                    <div class="filter-group">
                        <label for="fecha_inicio">Fecha Inicio</label>
                        <input type="date" id="fecha_inicio" name="fecha_inicio">
                    </div>
                    <div class="filter-group">
                        <label for="fecha_fin">Fecha Fin</label>
                        <input type="date" id="fecha_fin" name="fecha_fin">
                    </div>
                    <div class="filter-group">
                        <label for="tipo">Tipo</label>
                        <select id="tipo" name="tipo">
                            <option value="">Todos</option>
                            <option value="entregas">Entregas</option>
                            <option value="equipos">Equipos</option>
                            <option value="discos">Discos</option>
                            <option value="prestamos">Préstamos</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="estado">Estado</label>
                        <select id="estado" name="estado">
                            <option value="">Todos</option>
                            <option value="pendiente">Pendiente</option>
                            <option value="aprobado">Aprobado</option>
                        </select>
                    </div>
                    <button type="submit" class="filter-btn">
                        <i class="fas fa-search"></i> Filtrar
                    </button>
                    <button type="reset" class="filter-btn secondary">
                        <i class="fas fa-redo"></i> Limpiar
                    </button>
                </form>
            </div>

            <!-- Gráficos -->
            <div class="dashboard-charts">
                <div class="chart-card">
                    <div class="chart-header">
                        <h3><i class="fas fa-chart-line"></i> Entregas por Mes</h3>
                        <div class="chart-actions">
                            <button class="chart-filter-btn active">2025</button>
                            <button class="chart-filter-btn">2024</button>
                        </div>
                    </div>
                    <div class="chart-body">
                        <canvas id="entregasChart"></canvas>
                    </div>
                </div>

                <div class="chart-card">
                    <div class="chart-header">
                        <h3><i class="fas fa-chart-pie"></i> Distribución por Tipo</h3>
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
                            <span>Equipos Aprobados</span>
                            <strong>75%</strong>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill green" style="width: 75%"></div>
                        </div>
                    </div>
                    <div class="progress-item">
                        <div class="progress-label">
                            <span>Discos Aprobados</span>
                            <strong>60%</strong>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill purple" style="width: 60%"></div>
                        </div>
                    </div>
                    <div class="progress-item">
                        <div class="progress-label">
                            <span>Entregas Completadas</span>
                            <strong>90%</strong>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill blue" style="width: 90%"></div>
                        </div>
                    </div>
                </div>

                <div class="progress-card">
                    <h4><i class="fas fa-warehouse"></i> Capacidad de Inventario</h4>
                    <div class="progress-item">
                        <div class="progress-label">
                            <span>Equipos en Stock</span>
                            <strong>45/100</strong>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill green" style="width: 45%"></div>
                        </div>
                    </div>
                    <div class="progress-item">
                        <div class="progress-label">
                            <span>Discos Disponibles</span>
                            <strong>28/50</strong>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill orange" style="width: 56%"></div>
                        </div>
                    </div>
                    <div class="progress-item">
                        <div class="progress-label">
                            <span>Préstamos Activos</span>
                            <strong>18/30</strong>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill red" style="width: 60%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tablas de Inventario -->
            <div class="dashboard-tables">
                <!-- Tabla de Equipos Recientes -->
                <div class="table-card">
                    <div class="table-header">
                        <h3><i class="fas fa-laptop"></i> Últimos Equipos Registrados</h3>
                        <a href="{{ route('entregasEquipos.index') }}" class="view-all-btn">Ver todos</a>
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
                            @forelse($ultimosEquipos ?? [] as $equipo)
                            <tr>
                                <td>{{ $equipo->nombre_equipo }}</td>
                                <td>{{ $equipo->usuario }}</td>
                                <td>{{ \Carbon\Carbon::parse($equipo->fecha_entrega)->format('d/m/Y') }}</td>
                                <td>
                                    <span class="status-badge {{ $equipo->aprobado ? 'aprobado' : 'pendiente' }}">
                                        {{ $equipo->aprobado ? 'Aprobado' : 'Pendiente' }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" style="text-align: center; color: #888;">No hay equipos registrados</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Tabla de Discos Recientes -->
                <div class="table-card">
                    <div class="table-header" style="background: linear-gradient(135deg, #6006b4, #9b59b6);">
                        <h3><i class="fas fa-hdd"></i> Últimos Discos Entregados</h3>
                        <a href="{{ route('entregasDiscos.index') }}" class="view-all-btn">Ver todos</a>
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
                            @forelse($ultimosDiscos ?? [] as $disco)
                            <tr>
                                <td>{{ $disco->nombre_disco }}</td>
                                <td>{{ $disco->usuario }}</td>
                                <td>{{ \Carbon\Carbon::parse($disco->fecha_entrega)->format('d/m/Y') }}</td>
                                <td>
                                    <span class="status-badge {{ strtolower($disco->estado) }}">
                                        {{ $disco->estado }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" style="text-align: center; color: #888;">No hay discos registrados</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Widgets y Actividad -->
            <div class="widget-grid">
                <!-- Widget de Resumen -->
                <div class="widget-card">
                    <h4><i class="fas fa-chart-bar"></i> Resumen del Mes</h4>
                    <ul class="widget-list">
                        <li>
                            <span>Entregas realizadas</span>
                            <span>{{ $entregasMes ?? 0 }}</span>
                        </li>
                        <li>
                            <span>Equipos entregados</span>
                            <span>{{ $equiposMes ?? 0 }}</span>
                        </li>
                        <li>
                            <span>Discos entregados</span>
                            <span>{{ $discosMes ?? 0 }}</span>
                        </li>
                        <li>
                            <span>Préstamos nuevos</span>
                            <span>{{ $prestamosMes ?? 0 }}</span>
                        </li>
                        <li>
                            <span>Devoluciones</span>
                            <span>{{ $devolucionesMes ?? 0 }}</span>
                        </li>
                    </ul>
                </div>

                <!-- Actividad Reciente -->
                <div class="activity-card">
                    <div class="activity-header">
                        <h3><i class="fas fa-history"></i> Actividad Reciente</h3>
                    </div>
                    <ul class="activity-list">
                        @forelse($actividadReciente ?? [] as $actividad)
                        <li class="activity-item">
                            <div class="activity-icon {{ $actividad->tipo }}">
                                <i class="fas fa-{{ $actividad->icono }}"></i>
                            </div>
                            <div class="activity-content">
                                <p><strong>{{ $actividad->usuario }}</strong> {{ $actividad->descripcion }}</p>
                                <span class="activity-time">{{ $actividad->created_at->diffForHumans() }}</span>
                            </div>
                        </li>
                        @empty
                        <li class="activity-item">
                            <div class="activity-content">
                                <p style="color: #888; text-align: center;">No hay actividad reciente</p>
                            </div>
                        </li>
                        @endforelse
                    </ul>
                </div>

                <!-- Calendario de Entregas -->
                <div class="calendar-widget">
                    <div class="calendar-header">
                        <h4><i class="fas fa-calendar-alt"></i> Enero 2026</h4>
                        <div class="calendar-nav">
                            <button><i class="fas fa-chevron-left"></i></button>
                            <button><i class="fas fa-chevron-right"></i></button>
                        </div>
                    </div>
                    <div class="calendar-grid">
                        <div class="calendar-day-header">Dom</div>
                        <div class="calendar-day-header">Lun</div>
                        <div class="calendar-day-header">Mar</div>
                        <div class="calendar-day-header">Mié</div>
                        <div class="calendar-day-header">Jue</div>
                        <div class="calendar-day-header">Vie</div>
                        <div class="calendar-day-header">Sáb</div>
                        
                        <div class="calendar-day other-month">28</div>
                        <div class="calendar-day other-month">29</div>
                        <div class="calendar-day other-month">30</div>
                        <div class="calendar-day other-month">31</div>
                        <div class="calendar-day">1</div>
                        <div class="calendar-day has-event">2</div>
                        <div class="calendar-day">3</div>
                        
                        <div class="calendar-day">4</div>
                        <div class="calendar-day">5</div>
                        <div class="calendar-day has-event">6</div>
                        <div class="calendar-day">7</div>
                        <div class="calendar-day">8</div>
                        <div class="calendar-day">9</div>
                        <div class="calendar-day">10</div>
                        
                        <div class="calendar-day">11</div>
                        <div class="calendar-day has-event">12</div>
                        <div class="calendar-day">13</div>
                        <div class="calendar-day">14</div>
                        <div class="calendar-day">15</div>
                        <div class="calendar-day today">16</div>
                        <div class="calendar-day">17</div>
                        
                        <div class="calendar-day">18</div>
                        <div class="calendar-day">19</div>
                        <div class="calendar-day has-event">20</div>
                        <div class="calendar-day">21</div>
                        <div class="calendar-day">22</div>
                        <div class="calendar-day">23</div>
                        <div class="calendar-day">24</div>
                        
                        <div class="calendar-day">25</div>
                        <div class="calendar-day">26</div>
                        <div class="calendar-day">27</div>
                        <div class="calendar-day has-event">28</div>
                        <div class="calendar-day">29</div>
                        <div class="calendar-day">30</div>
                        <div class="calendar-day">31</div>
                    </div>
                </div>
            </div>

        </main>

        <!-- Footer -->
        <footer></footer>
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

        // Gráfico de entregas por mes
        const entregasCtx = document.getElementById('entregasChart').getContext('2d');
        new Chart(entregasCtx, {
            type: 'line',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                datasets: [
                    {
                        label: 'Entregas',
                        data: [12, 19, 15, 25, 22, 30, 28, 35, 32, 40, 38, 45],
                        borderColor: '#509af0',
                        backgroundColor: 'rgba(80, 154, 240, 0.1)',
                        fill: true,
                        tension: 0.4
                    },
                    {
                        label: 'Equipos',
                        data: [8, 12, 10, 18, 15, 22, 20, 25, 23, 30, 28, 35],
                        borderColor: '#28a745',
                        backgroundColor: 'rgba(40, 167, 69, 0.1)',
                        fill: true,
                        tension: 0.4
                    },
                    {
                        label: 'Discos',
                        data: [5, 8, 6, 12, 10, 15, 14, 18, 16, 22, 20, 25],
                        borderColor: '#6006b4',
                        backgroundColor: 'rgba(96, 6, 180, 0.1)',
                        fill: true,
                        tension: 0.4
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
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
                    data: [35, 30, 20, 15],
                    backgroundColor: [
                        '#509af0',
                        '#28a745',
                        '#6006b4',
                        '#fd7e14'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                }
            }
        });

        // Filtros activos
        document.querySelectorAll('.chart-filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                this.parentElement.querySelectorAll('.chart-filter-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</body>
</html>
