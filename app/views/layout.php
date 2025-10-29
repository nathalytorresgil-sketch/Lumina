<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../public/css/layout.css">
    <link rel="stylesheet" href="../public/css/login.css">
    <link rel="stylesheet" href="../public/css/estilos.css">
</head>
<body>

<!-- ============ HEADER ============ -->
<header>
  <div class="contenedor-header">
    <div class="logo">
      <img src="../public/img/estrella.png" alt="Logo">
      <span>Lumina</span>
    </div>

    <nav>
      <ul>
        <li><a href="/ilumina/public/">Inicio</a></li>
        <li><a href="/ilumina/public/productos">Productos</a></li>
        
        <?php if (isset($_SESSION['usuario_id'])): ?>
          <li><a href="/ilumina/public/auth/logout">Cerrar Sesión</a></li>
        <?php else: ?>
          <li><a href="/ilumina/public/login">Iniciar Sesión</a></li>
          <li><a href="/ilumina/public/registro">Registrarse</a></li>
        <?php endif; ?>

        <li><a href="/ilumina/public/contacto">Contáctanos</a></li>
      </ul>
    </nav>
  </div>
</header>
<!-- ============ /HEADER ============ -->


<!-- ============ CONTENIDO DINÁMICO ============ -->
<main>
    <?php if (isset($contenido)) echo $contenido; ?>
</main>
<!-- ============ /CONTENIDO DINÁMICO ============ -->


<!-- ============ FOOTER ============ -->
<footer class="footer">
  <h2>Ilumina</h2>
  <p>© 2025 Todos los derechos reservados.</p>
</footer>
<!-- ============ /FOOTER ============ -->

</body>
</html>
