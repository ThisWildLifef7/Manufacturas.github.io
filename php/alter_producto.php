<?php

session_start();
include ('conexion.php'); // Incluye tu archivo de conexión a la base de datos

// Asegúrate de que el usuario haya iniciado sesión
if (!isset($_SESSION['nombre_usuario'])) {
    header("Location: ../Screens/login.php");
    exit;
}

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $producto_id = $_POST['producto_id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $categoria_id = $_POST['categoria_id'];

    // Manejar la subida de la imagen del producto
    if (!empty($_FILES['imagen']['name'])) {
        $imagen_producto = basename($_FILES['imagen']['name']);
        $target_dir = "pics/";
        $target_file = $target_dir . $imagen_producto;
        move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file);
    } else {
        // Recuperar la imagen actual del producto
        $sql = "SELECT imagen FROM productos WHERE producto_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $producto_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $producto = $result->fetch_assoc();
        $imagen_producto = $producto['imagen'];
    }

    // Actualizar los datos del producto en la base de datos
    $sql = "UPDATE productos SET nombre=?, descripcion=?, precio=?, stock=?, categoria_id=?, imagen=? WHERE producto_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssdisis', $nombre, $descripcion, $precio, $stock, $categoria_id, $imagen_producto, $producto_id);

    if ($stmt->execute()) {
        // Redirigir a la página de ver producto después de actualizar
        header("Location: ../Screens/dashboard.php?producto_id=" . $producto_id);
        exit;
    } else {
        echo "Error al actualizar el producto.";
    }
}
?>