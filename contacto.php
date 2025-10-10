<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Contáctanos - Ilumina</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<style>
  
.carrito-lateral {
  position: fixed;
  top: 0;
  right: 0;
  width: 350px;
  height: 100%;
  background: #fff;
  box-shadow: -2px 0 10px rgba(0, 0, 0, 0.2);
  padding: 20px;
  z-index: 1000;
  transform: translateX(100%);
  transition: transform 0.3s ease-in-out;
}

.carrito-lateral.visible {
  transform: translateX(0);
}

.carrito-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.carrito-contenido {
  flex: 1;
  overflow-y: auto;
  padding: 10px 0;
  min-height: 200px;
}

.carrito-vacio {
  text-align: center;
  color: #555;
}

.carrito-footer {
  padding-top: 10px;
  font-size: 1.2em;
}

#totalCarrito {
  float: right;
  font-weight: bold;
  color: #ec008c;
}

.btn-pago {
  background-color: #ec008c;
  color: white;
  width: 100%;
  padding: 12px;
  font-weight: bold;
  border: none;
  border-radius: 20px;
  cursor: pointer;
}

.icono-carrito {
  width: 30px;
  height: 30px;
  cursor: pointer;
}


.carrito-sidebar {
  position: fixed;
  right: 0;
  top: 0;
  width: 350px;
  height: 100%;
  background-color: white;
  box-shadow: -2px 0 8px rgba(0,0,0,0.2);
  transform: translateX(100%);
  transition: transform 0.3s ease;
  z-index: 1000;
  padding: 20px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.carrito-sidebar.visible {
  transform: translateX(0%);
}

.carrito-header {
  display: flex;
  justify-content: space-between;
  border-bottom: 1px solid #000;
  margin-bottom: 10px;
}

.carrito-contenido {
  flex-grow: 1;
  overflow-y: auto;
}

.carrito-footer {
  border-top: 1px solid #000;
  padding-top: 10px;
  text-align: center;
}

#pagarBtn {
  background-color: #f82693;
  color: white;
  padding: 10px 20px;
  border: none;
  width: 100%;
  border-radius: 25px;
  font-weight: bold;
}

.producto-carrito {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 10px;
  margin: 10px 0;
  border-radius: 10px;
  padding: 10px;
  background: #f9f9f9;
}

.controles-cantidad {
  display: flex;
  gap: 5px;
}

.controles-cantidad button {
  padding: 5px;
}

.nueva-coleccion {
  text-align: center;
  padding: 50px 20px;
}

.nueva-coleccion h2 {
  font-size: 2rem;
  margin-bottom: 30px;
  color: #1f1f1f;
}

.grid-coleccion {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 20px;
  max-width: 1100px;
  margin: 0 auto;
}

.card-producto,
.card-imagen {
  background: #fff;
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
  transition: transform 0.2s ease;
}

.card-producto:hover,
.card-imagen:hover {
  transform: translateY(-5px);
}

.card-producto img,
.card-imagen img {
  width: 100%;
  height: auto;
  border-radius: 8px;
  margin-bottom: 10px;
}

.card-producto h3 {
  margin: 10px 0 5px;
  font-size: 1.1rem;
}

.card-producto p {
  font-size: 0.9rem;
  color: #444;
}

  </style>
<body>

<?php include 'header.php'; ?>

<section class="contacto">
  <div class="formulario-contacto">
    <h2>Contáctanos</h2>
    <p>¿Tienes alguna pregunta o comentario? ¡Nos encantaría escucharte!</p>

    <form action="https://formsubmit.co/angientorresg@juandelcorral.edu.co" method="POST">
      <label for="nombre">Nombre</label>
      <input type="text" id="nombre" name="nombre" placeholder="Tu nombre completo" required>

      <label for="correo">Correo Electrónico</label>
      <input type="email" id="correo" name="correo" placeholder="tu.correo@ejemplo.com" required>

      <label for="mensaje">Mensaje</label>
      <textarea id="mensaje" name="mensaje" rows="4" placeholder="Escribe tu mensaje aquí..." required></textarea>

      <button type="submit">Enviar Mensaje</button>
    </form>
  </div>
</section>

</body>
<?php include 'footer.php'; ?>
</html>
