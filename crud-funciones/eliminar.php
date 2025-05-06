<?php
require_once 'conexion.php';
require_once 'funciones_productos.php';

$id = $_GET['id'] ?? "";

if ($id) {
    // Obtener el nombre de la imagen antes de eliminar el registro
    $producto = obtenerProductoPorId($conexion, $id);
    $nombreImagenAEliminar = $producto['imagen'];

    if (eliminarProducto($conexion, $id)) {
        // Eliminar la imagen del directorio si existe
        if ($nombreImagenAEliminar && file_exists("img/" . $nombreImagenAEliminar)) {
            unlink("img/" . $nombreImagenAEliminar);
        }
        header("Location: index.php?mensaje=eliminado");
        exit();
    } else {
        echo "Error al eliminar el producto.";
    }
} else {
    echo "ID de producto no proporcionado.";
}
