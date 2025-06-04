<?php
require_once __DIR__ . '/../../config/database.php';

header('Access-Control-Allow-Origin: *');// Permite solicitudes desde cualquier origen
header('Content-Type: application/json; charset=UTF-8');// Establece el tipo de contenido a JSON
header('Access-Control-Allow-Methods: DELETE'); // Permite específicamente el método DELETE
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');// Headers permitidos
//content-type: permite que el cliente envíe el tipo de contenido (como application/json, necesario para enviar JSON).
//Access-Control-Allow-Headers: permite que el cliente envíe headers personalizados (como Authorization, X-Requested-With, etc.) en la solicitud. Pero es redundante si no estás usando headers personalizados.
//Authorization: permite que el cliente envíe un token de autorización (como un JWT) en la solicitud. Esto es útil si estás implementando autenticación y autorización.
//// X-Requested-With: permite que el cliente envíe un header personalizado para indicar que la solicitud es AJAX. Esto es útil si estás implementando lógica específica para solicitudes AJAX.

// Manejar la solicitud OPTIONS para pre-vuelo de CORS (si es necesario)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // 1. Obtener el ID del usuario de la URL
    // Asumiendo que la URL será algo como /api/users/123 donde 123 es el ID
    // Como mencionamos antes, necesitarás un sistema de ruteo robusto para esto.
    $uriSegments = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
    $userId = end($uriSegments); // El último segmento de la URI podría ser el ID

    // Validar que el ID es un número
    if (!is_numeric($userId)) {
        http_response_code(400);
        echo json_encode(['error' => 'ID de usuario inválido.']);
        exit();
    }

    try {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // 2. Preparar y ejecutar la consulta de eliminación
        $stmt = $pdo->prepare('DELETE FROM users WHERE id = ?');
        $stmt->execute([$userId]);

        // 3. Verificar si se eliminó algún registro
        if ($stmt->rowCount() > 0) {
            http_response_code(204); // No Content (Éxito, pero no hay contenido que devolver)
            // No se recomienda enviar cuerpo con 204.
            // echo json_encode(['message' => 'Usuario eliminado exitosamente.']);
        } else {
            // Si rowCount es 0, significa que el ID no existía
            http_response_code(404); // Not Found
            echo json_encode(['error' => 'Usuario no encontrado.']);
        }

    } catch (PDOException $e) {
        http_response_code(500); // Internal Server Error
        echo json_encode(['error' => 'Error al eliminar el usuario: ' . $e->getMessage()]);
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['error' => 'Método no permitido.']);
}
?>