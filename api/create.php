<?php
require 'db.php'; // Conexión a la base de datos

header('Access-Control-Allow-Origin: *');// Permitir solicitudes desde cualquier origen
header('Content-Type: application/json; charset=UTF-8');// Establecer el tipo de contenido a JSON

// Solo se permite el método POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Método no permitido
    echo json_encode(['error' => 'Método no permitido']);
    exit;
}

// Obtener el cuerpo de la solicitud (JSON)
$input = json_decode(file_get_contents('php://input'), true);

// Validar que existan los datos necesarios
if (!isset($input['title'], $input['body'], $input['userId'])) {
    http_response_code(400); // Solicitud incorrecta
    echo json_encode(['error' => 'Faltan campos requeridos']);
    exit;
}
// Extraer los valores del array recibido
$title = $input['title'];
$body = $input['body'];
$userId = $input['userId'];

try {
    // Preparar una sentencia SQL para insertar un nuevo post en la base de datos
    $stmt = $pdo->prepare('INSERT INTO posts (title, body, userId) VALUES (:title, :body, :userId)');
    // Ejecutar la sentencia con los datos recibidos
    $stmt->execute([
        'title' => $title,
        'body' => $body,
        'userId' => $userId
    ]);

    // Obtener el ID del nuevo post insertado
    $id = $pdo->lastInsertId();
    // Enviar una respuesta JSON con mensaje de éxito y el ID creado
    echo json_encode([
        'message' => 'Post creado exitosamente',
        'postId' => $id
    ]);
} catch (PDOException $e) {
    // Si ocurre un error al interactuar con la base de datos, devolver error 500
    http_response_code(500);// Error interno del servidor
    echo json_encode(['error' => 'Error en el servidor: ' . $e->getMessage()]);// Mensaje de error con detalles
}
?>
