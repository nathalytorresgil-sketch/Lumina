<?php
include 'conexion.php';

if (!isset($_GET['id'])) {
    die("Error: No se especificó el producto a eliminar.");
}

$id = $_GET['id'];

$sql = "SELECT imagen FROM productos WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $producto = $result->fetch_assoc();
    $rutaImagen = $producto['imagen'];

    $sqlEliminar = "DELETE FROM productos WHERE id = $id";
    if ($conn->query($sqlEliminar) === TRUE) {
        if (file_exists($rutaImagen)) {
            unlink($rutaImagen);
        }
        header("Location: productos.php?mensaje=Producto eliminado con éxito");
        exit();
    } else {
        echo "Error al eliminar: " . $conn->error;
    }
} else {
    echo "Producto no encontrado.";
}
?>
