<?php

session_start();
include('conexion.php'); // Incluye tu archivo de conexión a la base de datos

// Asegúrate de que el usuario haya iniciado sesión
if (!isset($_SESSION['nombre_usuario'])) {
    header("Location: ../Screens/login.php");
    exit;
}

$nombre_usuario = $_SESSION['nombre_usuario'];

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    // Manejar la subida de la imagen de perfil
    if (!empty($_FILES['imagen']['name'])) {
        $imagen_perfil = basename($_FILES['imagen']['name']);
        $target_dir = "../../usr/";
        $target_file = $target_dir . $imagen_perfil;
        move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file);
    } else {
        // Recuperar la imagen de perfil actual del usuario
        $sql = "SELECT imagen FROM usuarios WHERE nombre_usuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $nombre_usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $usuario = $result->fetch_assoc();
        $imagen_perfil = $usuario['imagen'];
    }

    // Actualizar los datos del usuario en la base de datos
    $sql = "UPDATE usuarios SET nombre_completo=?, correo=?, telefono=?, direccion=?, imagen=? WHERE nombre_usuario=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssss', $nombre_completo, $correo, $telefono, $direccion, $imagen_perfil, $nombre_usuario);

    if ($stmt->execute()) {
        // Redirigir a la página de ver perfil después de actualizar
        header("Location: ../Screens/perfil.php");
        exit;
    } else {
        echo "Error al actualizar el perfil.";
    }
}
?>
