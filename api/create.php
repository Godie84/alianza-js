<?php
require 'db.php';// Asegúrate de que este archivo contiene la conexión a la base de datos

header('Access-Control-Allow-Origin: *');// Permitir solicitudes desde cualquier origen
header('Content-Type: application/json; charset=UTF-8');// Establecer el tipo de contenido a JSON

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {// Verificar que el método de solicitud sea POST
    http_response_code(405);// Establecer el código de respuesta HTTP a 405 (Método no permitido)
    echo json_encode(['error' => 'Método no permitido']);// Enviar un mensaje de error en formato JSON
    exit;// Terminar la ejecución del script
}

if (!isset($_POST['title'], $_POST['body'], $_POST['userId'])) {// Verificar que se hayan enviado los campos requeridos
    http_response_code(400);// Establecer el código de respuesta HTTP a 400 (Solicitud incorrecta)
    echo json_encode(['error' => 'Faltan campos requeridos']);// Enviar un mensaje de error en formato JSON
    exit;// Terminar la ejecución del script
}

$title = $_POST['title'];// Obtener el título del post desde los datos enviados
$body = $_POST['body'];// Obtener el contenido del post desde los datos enviados
$userId = $_POST['userId'];// Obtener el ID del usuario desde los datos enviados

try {// Intentar insertar el nuevo post en la base de datos
    $stmt = $pdo->prepare('INSERT INTO posts (title, body, userId) VALUES (:title, :body, :userId)');// Preparar la consulta SQL para insertar un nuevo post
    $stmt->execute([// Ejecutar la consulta con los datos proporcionados
        'title' => $title,// Asignar el título del post
        'body' => $body,// Asignar el contenido del post
        'userId' => $userId// Asignar el ID del usuario
    ]);
    $id = $pdo->lastInsertId();// Obtener el ID del último post insertado
    echo json_encode([// Enviar una respuesta JSON con un mensaje de éxito y el ID del nuevo post
        'message' => 'Post creado exitosamente',// Mensaje de éxito
        'postId' => $id// ID del nuevo post
    ]);// Terminar la ejecución del script
} catch (PDOException $e) {// Capturar cualquier excepción de PDO
    http_response_code(500);// Establecer el código de respuesta HTTP a 500 (Error interno del servidor)
    echo json_encode(['error' => 'Error en el servidor: ' . $e->getMessage()]);// Enviar un mensaje de error en formato JSON
}
?>