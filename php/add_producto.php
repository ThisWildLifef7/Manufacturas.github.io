<?php

require ('conexion.php');

$name = $_POST['nombre'];
$description = $_POST['descripcion'];
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
$price = $_POST['precio'];
$stockd = $_POST['stock'];
$category_id = $_POST['categoria_id'];

$sql = "INSERT INTO productos(nombre, descripcion, imagen, precio, stock, categoria_id) VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $name, $description, $imagen, $price, $stockd, $category_id);

if ($stmt->execute()) {
    echo "<script>
            alert('El producto ha sido añadido correctamente');
            window.location.href = '../Screens/dashboard.php';
          </script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>