<?php
// Configuración de conexión
$servidor = "localhost";
$usuario = "root";
$password = "";
$baseDeDatos = "libreria";
$charset = "utf8mb4";

// DSN (Data Source Name)
$dsn = "mysql:host=$servidor;dbname=$baseDeDatos;charset=$charset";

try {
    // Crear la conexión PDO
    $conexion = new PDO($dsn, $usuario, $password);

    // Configurar el modo de errores como excepciones
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Puedes dejar esto comentado para producción
    // echo "Conexión exitosa a la base de datos '$baseDeDatos'.";

} catch (PDOException $e) {
    // Mostrar error en desarrollo (mejor registrar en producción)
    die("Error de conexión: " . $e->getMessage());
}
