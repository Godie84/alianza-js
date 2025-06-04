<?php
require 'db.php';// Asegúrate de que este archivo contiene la conexión a la base de datos

header('Access-Control-Allow-Origin: *');// Permitir solicitudes desde cualquier origen
header('Content-Type: application/json; charset=UTF-8');// Establecer el tipo de contenido a JSON

try {
    $stmt = $pdo->query('SELECT * FROM posts ORDER BY id DESC');// Preparar la consulta SQL para obtener todos los posts ordenados por ID de forma descendente
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);// Ejecutar la consulta y obtener todos los resultados como un array asociativo

    echo json_encode($posts);// Convertir el array de posts a formato JSON y enviarlo como respuesta
} catch (PDOException $e) {// Capturar cualquier excepción de PDO
    http_response_code(500);// Establecer el código de respuesta HTTP a 500 (Error interno del servidor)
    echo json_encode(['error' => 'Error al obtener los posts: ' . $e->getMessage()]);// Enviar un mensaje de error en formato JSON
}
?>
