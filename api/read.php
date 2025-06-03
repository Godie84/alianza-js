<?php
require 'db.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: text/html; charset=UTF-8');

try {
    $stmt = $pdo->query('SELECT * FROM posts ORDER BY id DESC');
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($posts)) {
        echo "<p>No hay posts disponibles.</p>";
    } else {
        foreach ($posts as $post) {
            echo "<div class='mb-3 p-3 border rounded'>";
            echo "<h5>" . htmlspecialchars($post['title']) . "</h5>";
            echo "<p>" . nl2br(htmlspecialchars($post['body'])) . "</p>";
            echo "<small><strong>ID:</strong> " . $post['id'] . " | <strong>Usuario:</strong> " . $post['userId'] . "</small>";
            echo "</div>";
        }
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo "Error al obtener los posts: " . $e->getMessage();
}
?>
