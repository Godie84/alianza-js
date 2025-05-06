<?php
require_once(__DIR__ . '/../conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['txtID'])) {
    $txtID   = $_POST['txtID'];
    $tipo    = $_POST['tipo'];
    $titulo  = $_POST['titulo'];
    $autor   = $_POST['autor'];
    $edicion = $_POST['edicion'];
    $anio    = $_POST['anio'];
    $precio  = $_POST['precio'];
    $stock   = $_POST['stock'];

    try {
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
        $sentencia->bindParam(':id', $txtID);

        $sentencia->execute();

        header("Location: ../administrar.php?mensaje=actualizado");
        exit();
    } catch (PDOException $e) {
        echo "Error al actualizar: " . $e->getMessage();
    }
}
?>
