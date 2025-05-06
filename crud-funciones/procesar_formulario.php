<?php
require_once 'conexion.php';
require_once 'funciones_productos.php';

$txtID = $_POST['txtID'] ?? "";
$tipo = $_POST['tipo'] ?? "";
$titulo = $_POST['titulo'] ?? "";
$autor = $_POST['autor'] ?? "";
$edicion = $_POST['edicion'] ?? "";
$anio = $_POST['anio'] ?? "";
$precio = $_POST['precio'] ?? "";
$stock = $_POST['stock'] ?? "";
$imagen = $_FILES['imagen'] ?? null;
$accion = $_POST['accion'] ?? "";
$imagenActual = $_POST['imagenActual'] ?? "";

switch ($accion) {
    case "Registrar":
        $nombreImagen = "";
        if ($imagen && $imagen['name'] != "") {
            $nombreArchivo = $imagen["name"];
            $fecha = new DateTime();
            $nombreImagen = $fecha->getTimestamp() . "_" . $nombreArchivo;
            $tmpImagen = $imagen["tmp_name"];
            $rutaDestino = "img/";
            if (!is_dir($rutaDestino)) {
                mkdir($rutaDestino, 0777, true);
            }
            if (move_uploaded_file($tmpImagen, $rutaDestino . $nombreImagen)) {
                echo "Imagen subida correctamente a " . $rutaDestino . $nombreImagen . "<br>";
            } else {
                echo "Error al mover el archivo. Verifica permisos o ruta.<br>";
                $nombreImagen = ""; // En caso de error, no guardar nombre de imagen
            }
        }
        if (crearProducto($conexion, $tipo, $titulo, $autor, $edicion, $anio, $precio, $stock, $nombreImagen)) {
            header("Location: index.php?mensaje=registrado");
            exit();
        } else {
            echo "Error al registrar el producto.";
        }
        break;

    case "Actualizar":
        if (actualizarProducto($conexion, $txtID, $tipo, $titulo, $autor, $edicion, $anio, $precio, $stock)) {
            // Procesar la nueva imagen si se subió una
            if ($imagen && $imagen['name'] != "") {
                $nombreArchivo = $imagen["name"];
                $fecha = new DateTime();
                $nombreNuevaImagen = $fecha->getTimestamp() . "_" . $nombreArchivo;
                $tmpImagen = $imagen["tmp_name"];
                $rutaDestino = "img/";
                if (!is_dir($rutaDestino)) {
                    mkdir($rutaDestino, 0777, true);
                }
                if (move_uploaded_file($tmpImagen, $rutaDestino . $nombreNuevaImagen)) {
                    echo "Nueva imagen subida correctamente.<br>";
                    // Actualizar el nombre de la imagen en la base de datos
                    actualizarImagenProducto($conexion, $txtID, $nombreNuevaImagen);
                    // Eliminar la imagen anterior si existe
                    if ($imagenActual && file_exists("img/" . $imagenActual)) {
                        unlink("img/" . $imagenActual);
                        echo "Imagen anterior eliminada.<br>";
                    }
                } else {
                    echo "Error al mover la nueva imagen.<br>";
                }
            }
            header("Location: index.php?mensaje=actualizado");
            exit();
        } else {
            echo "Error al actualizar el producto.";
        }
        break;
}
