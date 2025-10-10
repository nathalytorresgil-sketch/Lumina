<?php
include 'conexion.php'; // aquí usas tu conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    // Manejo de la imagen
    $carpetaDestino = "uploads/";
    if (!is_dir($carpetaDestino)) {
        mkdir($carpetaDestino, 0777, true);
    }

    $nombreImagen = basename($_FILES["imagen"]["name"]);
    $rutaImagen = $carpetaDestino . $nombreImagen;

    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaImagen)) {
        $sql = "INSERT INTO productos (nombre, descripcion, precio, imagen) 
                VALUES ('$nombre', '$descripcion', '$precio', '$rutaImagen')";

        if ($conn->query($sql) === TRUE) {
            header("Location: productos.php?mensaje=Producto agregado con éxito");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Error al subir la imagen.";
    }
}
?>