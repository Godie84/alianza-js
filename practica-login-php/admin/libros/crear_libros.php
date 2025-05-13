<?php
require_once(__DIR__ . '../../../includes/conexion.php');

// Recibir datos del formulario
$tipo    = $_POST['tipo'] ?? "";
$titulo  = $_POST['titulo'] ?? "";
$autor   = $_POST['autor'] ?? "";
$edicion = $_POST['edicion'] ?? "";
$anio    = $_POST['anio'] ?? "";
$precio  = $_POST['precio'] ?? "";
$stock   = $_POST['stock'] ?? "";

// Procesamiento de imagen
$nombreImagen = "";
$rutaImagen = "";

if (!empty($_FILES["imagen"]["name"])) {
    $nombreArchivo = basename($_FILES["imagen"]["name"]);
    $fecha = new DateTime();
    $nombreImagen = $fecha->getTimestamp() . "_" . $nombreArchivo;

    $tmpImagen = $_FILES["imagen"]["tmp_name"];
    $rutaDestino = realpath(__DIR__ . '/../../public/img');

    if ($rutaDestino && is_writable($rutaDestino)) {
        $rutaFinal = $rutaDestino . '/' . $nombreImagen;
        if (move_uploaded_file($tmpImagen, $rutaFinal)) {
            $rutaImagen = "img/" . $nombreImagen; // Ruta relativa para acceso desde el navegador
        }
    }
}

// Insertar en base de datos
$sentencia = $conexion->prepare("INSERT INTO productos (tipo, titulo, autor, edicion, anio, precio, stock, imagen, ruta)
                                 VALUES (:tipo, :titulo, :autor, :edicion, :anio, :precio, :stock, :imagen, :ruta)");

$sentencia->bindParam(':tipo', $tipo);
$sentencia->bindParam(':titulo', $titulo);
$sentencia->bindParam(':autor', $autor);
$sentencia->bindParam(':edicion', $edicion);
$sentencia->bindParam(':anio', $anio);
$sentencia->bindParam(':precio', $precio);
$sentencia->bindParam(':stock', $stock);
$sentencia->bindParam(':imagen', $nombreImagen);
$sentencia->bindParam(':ruta', $rutaImagen);

$sentencia->execute();

// Redirigir con mensaje
header("Location: registrar_libros.php?mensaje=registrado");
exit;
