<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      <link rel="stylesheet" href="estilos.css" />
</head>

<body>
    <?php include 'header.php'; ?>

    
 <section class="hero" style="background-image: url('ilumina1.png'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 100vh;">
  <div class="contenido-hero">
    <h1>Lumina tu Belleza Natural</h1>
    <p>Descubre nuestra exclusiva colección de productos para el cuidado de la piel, diseñados para realzar tu luminosidad.</p>
    <a href="productos.php" class="btn-hero">Explorar Productos</a>
  </div>
</section>

    <section class="nueva-coleccion">
  <h2>Nuestra Nueva Colección</h2>
  <div class="contenedor">

  <div class="fila productos">
    <div >
  <div class="imagen-card">
    <img src="serum_1.png" alt="Suero Luminoso de Vitamina C" class="img-producto">
    <div class="producto">Suero Luminoso de Vitamina C</div>
    <div class="overlay">¡Descúbrelo!</div>
  </div>
</div>

      <div class="imagen-card">
    <img src="crema_2.png" alt="Suero Luminoso de Vitamina C" class="img-producto">
      <div class="producto">Crema Hidratante de Rosas</div>
      <div class="overlay">¡Descúbrelo!</div>
    </div>
      <div class="imagen-card">
    <img src="espuma_3.png" alt="Suero Luminoso de Vitamina C" class="img-producto">
      <div class="producto">Limpiador Facial Suave</div>
      <div class="overlay">¡Descúbrelo!</div>
    </div>
  </div>


  <div class="fila imagenes">
    <div class="imagen-card">
      <img src="ilumina2.png" alt="colección 1" />
      <div class="overlay">¡Piel radiante!</div>
    </div>
    <div class="imagen-card">
      <img src="ilumina3.png" alt="colección 2" />
      <div class="overlay">¡Hidratación profunda!</div>
    </div>
  </div>
</div>


</section>


</body>
<?php include 'footer.php'; ?>
</html>