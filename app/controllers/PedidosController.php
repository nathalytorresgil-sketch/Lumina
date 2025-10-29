<?php
require_once __DIR__ . '/../../app/models/PedidosModel.php';

class PedidosController
{
    public function obtener()
    {
        header('Content-Type: application/json');
        session_start();

        if (!isset($_SESSION['usuario_id'])) {
            echo json_encode(["ok" => false, "msg" => "No logueado"]);
            return;
        }

        $pedidoModel = new PedidosModel();
        $pedidos = $pedidoModel->obtenerUltimosPedidos();

        if (isset($pedidos['error'])) {
            echo json_encode(["ok" => false, "msg" => $pedidos['error']]);
            return;
        }

        echo json_encode(["ok" => true, "data" => $pedidos]);
    }

    public function verificarSesion()
    {
        session_start();
        header('Content-Type: application/json');

        echo json_encode([
            "logueado" => isset($_SESSION['usuario_id'])
        ]);
        exit;
    }

    public function guardar()
    {
        session_start();
        header('Content-Type: application/json');
        global $conn;

        if (!isset($_SESSION['usuario_id'])) {
            echo json_encode(["ok" => false, "msg" => "No logueado"]);
            exit;
        }

        $data = json_decode(file_get_contents("php://input"), true);
        $carrito = $data["carrito"] ?? [];

        if (empty($carrito)) {
            echo json_encode(["ok" => false, "msg" => "Carrito vacío"]);
            exit;
        }

        $usuarioId = $_SESSION['usuario_id'];

        // 1) Calcular total
        $total = 0;
        foreach ($carrito as $item) {
            $total += ((float)$item['precio'] * (int)$item['cantidad']);
        }

        // 2) Insertar pedido
        $sql = "INSERT INTO pedidos (usuario_id, fecha, total, estado) 
                VALUES (?, NOW(), ?, 'Pendiente')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("id", $usuarioId, $total);

        if (!$stmt->execute()) {
            echo json_encode(["ok" => false, "msg" => "Error al crear pedido"]);
            exit;
        }

        $pedidoId = $conn->insert_id;

        // 3) Insertar detalles
        $sqlDetalle = "INSERT INTO pedido_detalles (pedido_id, producto_nombre, precio, cantidad)
                       VALUES (?, ?, ?, ?)";
        $stmtDet = $conn->prepare($sqlDetalle);

        foreach ($carrito as $item) {
            $nombre = $item['nombre'];
            $precio = (float)$item['precio'];
            $cantidad = (int)$item['cantidad'];

            $stmtDet->bind_param("isdi", $pedidoId, $nombre, $precio, $cantidad);
            $stmtDet->execute();
        }

        echo json_encode(["ok" => true, "msg" => "Pedido guardado"]);
        exit;
    }
}
