<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Agregar Producto</title>
  <link rel="stylesheet" href="estilos.css" />
</head>
<body>

  <main class="registro-contenedor">
    <form class="formulario-registro" action="procesar_agregar_producto.php" method="post" enctype="multipart/form-data">
      <h2>Agregar Producto</h2>

      <label for="nombre">Nombre del Producto</label>
      <input type="text" id="nombre" name="nombre" placeholder="Ej: Cosmetico de belleza" required />

      <label for="descripcion">Descripción</label>
      <input id="descripcion" name="descripcion" placeholder="Descripción del producto" required />

      <label for="precio">Precio</label>
      <input type="number" id="precio" name="precio" placeholder="Ej: 50000" step="100" required />

      <label for="imagen">Imagen del Producto</label>
      <input type="file" id="imagen" name="imagen" accept="image/*" required />

      <button type="submit" class="btn">Guardar Producto</button>
    </form>
  </main>

</body>
<?php include 'footer.php'; ?>
</html>

