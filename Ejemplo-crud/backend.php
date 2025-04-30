<?php
//Datos que llegan del formulario por el metodo POST
$txtID       = $_POST['txtID'] ?? "";
$tipo        = $_POST['tipo'] ?? "";
$titulo      = $_POST['titulo'] ?? "";
$autor       = $_POST['autor'] ?? "";
$edicion     = $_POST['edicion'] ?? "";
$anio        = $_POST['anio'] ?? "";
$precio      = $_POST['precio'] ?? "";
$stock       = $_POST['stock'] ?? "";
$accion      = $_POST['accion'] ?? "";

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

$accionAgregar = "";
$accionModificar = $accionEliminar = $accionCancelar = "hidden";

$mostrarModal = false;

switch ($accion) {
    case "Registrar":
        $sentencia = $conexion->prepare("INSERT INTO productos (tipo, titulo, autor, edicion, anio, precio, stock) 
                                         VALUES (:tipo, :titulo, :autor, :edicion, :anio, :precio, :stock)");
        $sentencia->bindParam(':tipo', $tipo);
        $sentencia->bindParam(':titulo', $titulo);
        $sentencia->bindParam(':autor', $autor);
        $sentencia->bindParam(':edicion', $edicion);
        $sentencia->bindParam(':anio', $anio);
        $sentencia->bindParam(':precio', $precio);
        $sentencia->bindParam(':stock', $stock);
        $sentencia->execute();
        break;

    case "Actualizar":
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
        break;

    case "btnEliminar":
        $sentencia = $conexion->prepare("DELETE FROM productos WHERE id = :id");
        $sentencia->bindParam(':id', $txtID);
        $sentencia->execute();
        break;
}

//Muestra los datos en la tabla
$sentencia = $conexion->prepare("SELECT id, tipo, titulo, autor, edicion, anio, precio, stock FROM productos WHERE 1");
$sentencia->execute();
$listaLibros = $sentencia->fetchAll(PDO::FETCH_ASSOC);
