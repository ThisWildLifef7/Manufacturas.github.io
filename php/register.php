<?php 

require 'conexion.php';

$name = $_POST['nombre_completo'];
$username = $_POST['nombre_usuario'];
$correo = $_POST['correo'];
$password = $_POST['contraseña'];

//hashear la contraseña
// $hashed_password = password_hash($password, PASSWORD_DEFAULT);
//Definir tipo de usuario por defecto
$tipo_usuario = 'cliente';

//Insertar un nuevo usuario en la base de datos
$sql = "INSERT INTO usuarios (nombre_completo, nombre_usuario, correo, contraseña, tipo_usuario) VALUES (?, ?, ?, ?, '$tipo_usuario')";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $username, $correo, $password);

if ($stmt -> execute()) {
    echo "<script>
            alert('Tu cuenta ha sido creada satisfactoriamente');
            window.location.href = '../Screens/login.php';
          </script>";
    // header("Location: ../Screens/login.php");
} else {
    echo "Error: " . $stmt -> error;
}

//Cerrar conexion
$stmt -> close();
$conn -> close();

?>