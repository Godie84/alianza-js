<?php
// Datos que llegan del formulario por el método POST
// $txtID       = $_POST['txtID'] ?? "";
// $tipo        = $_POST['tipo'] ?? "";
// $titulo      = $_POST['titulo'] ?? "";
// $autor       = $_POST['autor'] ?? "";
// $edicion     = $_POST['edicion'] ?? "";
// $anio        = $_POST['anio'] ?? "";
// $precio      = $_POST['precio'] ?? "";
// $stock       = $_POST['stock'] ?? "";
// $imagen      = $_POST['imagen'] ?? "";
// $accion      = $_POST['accion'] ?? "";

// print_r($_POST);

// $mostrarModal = false;

// switch ($accion) {
//     case "Registrar":
//         print_r($_FILES);
//         $nombreImagen = ""; // Inicializa el nombre

//         // Procesar la imagen primero
//         if (isset($_FILES["imagen"]["name"]) && $_FILES["imagen"]["name"] != "") {
//             $nombreArchivo = $_FILES["imagen"]["name"];
//             $fecha = new DateTime();
//             $nombreImagen = $fecha->getTimestamp() . "_" . $nombreArchivo;
//             $tmpImagen = $_FILES["imagen"]["tmp_name"];

//             $rutaDestino = "img/";
//             if (!is_dir($rutaDestino)) {
//                 mkdir($rutaDestino, 0777, true);
//             }

//             if (move_uploaded_file($tmpImagen, $rutaDestino . $nombreImagen)) {
//                 echo "Imagen subida correctamente a " . $rutaDestino . $nombreImagen;
//             } else {
//                 echo "Error al mover el archivo. Verifica permisos o ruta.";
//             }
//         }

//         // Sntencia con los valores que se envian a la base de datos por medio de los datos que recibe
//         $sentencia = $conexion->prepare("INSERT INTO productos (tipo, titulo, autor, edicion, anio, precio, stock, imagen) 
//                                          VALUES (:tipo, :titulo, :autor, :edicion, :anio, :precio, :stock, :imagen)");
//         $sentencia->bindParam(':tipo', $tipo);
//         $sentencia->bindParam(':titulo', $titulo);
//         $sentencia->bindParam(':autor', $autor);
//         $sentencia->bindParam(':edicion', $edicion);
//         $sentencia->bindParam(':anio', $anio);
//         $sentencia->bindParam(':precio', $precio);
//         $sentencia->bindParam(':stock', $stock);
//         $sentencia->bindParam(':imagen', $nombreImagen);

//         $sentencia->execute();

//         header("Location: registrar.php?mensaje=registrado");
//         exit();
//         break;


//     case "Actualizar":
//         $sentencia = $conexion->prepare("UPDATE productos 
//                                          SET tipo = :tipo, titulo = :titulo, autor = :autor, edicion = :edicion, anio = :anio, precio = :precio, stock = :stock 
//                                          WHERE id = :id");
//         $sentencia->bindParam(':tipo', $tipo);
//         $sentencia->bindParam(':titulo', $titulo);
//         $sentencia->bindParam(':autor', $autor);
//         $sentencia->bindParam(':edicion', $edicion);
//         $sentencia->bindParam(':anio', $anio);
//         $sentencia->bindParam(':precio', $precio);
//         $sentencia->bindParam(':stock', $stock);
//         $sentencia->bindParam(':id', $txtID);
//         $sentencia->execute();

//         header("Location: registrar.php?mensaje=actualizado");
//         exit();
//         break;

//     case "btnEliminar":
//         try {
//             echo "Eliminando producto con ID: $txtID"; // Esto te ayudará a saber si se está ejecutando este bloque
//             $sentencia = $conexion->prepare("DELETE FROM productos WHERE id = :id");
//             $sentencia->bindParam(':id', $txtID);
//             $sentencia->execute();

//             header("Location: registrar.php?mensaje=eliminado");
//             exit();
//         } catch (PDOException $e) {
//             echo "Error: " . $e->getMessage();
//         }
//         break;
// }

// // Muestra los datos en la tabla
// $sentencia = $conexion->prepare("SELECT id, tipo, titulo, autor, edicion, anio, precio, stock FROM productos WHERE 1");
// $sentencia->execute();
// $listaLibros = $sentencia->fetchAll(PDO::FETCH_ASSOC);
