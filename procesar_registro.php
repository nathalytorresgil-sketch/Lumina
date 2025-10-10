<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "ilumina");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Recoger datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encriptar contraseña

// Insertar en la base de datos
$sql = "INSERT INTO usuarios (nombre, apellido, correo, password) 
        VALUES ('$nombre', '$apellido', '$correo', '$password')";

if ($conn->query($sql) === TRUE) {
    header("Location: login.php");
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
