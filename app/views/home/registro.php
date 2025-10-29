<?php ob_start(); ?>

<form id="formRegistro" class="formulario-registro" action="/ilumina/public/auth/registro" method="post" novalidate>
  <h2>Registrarse</h2>

  <div id="msgError" style="color:red; margin-bottom:10px;"></div>

  <label for="nombre">Nombre</label>
  <input type="text" id="nombre" name="nombre" required>

  <label for="apellido">Apellido</label>
  <input type="text" id="apellido" name="apellido" required>

  <label for="correo">Correo Electrónico</label>
  <input type="email" id="correo" name="correo" required>

  <label for="password">Contraseña (mínimo 8 caracteres)</label>
  <input type="password" id="password" name="password" required>

  <label for="password2">Confirmar Contraseña</label>
  <input type="password" id="password2" name="password2" required>

  <button type="submit" class="btn">Crear Cuenta</button>

  <p class="login-link">¿Ya tienes cuenta? 
    <a href="/ilumina/public/login">Inicia Sesión</a>
  </p>
</form>

<script src="../public/js/registro.js"></script>

<?php $contenido = ob_get_clean(); ?>
<?php require __DIR__ . '/../layout.php'; ?>
