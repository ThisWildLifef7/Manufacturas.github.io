<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contáctenos</title>
    <link rel="stylesheet" href="../styles/contac.css">
    <link rel="icon" type="image/png" href="../pics/logo-man.png">
    <link
     rel="stylesheet"
     href="https://cdn.jsdelivr.net/npm/intl-tel-input@23.0.10/build/css/intlTelInput.css"
   />
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@23.0.10/build/js/intlTelInput.min.js"></script>
    
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
                            <li><a href="./process.php#desarrollo">Desarrollo</a></li>
                            <li><a href="./process.php#bordado">Bordado</a></li>
                            <li><a href="./process.php#corte">Corte</a></li>
                            <li><a href="./process.php#costura">Costura</a></li>
                            <li><a href="./process.php#acabados">Acabados</a></li>
                            <li><a href="./process.php#despacho">Despacho</a></li>
                        </ul>
                    </li>
                    <li><a class="primary" href="./tienda.php">Tienda</a></li>
                    <li><a class="primary" href="#">Contáctenos</a></li>
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
        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.6980806585016!2d-76.97221422402264!3d-12.064282288173953!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c65e98e0e9ff%3A0xd02abd3cfd61eca3!2sAv.%20Los%20Castillos%20504%2C%20Lima%2015023!5e0!3m2!1ses-419!2spe!4v1716756016368!5m2!1ses-419!2spe" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <section class="container-part-contact-one">
            <article class="box-up-contact">
                <div class="down-info-contact">
                    <div class="card-contact">
                        <i class="fa-solid fa-mobile-screen"></i>
                        <div class="shortcard-info">
                            <h2 class="tittle-h2">Número de celular</h2>
                            <li class="parrafo">(+51) 923 232 414</li>
                        </div>
                    </div>
                    <div class="card-contact">
                        <i class="fa-regular fa-envelope"></i>
                        <div class="shortcard-info">
                            <h2 class="tittle-h2">Correo electrónico</h2>
                            <li class="parrafo">nenes@manufacturasamerica.com</li>
                        </div>
                    </div>
                    <div class="card-contact">
                        <i class="fa-solid fa-location-dot"></i>
                        <div class="shortcard-info">
                            <h2 class="tittle-h2">Ubicación</h2>
                            <li class="parrafo">Av. Los Castillos 504, Lima 15023</li>
                        </div>
                    </div>
                </div>
            </article>
            <article class="box-down-contact">
                <div class="box-form">
                    <div class="box-up-descrip">
                        <h2 class="tittle-h1">Ponerse en contacto!</h2>
                        <p class="parrafito">¡Hablemos! Estamos aquí para responder tus preguntas y comentarios. Completa el formulario o contáctanos directamente para obtener más información sobre nuestros productos y servicios, o para discutir cualquier consulta específica que puedas tener. Esperamos con interés trabajar contigo.</p>
                    </div>
                    <form class="formulario" id="lookup" onsubmit="process(event)">
                        <div class="user-details">
                            <div class="input-box">
                                <label for="GET-name" class="details">Nombre:</label>
                                <input type="text" id="GET-name" name="user_name" placeholder="Ingresa tu nombre" required>
                            </div>
                            <div class="input-box">
                                <label for="GET-apellido" class="details">Apellido:</label>
                                <input type="text" id="GET-apellido" name="user_apellido" placeholder="Ingresa tu apellido" required>
                            </div>
                            <div class="input-box">
                                <label for="GET-email" class="details">Email:</label>
                                <input type="email" id="GET-email" name="user_email" placeholder="Ingresa tu email" required>
                            </div>
                            <div class="input-box">
                                <label for="phone" class="details">Teléfono:</label>
                                <input type="tel" id="phone" name="user_tel" required>
                            </div>
                            <div class="input-box-one">
                                <label for="GET-mensaje" class="details">Mensaje:</label>
                                <textarea cols="10" name="message" id="GET-mensaje" placeholder="Escribe algo aqui..." required></textarea>
                            </div>
                        </div>
                        <div class="box-button-form">
                            <button type="submit" class="initial-button" id="btn">Enviar</button>
                        </div>
                    </form>
                </div>
            </article>
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
                        <li><a href="#"><i class="fa-regular fa-circle-right"></i>Contáctenos</a></li>
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
    <script src="../js/contacto.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
    <script type="text/javascript">emailjs.init('NAvXsGPQqQBbP4iHY')</script>
</body>
</html>