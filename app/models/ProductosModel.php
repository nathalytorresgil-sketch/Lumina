<?php
require_once __DIR__ . '/../../config/conexion.php';

class Producto
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public function obtenerTodos()
    {
        $sql = "SELECT * FROM productos";
        $result = $this->conn->query($sql);

        $productos = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $productos[] = $row;
            }
        }

        return $productos;
    }
}
