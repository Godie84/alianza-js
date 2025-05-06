<?php
require_once 'conexion.php';

function obtenerProductos($conexion)
{
    $sentencia = $conexion->prepare("SELECT id, tipo, titulo, autor, edicion, anio, precio, stock, imagen FROM productos");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
}

function obtenerProductoPorId($conexion, $id)
{
    $sentencia = $conexion->prepare("SELECT id, tipo, titulo, autor, edicion, anio, precio, stock, imagen FROM productos WHERE id = :id");
    $sentencia->bindParam(':id', $id);
    $sentencia->execute();
    return $sentencia->fetch(PDO::FETCH_ASSOC);
}

function crearProducto($conexion, $tipo, $titulo, $autor, $edicion, $anio, $precio, $stock, $imagen)
{
    $sentencia = $conexion->prepare("INSERT INTO productos (tipo, titulo, autor, edicion, anio, precio, stock, imagen)
                                     VALUES (:tipo, :titulo, :autor, :edicion, :anio, :precio, :stock, :imagen)");
    $sentencia->bindParam(':tipo', $tipo);
    $sentencia->bindParam(':titulo', $titulo);
    $sentencia->bindParam(':autor', $autor);
    $sentencia->bindParam(':edicion', $edicion);
    $sentencia->bindParam(':anio', $anio);
    $sentencia->bindParam(':precio', $precio);
    $sentencia->bindParam(':stock', $stock);
    $sentencia->bindParam(':imagen', $imagen);
    return $sentencia->execute();
}

function actualizarProducto($conexion, $id, $tipo, $titulo, $autor, $edicion, $anio, $precio, $stock)
{
    $sentencia = $conexion->prepare("UPDATE productos
                                     SET tipo = :tipo, titulo = :titulo, autor = :autor, edicion = :edicion, anio = :anio, precio = :precio, stock = :stock
                                     WHERE id = :id");
    $sentencia->bindParam(':tipo', $tipo);
    $sentencia->bindParam(':titulo', $titulo);
    $sentencia->bindParam(':autor', $autor);
    $sentencia->bindParam(':edicion', $edicion);
    $sentencia->bindParam(':anio', $anio);
    $sentencia->bindParam(':precio', $precio);
    $sentencia->bindParam(':stock', $stock);
    $sentencia->bindParam(':id', $id);
    return $sentencia->execute();
}

function actualizarImagenProducto($conexion, $id, $imagen)
{
    $sentencia = $conexion->prepare("UPDATE productos SET imagen = :imagen WHERE id = :id");
    $sentencia->bindParam(':imagen', $imagen);
    $sentencia->bindParam(':id', $id);
    return $sentencia->execute();
}

function eliminarProducto($conexion, $id)
{
    $sentencia = $conexion->prepare("DELETE FROM productos WHERE id = :id");
    $sentencia->bindParam(':id', $id);
    return $sentencia->execute();
}
