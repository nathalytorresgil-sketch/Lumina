<?php
include 'conexion.php'; // tu archivo de conexión

// Validar que venga el id
if (!isset($_GET['id'])) {
    die("Error: No se especificó el producto.");
}

$id = $_GET['id'];

// Consultar datos del producto
$sql = "SELECT * FROM productos WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows === 0) {
    die("Error: Producto no encontrado.");
}

$producto = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Editar Producto</title>
  <link rel="stylesheet" href="estilos.css" />
</head>
<body>

  <main class="registro-contenedor">
    <form class="formulario-registro" action="procesar_actualizar_producto.php" method="post" enctype="multipart/form-data">
      <h2>Editar Producto</h2>

      <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">

      <label for="nombre">Nombre del Producto</label>
      <input type="text" id="nombre" name="nombre" value="<?php echo $producto['nombre']; ?>" required />

      <label for="descripcion">Descripción</label>
      <input id="descripcion" name="descripcion" value="<?php echo $producto['descripcion']; ?>" required />

      <label for="precio">Precio</label>
      <input type="number" id="precio" name="precio" value="<?php echo $producto['precio']; ?>" step="100" required />

      <label>Imagen Actual</label>
      <img src="<?php echo $producto['imagen']; ?>" alt="Imagen actual" style="max-width:150px; display:block; margin-bottom:10px;">

      <label for="imagen">Cambiar Imagen (opcional)</label>
      <input type="file" id="imagen" name="imagen" accept="image/*" />

      <button type="submit" class="btn">Actualizar Producto</button>
    </form>
  </main>

</body>
<?php include 'footer.php'; ?>
</html>
