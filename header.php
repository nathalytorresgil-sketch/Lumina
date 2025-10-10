<?php
session_start(); // Asegúrate de iniciar la sesión en todos los archivos que usen el header
?>
<link rel="stylesheet" href="header.css">

<header>
  <div class="contenedor-header">
    <div class="logo">
      <img src="estrella.png" alt="Logo">
      <span>Lumina</span>
    </div>

    <nav>
      <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="productos.php">Productos</a></li>
        
        <?php if (isset($_SESSION['usuario_id'])): ?>
          <li><a href="verificar_login.php?logout=1">Cerrar Sesión</a></li>
        <?php else: ?>
          <li><a href="login.php">Iniciar Sesión</a></li>
          <li><a href="registro.php">Registrarse</a></li>
        <?php endif; ?>

        <li><a href="contacto.php">Contáctanos</a></li>
      </ul>
    </nav>
    
    <div class="carrito">
      <a id="openCarrito">
        <img src="carrito.png" alt="Carrito">
      </a>
    </div>
  </div>
</header>
