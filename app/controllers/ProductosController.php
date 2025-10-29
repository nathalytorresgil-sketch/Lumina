<?php
require_once __DIR__ . '/../../app/models/ProductosModel.php';

class ProductosController
{
    public function index()
    {
        require __DIR__ . '/../../app/views/home/productos.php';
    }

    public function obtener()
    {
        header('Content-Type: application/json');
        $productosModel = new Producto();
        $productos = $productosModel->obtenerTodos();
        echo json_encode(["ok"=>true, "data"=>$productos]);
    }

}
