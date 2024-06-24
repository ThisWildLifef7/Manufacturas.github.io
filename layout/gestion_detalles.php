<?php
session_start();
include ('../php/conexion.php');

// Verificar si se ha recibido el ID del pedido y validar la entrada
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    // Redirigir a la lista de pedidos si no se proporciona un ID válido
    header("Location: listar_pedidos.php?mensaje=" . urlencode("ID de pedido no válido."));
    exit();
}

$orden_id = intval($_GET['id']);  // Convertir a entero para mayor seguridad

// Obtener los detalles del pedido
$sql = "SELECT productos.nombre, productos.descripcion, productos.precio, ordendetails.cantidad, ordendetails.precio AS precio_total
        FROM ordendetails
        JOIN producttallas ON ordendetails.product_talla_id = producttallas.product_talla_id
        JOIN productos ON producttallas.producto_id = productos.producto_id
        WHERE ordendetails.orden_id = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Error en la preparación de la consulta: " . $conn->error);
}
$stmt->bind_param("i", $orden_id);
$stmt->execute();
$result = $stmt->get_result();

// Obtener información del pedido y del cliente
$sql_pedido = "SELECT orden.orden_id, usuarios.nombre_completo, usuarios.correo, orden.monto_total, orden.status, orden.created_at
               FROM orden
               JOIN usuarios ON orden.usuario_id = usuarios.usuario_id
               WHERE orden.orden_id = ?";
$stmt_pedido = $conn->prepare($sql_pedido);
if (!$stmt_pedido) {
    die("Error en la preparación de la consulta: " . $conn->error);
}
$stmt_pedido->bind_param("i", $orden_id);
$stmt_pedido->execute();
$pedido = $stmt_pedido->get_result()->fetch_assoc();
if (!$pedido) {
    header("Location: listar_pedidos.php?mensaje=" . urlencode("Pedido no encontrado."));
    exit();
}
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
            <h1 class="h2">Detalle del Pedido #
                <?php echo htmlspecialchars($pedido['orden_id']); ?>
            </h1>
        </div>
        <div class="mb-3">
            <h4>Información del Cliente</h4>
            <p><strong>Nombre:</strong>
                <?php echo htmlspecialchars($pedido['nombre_completo']); ?>
            </p>
            <p><strong>Correo:</strong>
                <?php echo htmlspecialchars($pedido['correo']); ?>
            </p>
        </div>
        <div class="mb-3">
            <h4>Información del Pedido</h4>
                <p><strong>Monto Total:</strong>
                    <?php echo htmlspecialchars($pedido['monto_total']); ?>
                </p>
                <p><strong>Estado:</strong>
                    <?php echo htmlspecialchars($pedido['status']); ?>
                </p>
                <p><strong>Fecha de Creación:</strong>
                    <?php echo htmlspecialchars($pedido['created_at']); ?>
                </p>
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
                            <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($row['descripcion']); ?></td>
                            <td><?php echo htmlspecialchars($row['precio']); ?></td>
                            <td><?php echo htmlspecialchars($row['cantidad']); ?></td>
                            <td><?php echo htmlspecialchars($row['precio_total']); ?></td>
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
