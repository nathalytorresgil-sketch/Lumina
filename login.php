<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Iniciar Sesión</title>
  <link rel="stylesheet" href="login.css" />
</head>

<body>
  
  <?php include 'header.php'; ?>

  <div class="contenedor-login">
    <h2>Iniciar Sesión</h2>

    <?php
    if (isset($_GET['error'])) {
        echo "<p style='color:red;'>Correo o contraseña incorrectos.</p>";
    }
    ?>

    <form action="verificar_login.php" method="post">
      <label for="email">Correo Electrónico</label>
      <input type="email" id="email" name="email" placeholder="tu.correo@ejemplo.com" required>

      <label for="password">Contraseña</label>
      <input type="password" id="password" name="password" placeholder="Tu contraseña" required>

      <button type="submit">Entrar</button>
    </form>

    <p class="registro">¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></p>
  </div>
</body>
<?php include 'footer.php'; ?>
</html>
