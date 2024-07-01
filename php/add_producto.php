<?php

require ('conexion.php');

$name = $_POST['nombre'];
$description = $_POST['descripcion'];
$price = $_POST['precio'];
$stockd = $_POST['stock'];
$category_id = $_POST['categoria_id'];

// Directorio donde se guardarán las imágenes
$target_dir = "../../ups/";
$image_name = basename($_FILES["imagen"]["name"]);
$target_file = $target_dir . $image_name;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Comprobar si el archivo es una imagen real
$check = getimagesize($_FILES["imagen"]["tmp_name"]);
if($check !== false) {
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
if ($_FILES["imagen"]["size"] > 500000) {
    echo "Lo siento, el archivo es demasiado grande.";
    $uploadOk = 0;
}

// Permitir ciertos formatos de archivo
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "Lo siento, solo se permiten archivos JPG, JPEG, PNG y GIF.";
    $uploadOk = 0;
}

// Comprobar si $uploadOk es 0 debido a un error
if ($uploadOk == 0) {
    echo "Lo siento, tu archivo no fue subido.";
} else {
    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
        // Insertar los datos en la base de datos usando prepared statements
        $sql = "INSERT INTO productos(nombre, descripcion, imagen, precio, stock, categoria_id) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $name, $description, $image_name, $price, $stockd, $category_id);

        if ($stmt->execute()) {
            echo "<script>
                    alert('El producto ha sido añadido correctamente');
                    window.location.href = '../Screens/dashboard.php';
                  </script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Lo siento, hubo un error al subir tu archivo.";
    }
}

$conn->close();

?>
