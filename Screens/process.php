<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesos</title>
    <link rel="stylesheet" href="../styles/process.css">
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
                    <li><a class="primary" href="./nosotros.php">Nosotros</a></li>
                    <li>
                        <a class="secondary" href="../index.php#procesos">Procesos<i class="fa-solid fa-chevron-down"></i></a>
                        <ul class="menu-vertical">
                            <li><a href="#">Desarrollo</a></li>
                            <li><a href="#bordado">Bordado</a></li>
                            <li><a href="#corte">Corte</a></li>
                            <li><a href="#costura">Costura</a></li>
                            <li><a href="#acabado">Acabados</a></li>
                            <li><a href="#despacho">Despacho</a></li>
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
        <section class="part-sec" id="desarrollo">
            <figure class="card-fond">
                <img src="../pics/procesos/desarrollo/desarrollo-pro.jpg" alt="des">
            </figure>
            <div class="card-descrip-process">
                <div class="line"></div>
                <div class="up-descrip">
                    <h1 class="tittle-h1">Area de Desarrollo</h1>
                    <p class="parrafo">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolor sequi illum, adipisci temporibus, tenetur possimus modi, alias accusantium consequatur itaque est omnis pariatur eveniet beatae ab rerum optio nesciunt molestias.</p>
                </div>
                <div>
                    <div class="slider-img">
                        <figure>
                            <img src="../pics/procesos/desarrollo/desarrollo1.jpg" alt="ms">
                        </figure>
                        <figure>
                            <img src="../pics/procesos/desarrollo/desarrollo2.jpg" alt="ms">
                        </figure>
                        <figure>
                            <img src="../pics/procesos/desarrollo/desarrollo1.jpg" alt="ms">
                        </figure>
                    </div>
                    <div class="icon-slider">
                        <a href="#"><i class="fa-solid fa-angle-left"></i></a>
                        <a href="#"><i class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <section class="part-sec" id="bordado">
            <figure class="card-fond">
                <img src="../pics/procesos/bordado/bordado-pro.jpg" alt="bord">
            </figure>
            <div class="card-descrip-process">
                <div class="line"></div>
                <div class="up-descrip">
                    <h1 class="tittle-h1">Area de Bordados</h1>
                    <p class="parrafo">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolor sequi illum, adipisci temporibus, tenetur possimus modi, alias accusantium consequatur itaque est omnis pariatur eveniet beatae ab rerum optio nesciunt molestias.</p>
                </div>
                <div class="down-descrip">
                    <div class="slider-img">
                        <figure>
                            <img src="../pics/procesos/bordado/bordado_in1.jpg" alt="ms">
                        </figure>
                        <figure>
                            <img src="../pics/procesos/bordado/bordado_in2.jpg" alt="ms">
                        </figure>
                        <figure>
                            <img src="../pics/procesos/bordado/desarrollo4.jpg" alt="ms">
                        </figure>
                    </div>
                    <div class="icon-slider">
                        <a href="#"><i class="fa-solid fa-angle-left"></i></a>
                        <a href="#"><i class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <section class="part-sec" id="corte">
            <figure class="card-fond">
                <img src="../pics/procesos/corte/corte-pro.jpg" alt="cort">
            </figure>
            <div class="card-descrip-process">
                <div class="line"></div>
                <div class="up-descrip">
                    <h1 class="tittle-h1">Area de Corte</h1>
                    <p class="parrafo">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolor sequi illum, adipisci temporibus, tenetur possimus modi, alias accusantium consequatur itaque est omnis pariatur eveniet beatae ab rerum optio nesciunt molestias.</p>
                </div>
                <div class="down-descrip">
                    <div class="slider-img">
                        <figure>
                            <img src="../pics/procesos/corte/corte2.jpg" alt="ms">
                        </figure>
                        <figure>
                            <img src="../pics/procesos/corte/corte3.jpg" alt="ms">
                        </figure>
                        <figure>
                            <img src="../pics/procesos/corte/corte2.jpg" alt="ms">
                        </figure>
                    </div>
                    <div class="icon-slider">
                        <a href="#"><i class="fa-solid fa-angle-left"></i></a>
                        <a href="#"><i class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <section class="part-sec" id="costura">
            <figure class="card-fond">
                <img src="../pics/procesos/costura/costura-pro.jpg" alt="cost">
            </figure>
            <div class="card-descrip-process">
                <div class="line"></div>
                <div class="up-descrip">
                    <h1 class="tittle-h1">Area de Costura</h1>
                    <p class="parrafo">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolor sequi illum, adipisci temporibus, tenetur possimus modi, alias accusantium consequatur itaque est omnis pariatur eveniet beatae ab rerum optio nesciunt molestias.</p>
                </div>
                <div class="down-descrip">
                    <div class="slider-img">
                        <figure>
                            <img src="../pics/procesos/costura/costura1.jpg" alt="ms">
                        </figure>
                        <figure>
                            <img src="../pics/procesos/costura/costura2.jpg" alt="ms">
                        </figure>
                        <figure>
                            <img src="../pics/procesos/costura/costura3.jpg" alt="ms">
                        </figure>
                    </div>
                    <div class="icon-slider">
                        <a href="#"><i class="fa-solid fa-angle-left"></i></a>
                        <a href="#"><i class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <section class="part-sec" id="acabado">
            <figure class="card-fond">
                <img src="../pics/procesos/acabado/acabados-pro.jpg" alt="acab">
            </figure>
            <div class="card-descrip-process">
                <div class="line"></div>
                <div class="up-descrip">
                    <h1 class="tittle-h1">Area de Acabados</h1>
                    <p class="parrafo">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolor sequi illum, adipisci temporibus, tenetur possimus modi, alias accusantium consequatur itaque est omnis pariatur eveniet beatae ab rerum optio nesciunt molestias.</p>
                </div>
                <div class="down-descrip">
                    <div class="slider-img">
                        <figure>
                            <img src="../pics/procesos/acabado/acabado1.jpg" alt="ms">
                        </figure>
                        <figure>
                            <img src="../pics/procesos/acabado/acabado2.jpg" alt="ms">
                        </figure>
                        <figure>
                            <img src="../pics/procesos/acabado/acabado1.jpg" alt="ms">
                        </figure>
                    </div>
                    <div class="icon-slider">
                        <a href="#"><i class="fa-solid fa-angle-left"></i></a>
                        <a href="#"><i class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <section class="part-sec" id="despacho">
            <figure class="card-fond">
                <img src="../pics/procesos/despacho/despacho-pro.jpg" alt="desp">
            </figure>
            <div class="card-descrip-process">
                <div class="line"></div>
                <div class="up-descrip">
                    <h1 class="tittle-h1">Area de Despacho</h1>
                    <p class="parrafo">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolor sequi illum, adipisci temporibus, tenetur possimus modi, alias accusantium consequatur itaque est omnis pariatur eveniet beatae ab rerum optio nesciunt molestias.</p>
                </div>
                <div class="down-descrip">
                    <div class="slider-img">
                        <figure>
                            <img src="../pics/procesos/despacho/acabado4.jpg" alt="ms">
                        </figure>
                        <figure>
                            <img src="../pics/procesos/despacho/acabado4.jpg" alt="ms">
                        </figure>
                        <figure>
                            <img src="../pics/procesos/despacho/acabado4.jpg" alt="ms">
                        </figure>
                    </div>
                    <div class="icon-slider">
                        <a href="#"><i class="fa-solid fa-angle-left"></i></a>
                        <a href="#"><i class="fa-solid fa-angle-right"></i></a>
                    </div>
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
                        <li><a href="../index.php#nosotros"><i class="fa-regular fa-circle-right"></i>Nosotros</a></li>
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