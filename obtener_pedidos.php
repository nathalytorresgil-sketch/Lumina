<?php
session_start();
include 'conexion.php';
header('Content-Type: application/json');

if (!isset($_SESSION['usuario_id'])) {
    echo json_encode(["ok" => false, "msg" => "No logueado"]);
    exit;
}

$sql = "
SELECT 
    p.id AS pedido_id,
    u.nombre,
    u.apellido,
    p.fecha,
    p.total,
    p.estado,
    d.producto_nombre
FROM pedidos p
INNER JOIN usuarios u ON p.usuario_id = u.id
INNER JOIN pedido_detalles d ON d.pedido_id = p.id
GROUP BY p.id
ORDER BY p.fecha DESC
LIMIT 10
";

$result = $conn->query($sql);

if (!$result) {
    echo json_encode(["ok" => false, "msg" => 'Error en la consulta: ' . $conn->error]);
    exit;
}

$pedidos = [];
while ($row = $result->fetch_assoc()) {
    $pedidos[] = $row;
}

echo json_encode(["ok" => true, "data" => $pedidos]);
