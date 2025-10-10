<?php 
include 'conexion.php'; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Productos - Ilumina</title>
  <link rel="stylesheet" href="estilos.css?v=1.1">
</head>
<body>

<?php include 'header.php'; ?>

<section class="productos">
  <h1>Nuestros Productos</h1>
  <div class="contenedor-productos">
    <?php
    $sql = "SELECT * FROM productos";
    $result = $conn->query($sql);

    if (isset($_SESSION['usuario_id'])) {
      echo "
        <div class='tarjeta-producto'>
            <a href='agregar_productos.php' style='text-decoration:none; color:inherit; display:block; text-align:center; padding:20px;'>
              <img src='icono_agregar.png' alt='Agregar Producto' style='width:80px; opacity:0.7;'>
              <h3>Agregar Producto</h3>
              <p>Haz clic aquí para añadir un nuevo producto</p>
            </a>
          </div>
        ";
    }

    if ($result->num_rows > 0) {
      while ($producto = $result->fetch_assoc()) {
        echo "
          <div class='tarjeta-producto'>
            <img src='{$producto['imagen']}' alt='{$producto['nombre']}'>
            <h3>{$producto['nombre']}</h3>
            <p>{$producto['descripcion']}</p>
            <div class='precio-boton'>
              <span>\${$producto['precio']}</span>
              <button>Agregar</button>
            </div>
        ";

        if (isset($_SESSION['usuario_id'])) {
            echo "
            <div class='acciones'>
              <a href='actualizar_producto.php?id={$producto['id']}' class='boton-editar'>Editar</a>
              <a href='eliminar_producto.php?id={$producto['id']}' 
                 class='boton-eliminar' 
                 onclick=\"return confirm('¿Estás seguro de eliminar este producto?');\">
                 Eliminar
              </a>
            </div>
            ";
        }

        echo "</div>";
      }
    } else {
      echo "<p>No hay productos disponibles en este momento.</p>";
    }
    ?>
  </div>
</section>
<div id="carritoSidebar" class="carrito-sidebar oculto">
  <div class="carrito-header">
    <h2>Tu Carrito</h2>
    <button id="cerrarCarrito">&times;</button>
  </div>
  <div id="carritoProductos" class="carrito-contenido">
    <p id="carritoVacio">Tu carrito está vacío, ¡anímate a comprar!</p>
  </div>
  <div class="carrito-footer">
    <div>
      <strong>Total:</strong> <span id="carritoTotal">$0</span>
    </div>
    <button id="pagarBtn">Proceder al Pago</button>
  </div>
  <script>
document.getElementById('pagarBtn').addEventListener('click', () => {
  fetch('verificar_sesion.php')
    .then(res => res.json())
    .then(data => {
      if (!data.logueado) {
        alert("Primero inicia sesión para continuar con el pago.");
        window.location.href = "login.php"; // redirigir al login
      } else {
        // Aquí enviamos el carrito al servidor
        fetch("guardar_pedido.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json"
          },
          body: JSON.stringify({ carrito })
        })
        .then(res => res.json())
        .then(resp => {
          if (resp.ok) {
            alert("✅ Pedido guardado correctamente. ¡Gracias por tu compra!");
            carrito = {}; // vaciar carrito
            actualizarCarrito();
          } else {
            alert("❌ Error al guardar el pedido.");
          }
        });
      }
    });
});
</script>


</div>
<script>
const carritoSidebar = document.getElementById('carritoSidebar');
const carritoBtn = document.getElementById('openCarrito');
const cerrarCarrito = document.getElementById('cerrarCarrito');
const carritoProductos = document.getElementById('carritoProductos');
const carritoTotal = document.getElementById('carritoTotal');
const carritoVacio = document.getElementById('carritoVacio');

let carrito = {};

carritoBtn.addEventListener('click', (e) => {
  e.preventDefault();
  carritoSidebar.classList.add('visible');
});

cerrarCarrito.addEventListener('click', () => {
  carritoSidebar.classList.remove('visible');
});

function actualizarCarrito() {
  carritoProductos.innerHTML = '';
  let total = 0;
  let hayProductos = false;

  for (let id in carrito) {
    hayProductos = true;
    const producto = carrito[id];
    total += producto.precio * producto.cantidad;

    const div = document.createElement('div');
    div.classList.add('producto-carrito');
    div.innerHTML = `
      <img src="${producto.imagen}" width="50">
      <div>
        <strong>${producto.nombre}</strong><br>
        <span style="color:#f82693;">$${producto.precio}</span>
      </div>
      <div class="controles-cantidad">
        <button onclick="cambiarCantidad('${id}', -1)">-</button>
        <span>${producto.cantidad}</span>
        <button onclick="cambiarCantidad('${id}', 1)">+</button>
      </div>
      <button onclick="eliminarProducto('${id}')" style="color:red;">🗑️</button>
    `;
    carritoProductos.appendChild(div);
  }

  carritoVacio.style.display = hayProductos ? 'none' : 'block';
  carritoTotal.textContent = `$${total}`;
}

function cambiarCantidad(id, cambio) {
  carrito[id].cantidad += cambio;
  if (carrito[id].cantidad <= 0) delete carrito[id];
  actualizarCarrito();
}

function eliminarProducto(id) {
  delete carrito[id];
  actualizarCarrito();
}

function agregarAlCarrito(nombre, precio, imagen) {
  const id = nombre.toLowerCase().replace(/\s/g, '-');
  if (carrito[id]) {
    carrito[id].cantidad++;
  } else {
    carrito[id] = {
      nombre,
      precio,
      imagen,
      cantidad: 1
    };
  }
  actualizarCarrito();
  carritoSidebar.classList.add('visible');
}

// Agrega evento a los botones "Agregar"
document.querySelectorAll('.tarjeta-producto button').forEach(btn => {
  btn.addEventListener('click', (e) => {
    const card = e.target.closest('.tarjeta-producto');
    const nombre = card.querySelector('h3').innerText;
    const precio = parseFloat(card.querySelector('span').innerText.replace('$', ''));
    const imagen = card.querySelector('img').src;
    agregarAlCarrito(nombre, precio, imagen);
  });
});
</script>

</body>
<?php include 'footer.php'; ?>
</html>