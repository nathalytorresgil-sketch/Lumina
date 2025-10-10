<?php
session_start();
header('Content-Type: application/json');
include 'conexion.php'; 

if (!isset($_SESSION['usuario_id'])) {
    echo json_encode(["ok" => false, "msg" => "No logueado"]);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);
$carrito = $data["carrito"];
$idUsuario = $_SESSION['usuario_id'];

// Insertar pedido
$sql = "INSERT INTO pedidos (usuario_id, fecha) VALUES ($idUsuario, NOW())";
if ($conn->query($sql)) {
    $pedidoId = $conn->insert_id;

    foreach ($carrito as $item) {
        $nombre = $conn->real_escape_string($item['nombre']);
        $precio = (int)$item['precio'];
        $cantidad = (int)$item['cantidad'];

        $conn->query("INSERT INTO pedido_detalles (pedido_id, producto_nombre, precio, cantidad)
                      VALUES ($pedidoId, '$nombre', $precio, $cantidad)");
    }

    echo json_encode(["ok" => true]);
} else {
    echo json_encode(["ok" => false, "msg" => $conn->error]);
}
