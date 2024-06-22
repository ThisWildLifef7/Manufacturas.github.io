<?php
require ('../php/conexion.php');

// Verificar si se ha enviado el formulario de edición
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $categoria_id = $_POST['categoria_id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    // Actualizar los datos de la talla
    $stmt = $conn->prepare("UPDATE categorias SET nombre=?, descripcion=? WHERE categoria_id=?");
    $stmt->bind_param("ssi", $nombre, $descripcion, $categoria_id);

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
if (isset($_GET['id'])) {
    $categoria_id = $_GET['id'];
    $result = $conn->query("SELECT * FROM categorias WHERE categoria_id=$categoria_id");
    $usuario = $result->fetch_assoc();
} else {
    header("Location: ../Screens/dashboard.php");
    exit();
}
?>