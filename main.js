// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};

document.addEventListener("DOMContentLoaded", () => {
  cargarPedidos();
});

function cargarPedidos() {
  fetch("obtener_pedidos.php")
    .then(res => res.json())
    .then(data => {
      const tbody = document.getElementById("tabla-pedidos");
      tbody.innerHTML = "";

      if (data.ok && data.data.length > 0) {
        data.data.forEach(pedido => {
          let estadoClass = "";
          switch (pedido.estado) {
            case "Entregado": estadoClass = "status delivered"; break;
            case "Pendiente": estadoClass = "status pending"; break;
            case "Cancelado": estadoClass = "status return"; break;
          }

          const fila = document.createElement("tr");
          fila.innerHTML = `
            <td>${pedido.nombre} ${pedido.apellido}</td>
            <td>${pedido.producto_nombre}</td>
            <td>$${Number(pedido.total).toLocaleString('es-CO')}</td>
            <td>${new Date(pedido.fecha).toLocaleString()}</td>
            <td><span class="${estadoClass}">${pedido.estado}</span></td>
          `;
          tbody.appendChild(fila);
        });
      } else {
        tbody.innerHTML = "<tr><td colspan='5'>No hay pedidos recientes</td></tr>";
      }
    })
    .catch(err => {
      console.error("Error al cargar pedidos:", err);
      document.getElementById("tabla-pedidos").innerHTML = "<tr><td colspan='5'>Error al cargar pedidos</td></tr>";
    });
}

