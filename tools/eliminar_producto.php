<?php
require ('../php/conexion.php');

// Verificar si se ha recibido el ID del usuario a eliminar
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Eliminar el usuario de la base de datos
    $stmt = $conn->prepare("DELETE FROM productos WHERE producto_id=?");
    $stmt->bind_param("i", $product_id);

    if ($stmt->execute() === TRUE) {
        $mensaje = "El producto se ha eliminado correctamente.";
    } else {
        $mensaje = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

// Redirigir de vuelta a la lista de usuarios
header("Location: ../Screens/dashboard.php");
exit();
?>