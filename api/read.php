<?php
require 'db.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

try {
    $stmt = $pdo->query('SELECT * FROM posts ORDER BY id DESC');
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($posts);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Error al obtener los posts: ' . $e->getMessage()]);
}
?>
