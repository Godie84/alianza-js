<?php
require_once __DIR__ . '/../../config/database.php';

header('Access-Control-Allow-Origin: *'); // Permite solicitudes desde cualquier origen (CORS)
header('Content-Type: application/json; charset=UTF-8'); // Indica que la respuesta será JSON en formato UTF-8
header('Access-Control-Allow-Methods: GET'); // Permite explícitamente el método GET
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With'); // Especifica los encabezados permitidos en las solicitudes

// Manejar las solicitudes OPTIONS (pre-vuelo de CORS), si el navegador las envía
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $pdo = Database::connect(); // Llama al método estático para obtener la conexión PDO
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configura PDO para que lance excepciones en caso de errores SQL

        // Consulta la tabla "users" (no "usuarios" como en tu ejemplo original, asumiendo que es "users")
        // Selecciona solo los campos necesarios, ¡excluyendo la contraseña!
        $stmt = $pdo->query('SELECT id, name, email, role, is_active FROM users ORDER BY id DESC');
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtiene todos los registros como un array asociativo

        http_response_code(200); // Código de estado HTTP 200 OK
        echo json_encode($users); // Retorna los resultados en formato JSON
    } catch (PDOException $e) {
        http_response_code(500); // Error de servidor (Internal Server Error)
        echo json_encode(['error' => 'Error al obtener los usuarios: ' . $e->getMessage()]);
    }
} else {
    http_response_code(405); // Método No Permitido (Method Not Allowed)
    echo json_encode(['error' => 'Método no permitido.']);
}
?>