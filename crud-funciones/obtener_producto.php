<?php
require_once 'conexion.php';
require_once 'funciones_productos.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $producto = obtenerProductoPorId($conexion, $id);
    header('Content-Type: application/json');
    echo json_encode($producto);
} else {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'ID de producto inválido']);
}
