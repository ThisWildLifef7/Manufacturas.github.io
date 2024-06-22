<?php
session_start();
require ('../php/conexion.php');


// Obtener los detalles del pedido
$sql = "SELECT productos.nombre, productos.descripcion, productos.precio, orderdetails.cantidad, orderdetails.precio AS precio_total
            FROM ordendetails
            JOIN tallas ON orderdetails.product_talla_id = producttallas.product_talla_id
            JOIN productos ON producttallas.producto_id = productos.producto_id
            WHERE orderdetails.orden_id = ?";

// Obtener información del pedido y del cliente
$sql_pedido = "SELECT orden.orden_id, usuarios.nombre_completo, usuarios.correo, orden.monto_total, orden.status, orden.created_at
                   FROM orden
                   JOIN usuarios ON orden.usuario_id = usuarios.usuario_id
                   WHERE orden.orden_id = ?";

$result = $conn->query($sql_pedido, $sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Pedido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Detalle del Pedido #<?php echo $pedido['orden_id']; ?></h1>
        </div>
        <div class="mb-3">
            <h4>Información del Cliente</h4>
            <p><strong>Nombre:</strong> <?php echo $pedido['nombre_completo']; ?></p>
            <p><strong>Correo:</strong> <?php echo $pedido['correo']; ?></p>
        </div>
        <div class="mb-3">
            <h4>Información del Pedido</h4>
            <p><strong>Monto Total:</strong> <?php echo $pedido['monto_total']; ?></p>
            <p><strong>Estado:</strong> <?php echo $pedido['status']; ?></p>
            <p><strong>Fecha de Creación:</strong> <?php echo $pedido['created_at']; ?></p>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre del Producto</th>
                    <th>Descripción</th>
                    <th>Precio Unitario</th>
                    <th>Cantidad</th>
                    <th>Precio Total</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['descripcion']; ?></td>
                        <td><?php echo $row['precio']; ?></td>
                        <td><?php echo $row['cantidad']; ?></td>
                        <td><?php echo $row['precio_total']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="listar_pedidos.php" class="btn btn-secondary">Volver a la Lista de Pedidos</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
$stmt->close();
$stmt_pedido->close();
$conn->close();
?>