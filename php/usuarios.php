<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    // Consulta para verificar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE nombre_usuario = '$usuario' AND contraseña = '$contraseña'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Inicio de sesión exitoso
        $row = $result->fetch_assoc();
        $_SESSION['nombre_usuario'] = $row['nombre_completo'];
        header("Location: index.php");
    } else {
        // Credenciales incorrectas, redirigir de nuevo al formulario de inicio de sesión con un mensaje de error
        header("Location: login.php?error=1");
        exit;
    }
}
?>