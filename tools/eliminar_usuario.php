<?php
require ('../php/conexion.php');

// Verificar si se ha recibido el ID del usuario a eliminar
if (isset($_GET['id'])) {
    $usuario_id = $_GET['id'];

    // Eliminar el usuario de la base de datos
    $stmt = $conn->prepare("DELETE FROM usuarios WHERE usuario_id=?");
    $stmt->bind_param("i", $usuario_id);

    if ($stmt->execute() === TRUE) {
        echo "El usuario se ha eliminado correctamente.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

// Redirigir de vuelta a la lista de usuarios
header("Location: ../Screens/dashboard.php");
exit();
?>