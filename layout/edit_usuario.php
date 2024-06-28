<?php
session_start();
include ('../tools/editar_usuario.php');

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        .form-control {
            margin-bottom: 20px;
        }
        textarea {
            resize: none;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2>Editar usuario</h2>
        <form method="post" class="row g-3">
            <input type="hidden" name="usuario_id" value="<?php echo $usuario['usuario_id']; ?>">
            <div class="col-md-6">
                <label for="nombre_usuario" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario"
                    value="<?php echo $usuario['nombre_usuario']; ?>">
            </div>
            <div class="col-md-6">
                <label for="nombre_completo" class="form-label">Nombre completo</label>
                <input type="text" class="form-control" id="nombre_completo" name="nombre_completo"
                    value="<?php echo $usuario['nombre_completo']; ?>">
            </div>
            <div class="col-md-6">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" id="correo" name="correo"
                    value="<?php echo $usuario['correo']; ?>">
            </div>
            <div class="col-md-6">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono"
                    value="<?php echo $usuario['telefono']; ?>">
            </div>
            <div class="col-md-6">
                <label for="direccion" class="form-label">Dirección</label>
                <textarea class="form-control" id="direccion" name="direccion" rows="2"><?php echo $usuario['direccion']; ?></textarea>
            </div>
            <div class="col-md-6">
                <label for="tipo_usuario" class="form-label">Tipo de usuario</label>
                <select class="form-control" id="tipo_usuario" name="tipo_usuario">
                    <option value="administrador" <?php echo $usuario['tipo_usuario'] == 'administrador' ? 'selected' : ''; ?>>Administrador</option>
                    <option value="cliente" <?php echo $usuario['tipo_usuario'] == 'cliente' ? 'selected' : ''; ?>>Cliente</option>
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="../Screens/dashboard.php" class="btn btn-secondary">Atrás</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>