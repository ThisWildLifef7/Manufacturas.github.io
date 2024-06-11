<?php
//Se cambia los valores
$servername = "localhost:3310";
$username = "root";
$password_db = "";
$dbname = "pruebalogin";

// Crear conexión
$conn = new mysqli($servername, $username, $password_db, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
