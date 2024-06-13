<?php

    session_start();
    if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'administrador') {
        // Redirigir al usuario a acceso_denegado.php si no tiene permisos de administrador
        header("Location: ./acceso_denegado.html");
    exit; // Asegurar que el script se detenga después de redirigir
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Administrador</title>
    <link rel="icon" type="image/png" href="../pics/logo-man.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/dash.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Librería Chart.js para gráficos -->
</head>
<body>
 <!-- Encabezado -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">
                <img src="../pics/logo-man.png" width="30" height="30" class="d-inline-block align-top" alt="">
                Manufacturas America EIRL
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                   <?php if (isset($_SESSION['nombre_usuario'])) : ?>
                        <li class="nav-item">
                            <span class="navbar-text mr-3">Bienvenido, <?php echo $_SESSION['nombre_usuario']; ?></span>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Opciones
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="../Screens/perfil.php">Perfil</a>
                                <a class="dropdown-item" href="#">Configuración</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../php/logout.php">Cerrar Sesión</a>
                            </div>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Iniciar Sesión</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Contenido Principal -->
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                Dashboard del Administrador
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Gestión de Productos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Gestión de Pedidos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Estadísticas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Configuración
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Contenido Principal -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <button class="btn btn-sm btn-outline-secondary">Exportar</button>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Gráfico de Ventas Mensuales
                            </div>
                            <div class="card-body">
                                <canvas id="ventasChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Últimos Pedidos
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Pedido #1234 - $150.00</li>
                                <li class="list-group-item">Pedido #1235 - $220.00</li>
                                <li class="list-group-item">Pedido #1236 - $180.00</li>
                                <li class="list-group-item">Pedido #1237 - $300.00</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                Productos más Vendidos
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Ventas</th>
                                            <th>Precio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Producto A</td>
                                            <td>50 unidades</td>
                                            <td>$100.00</td>
                                        </tr>
                                        <tr>
                                            <td>Producto B</td>
                                            <td>30 unidades</td>
                                            <td>$80.00</td>
                                        </tr>
                                        <tr>
                                            <td>Producto C</td>
                                            <td>25 unidades</td>
                                            <td>$120.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                Usuarios Registrados
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Total: 1000</h5>
                                <a href="#" class="btn btn-primary">Ver Detalles</a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- JavaScript opcional -->
    <script>
        // Configuración del gráfico
        var ctx = document.getElementById('ventasChart').getContext('2d');
        var ventasChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],
                datasets: [{
                    label: 'Ventas',
                    data: [150, 220, 180, 300, 250, 400],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>