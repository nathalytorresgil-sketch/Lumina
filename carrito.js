document.addEventListener("DOMContentLoaded", () => {
  const iconoCarrito = document.getElementById("icono-carrito");
  const carrito = document.getElementById("carrito");
  const cerrarCarrito = document.getElementById("cerrar-carrito");
  const botonesAgregar = document.querySelectorAll(".agregar-carrito");
  const contenedorItems = document.getElementById("carrito-items");
  const total = document.getElementById("total");

  let carritoItems = [];

  iconoCarrito && iconoCarrito.addEventListener("click", () => {
    carrito.classList.add("activo");
  });

  cerrarCarrito.addEventListener("click", () => {
    carrito.classList.remove("activo");
  });

  botonesAgregar.forEach(boton => {
    boton.addEventListener("click", () => {
      const nombre = boton.dataset.nombre;
      const precio = parseFloat(boton.dataset.precio);
      const imagen = boton.dataset.imagen;

      const existente = carritoItems.find(item => item.nombre === nombre);
      if (existente) {
        existente.cantidad += 1;
      } else {
        carritoItems.push({ nombre, precio, imagen, cantidad: 1 });
      }

      renderizarCarrito();
    });
  });

  function renderizarCarrito() {
    contenedorItems.innerHTML = "";

    if (carritoItems.length === 0) {
      contenedorItems.innerHTML = "<p class='carrito-vacio'>Tu carrito está vacío, ¡anímate a comprar!</p>";
      total.textContent = "$0.00";
      return;
    }

    carritoItems.forEach((item, index) => {
      const div = document.createElement("div");
      div.innerHTML = `
        <div style="display:flex; align-items:center; margin-bottom:10px;">
          <img src="${item.imagen}" alt="${item.nombre}" style="width:40px; margin-right:10px;">
          <div style="flex:1;">
            <strong>${item.nombre}</strong><br>
            <span>Cantidad: 
              <button onclick="cambiarCantidad(${index}, -1)">-</button> 
              ${item.cantidad} 
              <button onclick="cambiarCantidad(${index}, 1)">+</button>
            </span>
            <br>
            <span>Subtotal: $${(item.precio * item.cantidad).toFixed(2)}</span>
          </div>
          <button onclick="eliminarItem(${index})" style="margin-left:10px;">❌</button>
        </div>
      `;
      contenedorItems.appendChild(div);
    });

    const totalValor = carritoItems.reduce((acc, item) => acc + item.precio * item.cantidad, 0);
    total.textContent = `$${totalValor.toFixed(2)}`;
  }

  window.cambiarCantidad = function(index, cambio) {
    carritoItems[index].cantidad += cambio;
    if (carritoItems[index].cantidad <= 0) {
      carritoItems.splice(index, 1);
    }
    renderizarCarrito();
  }

  window.eliminarItem = function(index) {
    carritoItems.splice(index, 1);
    renderizarCarrito();
  }
});
