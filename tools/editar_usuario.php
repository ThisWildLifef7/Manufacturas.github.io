<?php
require ('../php/conexion.php');

// Verificar si se ha enviado el formulario de edición
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario_id = $_POST['usuario_id'];
    $nombre_usuario = $_POST['nombre_usuario'];
    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $tipo_usuario = $_POST['tipo_usuario'];

    // Actualizar los datos del usuario
    $stmt = $conn->prepare("UPDATE usuarios SET nombre_usuario=?, nombre_completo=?, correo=?, telefono=?, direccion=?, tipo_usuario=? WHERE usuario_id=?");
    $stmt->bind_param("ssssssi", $nombre_usuario, $nombre_completo, $correo, $telefono, $direccion, $tipo_usuario, $usuario_id);

    if ($stmt->execute() === TRUE) {
        echo "El usuario se ha actualizado correctamente.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    header("Location: ../Screens/dashboard.php");
    exit();
}

// Obtener los datos del usuario a editar
if (isset($_GET['id'])) {
    $usuario_id = $_GET['id'];
    $result = $conn->query("SELECT * FROM usuarios WHERE usuario_id=$usuario_id");
    $usuario = $result->fetch_assoc();
} else {
    header("Location: ../Screens/dashboard.php");
    exit();
}
?>