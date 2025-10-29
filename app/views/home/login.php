<?php ob_start(); ?>

<div class="contenedor-login">
  <h2>Iniciar Sesión</h2>

  <?php if (isset($_GET['error'])): ?>
      <p style="color:red;">Correo o contraseña incorrectos.</p>
  <?php endif; ?>

  <form action="/ilumina/public/auth/login" method="post">
    <label for="email">Correo Electrónico</label>
    <input type="email" id="email" name="email" placeholder="tu.correo@ejemplo.com" required>

    <label for="password">Contraseña</label>
    <input type="password" id="password" name="password" placeholder="Tu contraseña" required>

    <button type="submit">Entrar</button>
  </form>

  <p class="registro">¿No tienes cuenta? 
      <a href="/ilumina/public/registro">Regístrate aquí</a>
  </p>
</div>

<?php $contenido = ob_get_clean(); ?>
<?php require __DIR__ . '/../layout.php'; ?>
