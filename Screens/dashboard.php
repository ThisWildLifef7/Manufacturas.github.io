<?php
session_start();
if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'administrador') {
    // Redirigir al usuario a acceso_denegado.php si no tiene permisos de administrador
    header("Location: ./acceso_denegado.php");
    exit; // Asegurar que el script se detenga después de redirigir
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main - Administrador</title>
    <link rel="icon" type="image/png" href="../pics/logo-man.png">
    <link rel="stylesheet" href="../styles/dash.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Librería Chart.js para gráficos -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <!-- Encabezado -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
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
                            <span class="navbar-text mr-3">Bienvenido, <?php echo $_SESSION['nombre_completo']; ?></span>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Opciones
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="./perfil.php">Perfil</a>
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
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <div class="control-option">
                                <i class='bx bx-grid-alt'></i>
                                <a class="nav-link" href="#" onclick="cargarContenidoPrincipal()">
                                    Menu principal
                                </a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="control-option">
                                <i class='bx bx-store-alt'></i>
                                <a class="nav-link" href="#">
                                    Productos
                                </a>
                                <i class='bx bxs-chevron-down arrow'></i>
                            </div>
                            <ul>
                                <li>
                                    <a class="item-plus" href="#" onclick="cargarListaProductos()">
                                        Lista de Productos
                                    </a>
                                </li>
                                <li>
                                    <a class="item-plus" href="#" onclick="cargarAddCategorias()">
                                        Nueva categoria
                                    </a>
                                </li>
                                <li>
                                    <a class="item-plus" href="#" onclick="cargarAddTallas()">
                                        Nueva talla
                                    </a>
                                </li>
                                <li>
                                    <a class="item-plus" href="#" onclick="cargarAddProductos()">
                                        Nuevo producto
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <div class="control-option">
                                <i class='bx bx-user'></i>
                                <a class="nav-link">
                                    Usuarios
                                </a>
                                <i class='bx bxs-chevron-down arrow'></i>
                            </div>
                            <ul>
                                <li>
                                    <a class="item-plus" href="#" onclick="cargarListaUsuarios()">
                                        Gestionar usuarios
                                    </a>
                                </li>
                                <li>
                                    <a class="item-plus" href="#" onclick="cargarAddUsers()">
                                        Nuevo usuario
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#" onclick="cargarEstadisticas()">
                                Estadísticas
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <div class="control-option">
                                <i class='bx bx-cog'></i>
                                <a class="nav-link" href="#" onclick="cargarConfiguracion()">
                                    Configuración
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Contenido Principal -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" id="contenido-principal"></main>
        </div>
    </div>
    <script src="../js/load_funct.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>