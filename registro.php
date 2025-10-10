<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Registrarse - Ilumina</title>
  <link rel="stylesheet" href="estilos.css" />
</head>
<body>
  <?php include 'header.php'; ?>

  <main class="registro-contenedor">
    <form class="formulario-registro" action="procesar_registro.php" method="post">
      <h2>Registrarse</h2>

      <label for="nombre">Nombre</label>
      <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required />

      <label for="apellido">Apellido</label>
      <input type="text" id="apellido" name="apellido" placeholder="Tu apellido" required />

      <label for="correo">Correo Electrónico</label>
      <input type="email" id="correo" name="correo" placeholder="tu.correo@ejemplo.com" required />

      <label for="password">Contraseña</label>
      <input type="password" id="password" name="password" placeholder="Crea tu contraseña" required />

      <button type="submit" class="btn">Crear Cuenta</button>

      <p class="login-link">¿Ya tienes cuenta? <a href="login.php">Inicia Sesión</a></p>
    </form>
  </main>

  
</body>
<?php include 'footer.php'; ?>
</html>
