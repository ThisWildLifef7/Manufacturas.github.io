<?php
session_start();
require 'conexion.php'; // Asegúrate de que este archivo existe y contiene la conexión a la base de datos

if (isset($_POST['nombre_usuario']) && isset($_POST['contraseña'])) {
    $nombre_usuario = $_POST['nombre_usuario'];
    $contraseña = $_POST['contraseña'];

    // Preparar la consulta SQL para evitar inyecciones SQL
    $stmt = $conn->prepare("SELECT usuario_id, nombre_completo, tipo_usuario FROM usuarios WHERE nombre_usuario = ? AND contraseña = ?");
    $stmt->bind_param("ss", $nombre_usuario, $contraseña);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $nombre_completo, $tipo_usuario);
        $stmt->fetch();

        // Guardar datos del usuario en la sesión
        $_SESSION['usuario_id'] = $id;
        $_SESSION['nombre_completo'] = $nombre_completo;
        $_SESSION['nombre_usuario'] = $nombre_usuario;
        $_SESSION['tipo_usuario'] = $tipo_usuario;

        // Redireccionar según el tipo de usuario
        if ($tipo_usuario == 'administrador') {
            header("Location: ../Screens/dashboard.php");
        } else if ($tipo_usuario == 'cliente') {
            // Verificar si un cliente está intentando acceder como administrador
            if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 'administrador') {
                header("Location: ../Screens/acceso_denegado.php");
            } else {
                header("Location: ../index.php");
            }
        } else {
            // Otro tipo de usuario (maneja según tus necesidades)
            header("Location: ../index.php");
        }
    } else {
        // Redireccionar con mensaje de error si las credenciales son incorrectas
        header("Location: ../Screens/login.php?error=1");
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
} else {
    header("Location: ../Screens/login.php");
}
?>