<?php
session_start();
// Conectar a la base de datos
require 'conexion.php'; // Ajusta la ruta según tu estructura

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $categoria_id = $_POST['categoria_id'];

    // Manejo de la subida de la imagen
    $image = $_FILES['image']['name'];
    $target = "../images/" . basename($image);

    // Prepara la consulta SQL
    $sql = "INSERT INTO productos (nombre, descripcion, image, precio, stock, categoria_id) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssdis", $nombre, $descripcion, $image, $precio, $stock, $categoria_id);

    // Ejecuta la consulta y maneja la subida de la imagen
    if ($stmt->execute()) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            echo "<script>
                    alert('Producto agregado con éxito');
                    window.location.href = '../Screens/tienda.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error al subir la imagen.');
                    window.history.back();
                  </script>";
        }
    } else {
        echo "<script>
                alert('Error: " . $stmt->error . "');
                window.history.back();
              </script>";
    }

    // Cierra la conexión
    $stmt->close();
    $conn->close();
}
?>