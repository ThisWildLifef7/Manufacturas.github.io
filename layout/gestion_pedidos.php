<?php
session_start();
require ('../php/conexion.php');

// Obtener todos los pedidos de la base de datos
$sql = "SELECT orden.orden_id, usuarios.nombre_completo, usuarios.correo, orden.monto_total, orden.status, orden.created_at
        FROM orden
        JOIN usuarios ON orden.usuario_id = usuarios.usuario_id";
$result = $conn->query($sql);

// Verificar si hay un mensaje en la URL
$mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : '';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pedidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Lista de Pedidos</h1>
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
                    <th>Cliente</th>
                    <th>Correo</th>
                    <th>Monto Total</th>
                    <th>Estado</th>
                    <th>Fecha de Creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['orden_id']; ?></td>
                            <td><?php echo $row['nombre_completo']; ?></td>
                            <td><?php echo $row['correo']; ?></td>
                            <td><?php echo $row['monto_total']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                            <td>
                                <a href="ver_detalle_pedido.php?id=<?php echo $row['orden_id']; ?>"
                                    class="btn btn-info btn-sm">Ver Detalle</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No hay pedidos registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
$conn->close();
?>