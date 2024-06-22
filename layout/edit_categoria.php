<?php
include ('../tools/editar_categoria.php');

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar categoria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;1,200;1,300;1,400;1,500;1,600&display=swap"
        rel="stylesheet">
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
        <h2>Editar categoria</h2>
        <form method="post" class="row g-3">
            <input type="hidden" name="categoria_id" value="<?php echo $usuario['categoria_id']; ?>">
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre"
                    value="<?php echo $usuario['nombre']; ?>">
            </div>
            <div class="col-md-6">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion"
                    rows="1"><?php echo $usuario['descripcion']; ?></textarea>
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