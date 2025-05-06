<?php
require_once(__DIR__ . '/../conexion.php');

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

// Verifica si se sube una imagen
if (!empty($_FILES["imagen"]["name"])) {
    $nombreArchivo = basename($_FILES["imagen"]["name"]);
    $fecha = new DateTime();
    $nombreImagen = $fecha->getTimestamp() . "_" . $nombreArchivo;

    $tmpImagen = $_FILES["imagen"]["tmp_name"];
    $rutaDestino = "../img/";

    // Crear la carpeta si no existe
    if (!is_dir($rutaDestino)) {
        mkdir($rutaDestino, 0777, true);
    }

    // Mover el archivo subido
    if (move_uploaded_file($tmpImagen, $rutaDestino . $nombreImagen)) {
        // Definir la ruta absoluta, incluyendo la carpeta 'img' en la ruta de la base de datos
        $rutaImagen = "img/" . $nombreImagen;  // Aquí se incluye 'img/' antes del nombre de la imagen
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
$sentencia->bindParam(':imagen', $nombreImagen); // Solo el nombre del archivo
$sentencia->bindParam(':ruta', $rutaImagen);     // Ruta relativa que ahora incluye 'img/'

$sentencia->execute();

// Redirigir con mensaje
header("Location: ../registrar.php?mensaje=registrado");
exit;
