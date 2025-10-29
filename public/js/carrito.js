document.getElementById('pagarBtn').addEventListener('click', () => {
  fetch('/ilumina/public/pedidos/verificarSesion')
    .then(res => res.json())
    .then(data => {
      if (!data.logueado) {
        alert("Primero inicia sesión para continuar con el pago.");
        window.location.href = "login.php"; // redirigir al login
      } else {
        // Aquí enviamos el carrito al servidor
        fetch("/ilumina/public/pedidos/guardar", {
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
document.addEventListener('DOMContentLoaded', () => {

    document.querySelectorAll('.tarjeta-producto button').forEach(btn => {
      btn.addEventListener('click', (e) => {
        const card = e.target.closest('.tarjeta-producto');
        const nombre = card.querySelector('h3').innerText;
        const precio = parseFloat(card.querySelector('span').innerText.replace('$', ''));
        const imagen = card.querySelector('img').src;
        agregarAlCarrito(nombre, precio, imagen);
      });
    });

});
