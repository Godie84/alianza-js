<?php
require_once __DIR__ . '/../../config/database.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Methods: PATCH'); // Permite específicamente el método PATCH
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With'); // Headers permitidos

// Manejar la solicitud OPTIONS para pre-vuelo de CORS (si es necesario)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'PATCH') {
    // 1. Obtener el ID del usuario de la URL
    // Como antes, esto es una simplificación; un router sería más robusto.
    $uriSegments = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
    $userId = end($uriSegments);

    // Validar que el ID es un número
    if (!is_numeric($userId)) {
        http_response_code(400);
        echo json_encode(['error' => 'ID de usuario inválido.']);
        exit();
    }

    // 2. Decodificar el JSON enviado en el cuerpo de la solicitud
    $data = json_decode(file_get_contents('php://input'), true);

    // 3. Validar que al menos un campo para actualizar ha sido proporcionado
    if (empty($data)) {
        http_response_code(400);
        echo json_encode(['error' => 'No se proporcionaron datos para actualizar.']);
        exit();
    }

    $setClauses = [];
    $params = [];
    $allowedFields = ['name', 'email', 'password', 'role', 'is_active']; // Define los campos que se pueden actualizar

    foreach ($data as $key => $value) {
        if (in_array($key, $allowedFields)) {
            if ($key === 'password') {
                // Hashear la contraseña si se está actualizando
                if (!empty($value)) {
                    $setClauses[] = "$key = ?";
                    $params[] = password_hash($value, PASSWORD_DEFAULT);
                }
            } elseif ($key === 'is_active') {
                // Asegurar que is_active es un entero
                $setClauses[] = "$key = ?";
                $params[] = (int)$value;
            } else {
                $setClauses[] = "$key = ?";
                $params[] = $value;
            }
        }
    }

    // Si no hay campos válidos para actualizar después del parseo
    if (empty($setClauses)) {
        http_response_code(400);
        echo json_encode(['error' => 'No se proporcionaron campos válidos para actualizar.']);
        exit();
    }

    try {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Primero, verificar si el usuario existe
        $checkStmt = $pdo->prepare('SELECT COUNT(*) FROM users WHERE id = ?');
        $checkStmt->execute([$userId]);
        if ($checkStmt->fetchColumn() == 0) {
            http_response_code(404); // Not Found
            echo json_encode(['error' => 'Usuario no encontrado.']);
            exit();
        }

        // 4. Preparar y ejecutar la consulta de actualización parcial
        $sql = "UPDATE users SET " . implode(', ', $setClauses) . " WHERE id = ?";
        $params[] = $userId; // Añadir el ID al final de los parámetros

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);

        // 5. Verificar si el usuario fue realmente actualizado o si los datos eran idénticos
        if ($stmt->rowCount() > 0) {
            http_response_code(200); // OK
            echo json_encode(['message' => 'Usuario actualizado parcialmente exitosamente.']);
        } else {
            // Si rowCount es 0 y el usuario existe, significa que los datos enviados eran idénticos a los existentes
            http_response_code(200); // OK
            echo json_encode(['message' => 'Usuario encontrado, pero no se realizaron cambios (los datos enviados ya son idénticos).']);
        }

    } catch (PDOException $e) {
        // Manejo de errores específicos, como email duplicado (si el email es UNIQUE)
        if ($e->getCode() == 23000) { // Código SQLSTATE para violación de restricción de integridad
            http_response_code(409); // Conflict
            echo json_encode(['error' => 'El correo electrónico ya existe para otro usuario.']);
        } else {
            http_response_code(500); // Internal Server Error
            echo json_encode(['error' => 'Error al actualizar el usuario: ' . $e->getMessage()]);
        }
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['error' => 'Método no permitido.']);
}
?>