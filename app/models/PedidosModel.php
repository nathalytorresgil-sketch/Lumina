<?php
require_once __DIR__ . '/../../config/conexion.php';

class PedidosModel
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public function obtenerUltimosPedidos($limit = 10)
    {
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
            LIMIT ?
        ";

        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            return ["error" => "Error en prepare: " . $this->conn->error];
        }

        $stmt->bind_param("i", $limit);
        $stmt->execute();
        $result = $stmt->get_result();

        $pedidos = [];
        while ($row = $result->fetch_assoc()) {
            $pedidos[] = $row;
        }

        return $pedidos;
    }
}
