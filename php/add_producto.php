<?php
session_start();
include ('conexion.php');
// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Recibir los datos del formulario
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $categoria = $_POST['categoria'];
    $imagen = $_FILES['image']['name'];

    // Directorio donde se guardarán las imágenes
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES['image']['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Comprobar si el archivo es una imagen real
    $check = getimagesize($_FILES['image']['tmp_name']);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "El archivo no es una imagen.";
        $uploadOk = 0;
    }

    // Comprobar si el archivo ya existe
    if (file_exists($target_file)) {
        echo "Lo siento, el archivo ya existe.";
        $uploadOk = 0;
    }

    // Comprobar el tamaño del archivo
    if ($_FILES['image']['size'] > 500000) {
        echo "Lo siento, el archivo es demasiado grande.";
        $uploadOk = 0;
    }

    // Permitir ciertos formatos de archivo
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Lo siento, solo se permiten archivos JPG, JPEG, PNG y GIF.";
        $uploadOk = 0;
    }

    // Comprobar si $uploadOk es 0 debido a un error
    if ($uploadOk == 0) {
        echo "Lo siento, tu archivo no fue subido.";
        // Si todo está bien, intentar subir el archivo
    } else {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            // Insertar los datos en la base de datos
            $sql = "INSERT INTO Productos (nombre, descripcion, precio, stock, categoria_id, imagen) VALUES ('$nombre', '$descripcion', '$precio', '$stock', '$categoria', '$imagen')";
            if ($conn->query($sql) === TRUE) {
                echo "El producto se ha añadido correctamente.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Lo siento, hubo un error al subir tu archivo.";
        }
    }

    // Cerrar la conexión
    $conn->close();
}