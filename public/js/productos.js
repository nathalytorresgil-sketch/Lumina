document.addEventListener("DOMContentLoaded", () => {
    cargarProductos();
});

function cargarProductos() {
    fetch("/ilumina/public/productos/obtener")
        .then(res => res.json())
        .then(resp => {
            const contenedor = document.getElementById("lista-productos");
            contenedor.innerHTML = "";

            if (!resp.ok || resp.data.length === 0) {
                contenedor.innerHTML = "<p>No hay productos disponibles.</p>";
                return;
            }

            resp.data.forEach(p => {
                const div = document.createElement("div");
                div.classList.add("tarjeta-producto");
                div.innerHTML = `
                    <img src="${p.imagen}" alt="${p.nombre}">
                    <h3>${p.nombre}</h3>
                    <p>${p.descripcion}</p>
                    <div class='precio-boton'>
                      <span>$${p.precio}</span>
                      <button>Agregar</button>
                    </div>
                `;
                contenedor.appendChild(div);
            });
        })
        .catch(err => {
            console.error("Error cargando productos:", err);
            document.getElementById("lista-productos").innerHTML =
                "<p>Error al cargar los productos.</p>";
        });
}
