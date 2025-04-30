<?php
// Datos de conexión (puedes cambiar estos valores según tu configuración)
$servidor = "localhost";      // Dirección del servidor MySQL
$usuario = "root";            // Usuario de la base de datos
$password = "";               // Contraseña del usuario
$baseDeDatos = "Album";       // Nombre de la base de datos

try {
    // Intentamos crear una nueva conexión usando PDO
    $conexion = new PDO("mysql:host=$servidor;dbname=$baseDeDatos", $usuario, $password); //Esta línea establece una conexión a la base de 
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Aqui se le indica a PDO cómo debe manejar los errores cuando algo 

    echo "Conexión exitosa a la base de datos '$baseDeDatos'.";
} catch (PDOException $e) {
    // Si hay un error en la conexión, lo capturamos aquí
    echo "Error de conexión: " . $e->getMessage();
}
