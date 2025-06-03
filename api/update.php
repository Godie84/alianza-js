<?php
require 'db.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Método no permitido']);
    exit;
}

if (!isset($_POST['id'], $_POST['title'], $_POST['body'], $_POST['userId'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Faltan campos requeridos']);
    exit;
}

$id = $_POST['id'];
$title = $_POST['title'];
$body = $_POST['body'];
$userId = $_POST['userId'];

try {
    $stmt = $pdo->prepare('UPDATE posts SET title = :title, body = :body, userId = :userId WHERE id = :id');
    $stmt->execute([
        'id' => $id,
        'title' => $title,
        'body' => $body,
        'userId' => $userId
    ]);
    echo json_encode(['message' => 'Post actualizado exitosamente']);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Error en el servidor: ' . $e->getMessage()]);
}
?>
