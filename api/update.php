<?php
require 'db.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo "Método no permitido";
    exit;
}

if (!isset($_POST['id'], $_POST['title'], $_POST['body'], $_POST['userId'])) {
    http_response_code(400);
    echo "Faltan datos requeridos";
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

    echo "Post actualizado exitosamente";
} catch (PDOException $e) {
    http_response_code(500);
    echo "Error del servidor: " . $e->getMessage();
}
?>
