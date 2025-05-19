
<?php
require_once __DIR__ . '/../../includes/conexion.php';

$sentencia = $conexion->prepare("SELECT * FROM productos ORDER BY id DESC");
$sentencia->execute();
$listaLibros = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>
