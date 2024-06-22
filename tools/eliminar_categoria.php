<?php

include ('../php/conexion.php');

// Verificar si se ha recibido el ID del usuario a eliminar
if (isset($_GET['id'])) {
    $categoria_id = $_GET['id'];

    // Eliminar la talla de la base de datos
    $stmt = $conn->prepare("DELETE FROM categorias WHERE categoria_id=?");
    $stmt->bind_param("i", $talla_id);

    if ($stmt->execute() === TRUE) {
        $mensaje = "La talla se ha eliminado correctamente.";
    } else {
        $mensaje = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
//Redirigir de vuelta al dashboard
header("Location: ../Screens/dashboard.php");
exit();
?>