<?php
require ('../php/conexion.php');

// Verificar si se ha enviado el formulario de edición
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $talla_id = $_POST['talla_id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    // Actualizar los datos de la talla
    $stmt = $conn->prepare("UPDATE tallas SET nombre=?, descripcion=? WHERE talla_id=?");
    $stmt->bind_param("ssi", $nombre, $descripcion, $talla_id);

    if ($stmt->execute() === TRUE) {
        $mensaje = "La talla se ha actualizado correctamente.";
    } else {
        $mensaje = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    // Redirigir de vuelta a la lista de tallas con el mensaje
    header("Location: ../Screens/dashboard.php?mensaje=" . urlencode($mensaje));
    exit();
}
?>