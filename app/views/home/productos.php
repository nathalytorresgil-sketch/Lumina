<?php ob_start(); ?>

<div class="carrito">
    <a id="openCarrito">
      <ion-icon name="cart-outline"></ion-icon>
    </a>
</div>

<div id="carritoSidebar" class="carrito-sidebar">
  <div class="carrito-header">
    <h2>Mi Carrito</h2>
    <button id="cerrarCarrito">X</button>
</div>

<div id="carritoProductos"></div>
<p id="carritoVacio">Tu carrito está vacío</p>

<div class="carrito-footer">
    <strong>Total: <span id="carritoTotal">$0</span></strong>
    <button id="pagarBtn" class="btn-pagar">Pagar</button>
  </div>
</div>  

<section class="productos">
  <h1>Nuestros Productos</h1>
  <div class="contenedor-productos" id="lista-productos">
  </div>
</section>

<script src="../public/js/productos.js"></script>
<script src="../public/js/carrito.js"></script>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<?php $contenido = ob_get_clean(); ?>
<?php require __DIR__ . '/../layout.php'; ?>
