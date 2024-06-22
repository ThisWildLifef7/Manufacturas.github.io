<?php

require ('conexion.php');

$name = $_POST['nombre'];
$description = $_POST['descripcion'];

$sql = "INSERT INTO tallas(nombre, descripcion) VALUES (?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $name, $description);

if ($stmt->execute()) {
    echo "<script>
            alert('La talla ha sido añadida');
            location.href = document.referrer;
          </script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>