<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    // Verificar si se subió nueva imagen
    if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] === 0) {
        $carpetaDestino = "uploads/";
        if (!is_dir($carpetaDestino)) {
            mkdir($carpetaDestino, 0777, true);
        }

        $nombreImagen = basename($_FILES["imagen"]["name"]);
        $rutaImagen = $carpetaDestino . $nombreImagen;

        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaImagen)) {
            // Actualizar también la imagen
            $sql = "UPDATE productos 
                    SET nombre='$nombre', descripcion='$descripcion', precio='$precio', imagen='$rutaImagen'
                    WHERE id=$id";
        } else {
            die("Error al subir la imagen.");
        }
    } else {
        // Si no hay nueva imagen, solo actualizamos los demás campos
        $sql = "UPDATE productos 
                SET nombre='$nombre', descripcion='$descripcion', precio='$precio'
                WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: productos.php?mensaje=Producto actualizado con éxito");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
