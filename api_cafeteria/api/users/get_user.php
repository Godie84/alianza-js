<?php
require_once __DIR__ . '/../../config/database.php';

header('Access-Control-Allow-Origin: *');// Permite solicitudes desde cualquier origen
header('Content-Type: application/json; charset=UTF-8');// Establece el tipo de contenido a JSON
header('Access-Control-Allow-Methods: GET'); // Permite específicamente el método GET
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With'); // Encabezados permitidos

// Manejar las solicitudes OPTIONS para el pre-vuelo de CORS (si es necesario)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // 1. Obtener el ID del usuario de la URL
    // Asumiendo que la URL es algo como /api/users/123 donde 123 es el ID.
    // En una aplicación real, usarías un sistema de enrutamiento para extraer este ID.
    $uriSegments = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
    $userId = end($uriSegments); // El último segmento de la URI debería ser el ID

    // Validar que el ID es un número
    if (!is_numeric($userId)) {
        http_response_code(400); // Bad Request (Solicitud Incorrecta)
        echo json_encode(['error' => 'ID de usuario inválido.']);
        exit();
    }

    try {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // 2. Preparar y ejecutar la consulta para seleccionar un solo usuario
        // ¡Importante! Excluimos el campo 'password' por razones de seguridad.
        $stmt = $pdo->prepare('SELECT id, name, email, role, is_active FROM users WHERE id = ? LIMIT 1');
        $stmt->execute([$userId]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC); // Obtiene el único registro como un array asociativo

        // 3. Verificar si el usuario fue encontrado
        if ($user) {
            http_response_code(200); // OK
            echo json_encode($user); // Retorna los datos del usuario en formato JSON
        } else {
            http_response_code(404); // Not Found (No Encontrado)
            echo json_encode(['error' => 'Usuario no encontrado.']);
        }

    } catch (PDOException $e) {
        http_response_code(500); // Internal Server Error (Error Interno del Servidor)
        echo json_encode(['error' => 'Error al obtener el usuario: ' . $e->getMessage()]);
    }
} else {
    http_response_code(405); // Method Not Allowed (Método No Permitido)
    echo json_encode(['error' => 'Método no permitido.']);
}
?>