<?php

require ('conexion.php');

$name = $_POST['nombre'];
$description = $_POST['descripcion'];

$sql = "INSERT INTO categorias(nombre, descripcion) VALUES (?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $name, $description);

if ($stmt -> execute()) {
    echo "<script>
            alert('La categoria ha sido añadida');
            window.location.href = '../Screens/dashboard.php';
          </script>";
} else {
    echo "Error: " . $stmt -> error;
}

$stmt -> close();
$conn -> close();

?>