<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            height: 80vh;
        }
        .col-md-6 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2>Crear nuevo usuario</h2>
    <form action="../php/register.php" method="post" class="row g-3" enctype="multipart/form-data">
        <div class="col-md-6">
            <label for="nombre_completo" class="form-label">Nombre completo</label>
            <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" required>
        </div>
        <div class="col-md-6">
            <label for="nombre_usuario" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" required>
        </div>
        <div class="col-md-6">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" class="form-control" id="correo" name="correo" required>
        </div>
        <div class="col-md-6">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" required>
        </div>
        <div class="col-md-6">
            <label for="direccion" class="form-label">Dirección</label>
            <textarea class="form-control" id="direccion" name="direccion" rows="2"></textarea>
        </div>
        <div class="col-md-6">
            <label for="contraseña" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="contraseña" name="contraseña" required>
        </div>
        <div class="col-md-6">
            <label for="tipo_usuario" class="form-label">Tipo de usuario</label>
            <select class="form-control" id="tipo_usuario" name="tipo_usuario" required>
                <option value="administrador">Administrador</option>
                <option value="cliente">Cliente</option>
            </select>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Crear Usuario</button>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>