<?php
session_start();
include('../php/conexion.php'); // Incluye tu archivo de conexión a la base de datos

// Asegúrate de que el usuario haya iniciado sesión
if (!isset($_SESSION['nombre_usuario'])) {
    header("Location: ./login.php");
    exit;
}

$nombre_usuario = $_SESSION['nombre_usuario'];

// Recuperar los datos del usuario de la base de datos
$sql = "SELECT * FROM usuarios WHERE nombre_usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $nombre_usuario);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();

// Verificar la ruta de la imagen
$imagen_perfil = $usuario['imagen'];
$imagen_path = "../../usr/" . $imagen_perfil; 
// Ajusta esta ruta según la estructura de tu proyecto y nombre de directorio

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Perfil</title>
    <link rel="icon" type="image/png" href="../pics/logo-man.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="my-4">Perfil de usuario</h1>
    <div class="card">
        <div class="card-header">
            Tus datos 
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <!-- Asegúrate de que $imagen_path sea correcto -->
                    <img src="<?php echo $imagen_path; ?>" class="img-thumbnail" alt="Imagen de perfil">
                </div>
                <div class="col-md-8">
                    <p><strong>Nombre de usuario:</strong> <?php echo $usuario['nombre_usuario']; ?></p>
                    <p><strong>Nombre completo:</strong> <?php echo $usuario['nombre_completo']; ?></p>
                    <p><strong>Correo:</strong> <?php echo $usuario['correo']; ?></p>
                    <p><strong>Teléfono:</strong> <?php echo $usuario['telefono']; ?></p>
                    <p><strong>Dirección:</strong> <?php echo $usuario['direccion']; ?></p>
                    <a href="./modificar_perfil.php" class="btn btn-primary mr-2">Modificar Perfil</a>
                    <?php if ($usuario['tipo_usuario'] == 'administrador'): ?>
                        <a href="./dashboard.php" class="btn btn-secondary">Ir al dashboard</a>
                    <?php else: ?>
                        <a href="../index.php" class="btn btn-secondary">Ir al inicio</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
