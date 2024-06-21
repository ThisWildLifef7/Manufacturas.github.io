<?php
// Conectar a la base de datos
require '../php/conexion.php'; // Ajusta la ruta según tu estructura

// Consulta para contar los usuarios
$sql = "SELECT COUNT(*) AS total_usuarios FROM usuarios";
$result = mysqli_query($conn, $sql);

// Obtener el resultado
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $total_usuarios = $row['total_usuarios'];
} else {
    $total_usuarios = 0;
}

// Cerrar la conexión
mysqli_close($conn);
?>