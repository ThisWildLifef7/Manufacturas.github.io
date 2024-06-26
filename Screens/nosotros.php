<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros</title>
    <link rel="stylesheet" href="../styles/nosotros.css">
    <link rel="icon" type="image/png" href="../pics/logo-man.png">
    <script src="https://kit.fontawesome.com/326d6d93eb.js" crossorigin="anonymous"></script>
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
                    <li><a class="primary" href="#">Nosotros</a></li>
                    <li>
                        <a class="secondary" href="../index.php#procesos">Procesos<i class="fa-solid fa-chevron-down"></i></a>
                        <ul class="menu-vertical">
                            <li><a href="./process.php#">Desarrollo</a></li>
                            <li><a href="./process.php#bordado">Bordado</a></li>
                            <li><a href="./process.php#corte">Corte</a></li>
                            <li><a href="./process.php#costura">Costura</a></li>
                            <li><a href="./process.php#acabado">Acabados</a></li>
                            <li><a href="./process.php#despacho">Despacho</a></li>
                        </ul>
                    </li>
                    <li><a class="primary" href="../Screens/tienda.php">Tienda</a></li>
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
                    <li><a href="#"><i class="fa-solid fa-cart-shopping"></i>Carrito</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="main">
        <section class="part-us">
            <div class="sect s1">
                <div class="container-descrip">
                    <i class="fa-solid fa-caret-up"></i>
                    <i class="fa-solid fa-caret-down"></i>
                    <span class="parrafo">Desde 1988 para el mundo textil</span>
                    <h1 class="tittle-h1">Acerca de nosotros</h1>
                    <p class="parrafo">Aprende y conoce más de nosotros</p>
                </div>
                <div class="container-animated">
                    <div class="card-slid">
                        <img src="../pics/procesos/corte/corte-pro.jpg" alt="cort">
                        <div class="layer">
                            <div class="info">
                                <h1 class="sub-h2">Fundador</h1>
                                <p class="parrafo">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-slid">
                        <img src="../pics/procesos/bordado/bordado-pro.jpg" alt="cort">
                        <div class="layer">
                            <div class="info">
                                <h1 class="sub-h2">Fundador</h1>
                                <p class="parrafo">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-slid">
                        <img src="../pics/procesos/despacho/despacho-pro.jpg" alt="cort">
                        <div class="layer">
                            <div class="info">
                                <h1 class="sub-h2">Gerente</h1>
                                <p class="parrafo">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-slid">
                        <img src="../pics/procesos/costura/costura-pro.jpg" alt="cort">
                        <div class="layer">
                            <div class="info">
                                <h1 class="sub-h2">Subgerente</h1>
                                <p class="parrafo">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="sect s2">
            <figure class="picture-s2">
                <img src="../pics/nos-1.jpg" alt="our">
            </figure>
            <div class="descrip-our">
                <h1 class="tittle-h1">¿Quienes somos?</h1>
                <p class="parrafo">Manufacturas America es una empresa fundada en el año 1988, lider en la confección de ropa infantil en tejido de punto y plano, especialmente en algodones Pima y Organico. Tenemos una amplia gama de productos dirigidos a diferentes nichos de mercado, abarcando desde prendas básicas hasta prendas más elaboradas con mayor valor agregado.</p>
            </div>
        </section>
        <section class="sect s3">
            <div class="slide-container">
                <span class="slider-span" id="slider-span1"></span>
                <span class="slider-span" id="slider-span2"></span>
                <span class="slider-span" id="slider-span3"></span>
                <span class="slider-span" id="slider-span4"></span>
                <span class="slider-span" id="slider-span5"></span>
                <span class="slider-span" id="slider-span6"></span>
                <span class="slider-span" id="slider-span7"></span>
                
                <div class="image-slider">
                    <div class="slides-div" id="slider-1">
                        <img src="../pics/contact.jpg" alt="1" class="imc" id="img1">
                        <a href="#slider-span1" class="bttn" id="button-1"></a>
                    </div>
                    <div class="slides-div" id="slider-2">
                        <img src="../pics/contact.jpg" alt="2" class="imc" id="img2">
                        <a href="#slider-span2" class="bttn" id="button-2"></a>
                    </div>
                    <div class="slides-div" id="slider-3">
                        <img src="../pics/contact.jpg" alt="3" class="imc" id="img3">
                        <a href="#slider-span3" class="bttn" id="button-3"></a>
                    </div>
                    <div class="slides-div" id="slider-4">
                        <img src="../pics/contact.jpg" alt="4" class="imc" id="img4">
                        <a href="#slider-span4" class="bttn" id="button-4"></a>
                    </div>
                    <div class="slides-div" id="slider-5">
                        <img src="../pics/contact.jpg" alt="5" class="imc" id="img5">
                        <a href="#slider-span5" class="bttn" id="button-5"></a>
                    </div>
                    <div class="slides-div" id="slider-6">
                        <img src="../pics/contact.jpg" alt="6" class="imc" id="img6">
                        <a href="#slider-span6" class="bttn" id="button-6"></a>
                    </div>
                    <div class="slides-div" id="slider-7">
                        <img src="../pics/contact.jpg" alt="7" class="imc" id="img7">
                        <a href="#slider-span7" class="bttn" id="button-7"></a>
                    </div>
                </div>
            </div>
        </section>
        <section class="sect s4">
            <h1 class="tittle-h1">¿Que ofrecemos?</h1>
            <p class="parrafo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus commodi at blanditiis? Recusandae eligendi ut consequatur nesciunt, beatae molestias saepe totam delectus asperiores quasi. Natus excepturi id fugit sequi consequatur.</p>
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
                        <li><a href="#"><i class="fa-regular fa-circle-right"></i>Nosotros</a></li>
                        <li><a href="../Screens/tienda.php"><i class="fa-regular fa-circle-right"></i>Tienda</a></li>
                        <li><a href="../Screens/contacto.php"><i class="fa-regular fa-circle-right"></i>Contáctenos</a></li>
                    </ul>
                </div>
                <div class="box-enlaces">
                    <h2>Información</h2>
                    <ul class="enlaces">
                        <li><i class="fa-solid fa-phone"></i>+51 923 232 414</li>
                        <li><i class="fa-regular fa-envelope"></i>nenes@manufacturasamerica.com</li>
                        <li><i class="fa-solid fa-location-arrow"></i>Av. Los Castillos 504, Lima 15023</li>
                    </ul>
                </div>
            </div>
        </article>
        <div class="master">
            <li class="parrafito">Copyright 2024 © All Right Reserved Design by Eustass</li>
        </div>
    </footer>
</body>
</html>
