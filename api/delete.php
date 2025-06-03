<?php
require 'db.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo "Método no permitido";
    exit;
}

if (!isset($_POST['id'])) {
    http_response_code(400);
    echo "Falta el ID del post";
    exit;
}

$id = $_POST['id'];

try {
    $stmt = $pdo->prepare('DELETE FROM posts WHERE id = :id');
    $stmt->execute(['id' => $id]);

    echo "Post eliminado exitosamente";
} catch (PDOException $e) {
    http_response_code(500);
    echo "Error del servidor: " . $e->getMessage();
}
?>
