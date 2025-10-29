<?php ob_start(); ?>

<section class="contacto">
  <div class="formulario-contacto">
    <h2>Contáctanos</h2>
    <p>¿Tienes alguna pregunta o comentario? ¡Nos encantaría escucharte!</p>

    <form method="POST">
      <label for="nombre">Nombre</label>
      <input type="text" id="nombre" name="nombre" placeholder="Tu nombre completo" required>

      <label for="correo">Correo Electrónico</label>
      <input type="email" id="correo" name="correo" placeholder="tu.correo@ejemplo.com" required>

      <label for="mensaje">Mensaje</label>
      <textarea id="mensaje" name="mensaje" rows="4" placeholder="Escribe tu mensaje aquí..." required></textarea>

      <button type="submit">Enviar Mensaje</button>
    </form>
  </div>
</section>

<?php $contenido = ob_get_clean(); ?>
<?php require __DIR__ . '/../layout.php'; ?>
