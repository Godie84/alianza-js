<?php
require_once __DIR__ . '/../config/Database.php';// Cambia la ruta según tu estructura de carpetas

try {
    $conn = Database::connect();
    echo "Conexión exitosa a la base de datos.";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}