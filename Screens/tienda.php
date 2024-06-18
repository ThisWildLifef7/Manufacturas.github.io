<?php
session_start();
include '../php/conexion.php'; // Ajusta la ruta según tu estructura

$result = mysqli_query($conn, "SELECT * FROM productos");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="../styles/tienda.css">
    <link rel="icon" type="image/png" href="../pics/logo-man.png">
    <script src="https://kit.fontawesome.com/326d6d93eb.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <header class="header">
        <div class="box-right">
            <nav class="nav-right">
                <figure class="card-logo">
                    <img class="img" src="../pics/logotipo.png" alt="logo">
                </figure>
                <ul class="menu-horizontal">
                    <li><a class="primary" href="../index.php#">Inicio</a></li>
                    <li><a class="primary" href="./nosotros.php">Nosotros</a></li>
                    <li>
                        <a class="secondary" href="../index.php#procesos">Procesos<i class="fa-solid fa-chevron-down"></i></a>
                        <ul class="menu-vertical">
                            <li><a href="./process.php#">Desarrollo</a></li>
                            <li><a href="./process.php#bordado">Bordado</a></li>
                            <li><a href="./process.php#corte">Corte</a></li>
                            <li><a href="./process.php#costura">Costura</a></li>
                            <li><a href="./process.php#acabados">Acabados</a></li>
                            <li><a href="./process.php#despacho">Despacho</a></li>
                        </ul>
                    </li>
                    <li><a class="primary" href="#">Tienda</a></li>
                    <li><a class="primary" href="../Screens/contacto.php">Contáctenos</a></li>
                </ul>
                <ul class="icons-horizontal">
                    <li>
                        <a class="secondary" href="#">
                            <i class="fa-solid fa-circle-user"></i>
                            <?php
                                if (isset($_SESSION['nombre_completo'])) {
                                    echo htmlspecialchars($_SESSION['nombre_completo']);
                                }
                            ?>
                        </a>
                        <ul class="icons-vertical">
                            <li><a href="./perfil.php">Ver perfil</a></li>
                            <li><a href="../php/logout.php">Cerrar sesión</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" id="cart-icon"><i class="fa-solid fa-cart-shopping"></i>Carrito</a>
                        <div class="cart">
                            <h2 class="cart-title">Tu carrito</h2>
                            <!--Content-->
                            <div class="cart-content">
                                
                            </div>
                            <!--Total-->
                            <div class="total">
                                <div class="total-title">Total:</div>
                                <div class="total-price">$0</div>
                            </div>
                            <!--Buy button-->
                            <button type="button" class="btn-buy">Comprar ahora</button>
                            <!--Cart close-->
                            <i class='bx bx-x' id="close-cart"></i>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="main-tienda">
        <section class="shop container-card"><!--shop container-->
            <h2 class="section-title">Venta de productos</h2>
            <!--Content-->
            <div class="shop-content">
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <div class="product-box">
                        <img src="../images/<?php echo htmlspecialchars($row['image']); ?>" alt="producto" class="product-img">
                        <h2 class="product-title"><?php echo htmlspecialchars($row['nombre']); ?></h2>
                        <p class="product-description"><?php echo htmlspecialchars($row['descripcion']); ?></p>
                        <span class="price">$<?php echo htmlspecialchars($row['precio']); ?></span>
                        <span class="stock"><?php echo htmlspecialchars($row['stock']); ?></span>
                        <span class="categoria">Categoría: <?php echo obtenerNombreCategoria($conn, $row['categoria_id']); ?></span>
                        <!-- Ajusta la función obtenerNombreCategoria según cómo obtengas el nombre de la categoría -->
                        <i class='bx bx-shopping-bag add-cart'></i>
                    </div>
                <?php endwhile; ?>
                <div class="product-box">
                    <img src="../pics/fond_3.jpg" alt="ropa" class="product-img">
                    <h2 class="product-title">Enterizo con cierre</h2>
                    <span class="price">$25</span>
                    <i class='bx bx-shopping-bag add-cart'></i>
                </div>
                <div class="product-box">
                    <img src="../pics/fond_3.jpg" alt="ropa" class="product-img">
                    <h2 class="product-title">Enterizo con cierre</h2>
                    <span class="price">$25</span>
                    <i class='bx bx-shopping-bag add-cart'></i>
                </div>
                <div class="product-box">
                    <img src="../pics/fond_3.jpg" alt="ropa" class="product-img">
                    <h2 class="product-title">Enterizo con cierre</h2>
                    <span class="price">$25</span>
                    <i class='bx bx-shopping-bag add-cart'></i>
                </div>
                <div class="product-box">
                    <img src="../pics/fond_3.jpg" alt="ropa" class="product-img">
                    <h2 class="product-title">Enterizo con cierre</h2>
                    <span class="price">$25</span>
                    <i class='bx bx-shopping-bag add-cart'></i>
                </div>
                <div class="product-box">
                    <img src="../pics/fond_3.jpg" alt="ropa" class="product-img">
                    <h2 class="product-title">Enterizo con cierre</h2>
                    <span class="price">$25</span>
                    <i class='bx bx-shopping-bag add-cart'></i>
                </div>
                <div class="product-box">
                    <img src="../pics/fond_3.jpg" alt="ropa" class="product-img">
                    <h2 class="product-title">Enterizo con cierre</h2>
                    <span class="price">$25</span>
                    <i class='bx bx-shopping-bag add-cart'></i>
                </div>
                <div class="product-box">
                    <img src="../pics/fond_3.jpg" alt="ropa" class="product-img">
                    <h2 class="product-title">Enterizo con cierre</h2>
                    <span class="price">$25</span>
                    <i class='bx bx-shopping-bag add-cart'></i>
                </div>
                <div class="product-box">
                    <img src="../pics/fond_3.jpg" alt="ropa" class="product-img">
                    <h2 class="product-title">Enterizo con cierre</h2>
                    <span class="price">$25</span>
                    <i class='bx bx-shopping-bag add-cart'></i>
                </div>
                <div class="product-box">
                    <img src="../pics/fond_3.jpg" alt="ropa" class="product-img">
                    <h2 class="product-title">Enterizo con cierre</h2>
                    <span class="price">$25</span>
                    <i class='bx bx-shopping-bag add-cart'></i>
                </div>
                <div class="product-box">
                    <img src="../pics/fond_3.jpg" alt="ropa" class="product-img">
                    <h2 class="product-title">Enterizo con cierre</h2>
                    <span class="price">$25</span>
                    <i class='bx bx-shopping-bag add-cart'></i>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer">
        <article class="container-footer">
            <div class="info-left f1">
                <figure class="card-logo">
                    <img src="../pics/logotipo-reel.png" alt="logotipo">
                </figure>
                <p class="parrafo">Manufacturas América EIRL - Tu socio confiable en moda de calidad. Descubre nuestra pasión por la excelencia en cada prenda.</p>
                <span><a class="job" href="./job.php">Trabaja con nosotros</a></span>
            </div>
            <div class="info-right f1">
                <div class="box-enlaces">
                    <h2>Enlaces rápidos</h2>
                    <ul class="enlaces">
                        <li><a href="../index.php#"><i class="fa-regular fa-circle-right"></i>Inicio</a></li>
                        <li><a href="../Screens/nosotros.php"><i class="fa-regular fa-circle-right"></i>Nosotros</a></li>
                        <li><a href="../Screens/tienda.php"><i class="fa-regular fa-circle-right"></i>Tienda</a></li>
                        <li><a href="../Screens/contacto.php"><i class="fa-regular fa-circle-right"></i>Contáctenos</a></li>
                    </ul>
                </div>
                <div class="box-enlaces">
                    <h2>Información</h2>
                    <ul class="enlaces">
                        <li><i class="fa-solid fa-phone"></i>+51 923 232 414</li>
                        <li><i class="fa-regular fa-envelope"></i>nenes@manufacturasamerica.com</li>
                        <li><i class="fa-solid fa-location-dot"></i>Av. Los Castillos 504, Lima 15023</li>
                    </ul>
                </div>
            </div>
        </article>
        <div class="master">
            <li class="parrafito">Copyright 2024 © All Right Reserved Design by Eustass</li>
        </div>
    </footer>
    <script src="../js/tienda.js"></script>
</body>
</html>