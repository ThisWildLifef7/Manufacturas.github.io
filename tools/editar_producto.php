<?php
require ('../php/conexion.php');

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir los datos del formulario
    $producto_id = $_POST['producto_id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $categoria_id = $_POST['categoria'];
    $imagen_actual = $_POST['imagen_actual'];
    $imagen = $_FILES['imagen']['name'];

    // Directorio donde se guardarán las imágenes
    $target_dir = "../../ups/";
    $target_file = $target_dir . basename($imagen);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Comprobar si se ha subido una nueva imagen
    if (!empty($imagen)) {
        // Comprobar si el archivo es una imagen real
        $check = getimagesize($_FILES['imagen']['tmp_name']);
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
        if ($_FILES['imagen']['size'] > 500000) {
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
        } else {
            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file)) {
                // Eliminar la imagen anterior
                if (!empty($imagen_actual) && file_exists($target_dir . $imagen_actual)) {
                    unlink($target_dir . $imagen_actual);
                }
                $imagen_final = $imagen;
            } else {
                echo "Lo siento, hubo un error al subir tu archivo.";
                $imagen_final = $imagen_actual;
            }
        }
    } else {
        $imagen_final = $imagen_actual;
    }

    // Preparar y ejecutar la consulta SQL
    $sql = "UPDATE productos SET nombre = ?, descripcion = ?, precio = ?, stock = ?, categoria_id = ?, imagen = ? WHERE producto_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdiisi", $nombre, $descripcion, $precio, $stock, $categoria_id, $imagen_final, $producto_id);

    if ($stmt->execute()) {
        echo "<script>
                alert('El producto se ha actualizado correctamente.');
                window.location.href = '../Screens/dashboard.php';
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>