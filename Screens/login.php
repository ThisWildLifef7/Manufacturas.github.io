<?php
// Deshabilitar el almacenamiento en caché del navegador
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/png" href="../pics/logo-man.png">
    <link rel="stylesheet" href="../styles/login.css">
    <script src="https://kit.fontawesome.com/326d6d93eb.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="../php/validate.php" method="post" class="sign-in-form">
                    <h2 class="title">Iniciar sesión</h2>
                    <?php
                        // Mostrar mensaje de error si está presente en la URL
                        if (isset($_GET['error']) && $_GET['error'] == 1) {
                            echo '<div class="error-message" id="error-message">Usuario o contraseña incorrectos. Por favor, inténtalo de nuevo.</div>';
                        }
                    ?>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Usuario" name="nombre_usuario" required/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Contraseña" name="contraseña" required/>
                    </div>
                    <div class="content-select">
                        <select name="tipo_usuario" required>
                            <option value="" disabled selected>Tipo de Usuario</option>
                            <option value="administrador">Administrador</option>
                            <option value="cliente">Cliente</option>
                        </select>
                        <i></i>
                    </div>
                    <input type="submit" value="Ingresar" class="btn solid" />
                    <p class="social-text">O inicie sesión con estas plataformas</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>
                <form action="../php/register.php" method="post" class="sign-up-form">
                    <h2 class="title">Ingresa tus datos</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Nombre" name="nombre_completo" required/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Usuario" name="nombre_usuario" required/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Correo" name="correo" required/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Contraseña" name="contraseña" required/>
                    </div>
                    <input type="submit" class="btn" value="Crear cuenta" />
                    <p class="social-text">O inicie sesion con estas plataformas</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>¿Aún no tienes cuenta?</h3>
                    <p>
                        ¡Registrate hoy y disfruta de nuestros productos!
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Crear cuenta
                    </button>
                </div>
                <img src="../pics/svg/log.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>¡Bienvenido(a)!</h3>
                    <p>
                        Parece que ya tienes una cuenta con nosotros. ¡Nos alegra verte de nuevo!
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Iniciar sesión
                    </button>
                </div>
                <img src="../pics/svg/register.svg" class="image" alt="" />
            </div>
        </div>
    </div>
    <script src="../js/login.js"></script>
    <script>
        window.onload = function () {
            setTimeout(function () {
                var errorMessage = document.getElementById("error-message");
                if (errorMessage) {
                errorMessage.style.display = "none";
                }
            }, 5000);
        };
    </script>
</body>
</html>

<!-- comentarios
 
Links de github
https://github.com/codrops/astro-shop-view-transitions

-->