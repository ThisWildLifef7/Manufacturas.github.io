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
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Perfil</title>
    <link rel="icon" type="image/png" href="../pics/logo-man.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background-color: #f8f9fa;
        }
        .custom-file-input:focus ~ .custom-file-label {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        .custom-file-label::after {
            content: "Elegir archivo";
        }
        .custom-file-input {
            cursor: pointer;
            width: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: all 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .img-thumbnail {
            max-width: 100%;
            height: auto;
            transition: all 0.3s;
        }
        .img-thumbnail:hover {
            transform: scale(1.05);
        }
        .form-group textarea {
            resize: none;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <h1 class="card-title text-center mb-4">Modificar perfil</h1>
            <form method="post" action="../php/alter_perfil.php" enctype="multipart/form-data">
                <div class="row">
                    <!-- Columna de carga de imagen -->
                    <div class="col-md-4 text-center">
                        <div class="form-group">
                            <label for="imagen">Imagen de perfil</label>
                            <div class="position-relative">
                                <img id="preview-img" src="pics/<?php echo $usuario['imagen']; ?>" class="img-thumbnail mt-3 mb-3" alt="">
                                <button type="button" class="btn btn-primary btn-block" onclick="document.getElementById('imagen').click()">Seleccionar archivo</button>
                                <input type="file" class="custom-file-input" id="imagen" name="imagen" onchange="previewImage()">
                            </div>
                        </div>
                    </div>
                    <!-- Columna de campos de texto -->
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="nombre_completo">Nombre completo</label>
                            <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" value="<?php echo $usuario['nombre_completo']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $usuario['correo']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $usuario['telefono']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <textarea class="form-control" id="direccion" name="direccion" rows="3" required><?php echo $usuario['direccion']; ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-secondary float-left" onclick="location.href='./perfil.php'">Atrás</button>
                        <button type="submit" class="btn btn-primary float-right">Guardar Cambios</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Script para previsualización de la imagen -->
<script>
    function previewImage() {
        var file = document.getElementById('imagen').files[0];
        var reader = new FileReader();
        reader.onloadend = function () {
            document.getElementById('preview-img').src = reader.result;
        }
        if (file) {
            reader.readAsDataURL(file);
        } else {
            document.getElementById('preview-img').src = '';
        }
    }
</script>
</body>
</html>
