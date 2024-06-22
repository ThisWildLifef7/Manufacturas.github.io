<?php
session_start();
require ('../php/conexion.php');

// Obtener todas las tallas de la base de datos
$sql = "SELECT * FROM tallas";
$result = $conn->query($sql);

// Verificar si hay un mensaje en la URL
$mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : '';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tallas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            height: 80vh;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <!-- Formulario de creación de talla -->
            <div class="col-md-6">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Crear nueva talla</h1>
                </div>
                <form action="add_talla.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nombre">Digitar talla</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                            placeholder="XS, S, M, XL, L, ..." required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3"
                            placeholder="Small, Medium, ..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar talla</button>
                </form>
            </div>
            <!-- Tabla de tallas -->
            <div class="col-md-6">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Lista de tallas</h1>
                </div>
                <?php if ($mensaje): ?>
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <?php echo $mensaje; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $row['talla_id']; ?></td>
                                    <td><?php echo $row['nombre']; ?></td>
                                    <td><?php echo $row['descripcion']; ?></td>
                                    <td>
                                        <a href="../layout/edit_talla.php?id=<?php echo $row['talla_id']; ?>"
                                            class="btn btn-warning btn-sm">Editar</a>
                                        <a href="../tools/eliminar_talla.php?id=<?php echo $row['talla_id']; ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Está seguro de que desea eliminar esta talla?');">Eliminar</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4">No hay tallas registradas.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
$conn->close();
?>