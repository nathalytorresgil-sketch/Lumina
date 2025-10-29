<?php ob_start(); ?>

<section class="hero" style="background-image: url('../public/img/ilumina1.png'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 100vh;">
  <div class="contenido-hero">
    <h1>Lumina tu Belleza Natural</h1>
    <p>Descubre nuestra exclusiva colección de productos para el cuidado de la piel, diseñados para realzar tu luminosidad.</p>
    <a href="/ilumina/public/productos" class="btn-hero">Explorar Productos</a>
  </div>
</section>

<section class="nueva-coleccion">
  <h2>Nuestra Nueva Colección</h2>
  <div class="contenedor">

    <div class="fila productos">
      <div class="imagen-card">
        <img src="../public/img/serum_1.png" alt="Suero Luminoso" class="img-producto">
        <div class="producto">Suero Luminoso de Vitamina C</div>
        <div class="overlay">¡Descúbrelo!</div>
      </div>

      <div class="imagen-card">
        <img src="../public/img/crema_2.png" alt="Crema Hidratante" class="img-producto">
        <div class="producto">Crema Hidratante de Rosas</div>
        <div class="overlay">¡Descúbrelo!</div>
      </div>

      <div class="imagen-card">
        <img src="../public/img/espuma_3.png" alt="Limpiador" class="img-producto">
        <div class="producto">Limpiador Facial Suave</div>
        <div class="overlay">¡Descúbrelo!</div>
      </div>
    </div>

    <div class="fila imagenes">
      <div class="imagen-card">
        <img src="../public/img/ilumina2.png" alt="Colección 1" />
        <div class="overlay">¡Piel radiante!</div>
      </div>
      <div class="imagen-card">
        <img src="../public/img/ilumina3.png" alt="Colección 2" />
        <div class="overlay">¡Hidratación profunda!</div>
      </div>
    </div>

  </div>
</section>

<?php $contenido = ob_get_clean(); ?>
<?php require __DIR__ . '/../layout.php'; ?>
