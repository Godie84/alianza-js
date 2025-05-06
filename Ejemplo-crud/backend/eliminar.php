<?php
require_once(__DIR__ . '/../conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['txtID'])) {
    $txtID = $_POST['txtID'];

    try {
        $sentencia = $conexion->prepare("DELETE FROM productos WHERE id = :id");
        $sentencia->bindParam(':id', $txtID);
        $sentencia->execute();

        header("Location: ../administrar.php?mensaje=eliminado");
        exit();
    } catch (PDOException $e) {
        echo "Error al eliminar: " . $e->getMessage();
    }
}
?>
