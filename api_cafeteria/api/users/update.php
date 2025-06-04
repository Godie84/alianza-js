<?php
require_once __DIR__ . '/../../config/database.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Methods: PUT'); // Permite específicamente el método PUT
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With'); // Headers permitidos

// Manejar la solicitud OPTIONS para pre-vuelo de CORS (si es necesario)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // 1. Obtener el ID del usuario de la URL
    // Asumiendo que la URL será algo como /api/users/123 donde 123 es el ID
    // Necesitas configurar tu servidor web (Apache/Nginx) para reescribir URLs
    // o analizar PATH_INFO si usas un archivo único como router.
    // Para simplificar aquí, asumimos que el ID viene como un parámetro GET o que lo parses de alguna manera.
    // Un método más robusto sería:
    $uriSegments = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
    $userId = end($uriSegments); // El último segmento de la URI podría ser el ID

    // Validar que el ID es un número
    if (!is_numeric($userId)) {
        http_response_code(400);
        echo json_encode(['error' => 'ID de usuario inválido.']);
        exit();
    }

    // 2. Decodificar el JSON enviado en el cuerpo de la solicitud
    $data = json_decode(file_get_contents('php://input'), true);

    // 3. Validar los datos de entrada
    // Para un PUT, se espera que todos los campos sean enviados para una actualización completa.
    // Puedes ajustar esta validación según si permites actualizaciones parciales.
    if (
        !isset($data['name'], $data['email'], $data['role'], $data['is_active']) ||
        empty($data['name']) || empty($data['email']) || empty($data['role'])
    ) {
        http_response_code(400); // Bad Request
        echo json_encode(['error' => 'Faltan campos obligatorios para la actualización completa.']);
        exit();
    }

    $name = $data['name'];
    $email = $data['email'];
    $role = $data['role'];
    $is_active = (int)$data['is_active']; // Asegúrate de que sea un entero

    // Opcional: Si también se permite actualizar la contraseña.
    // Si la contraseña viene en la solicitud, hashearla.
    $password_update_sql = '';
    $password_params = [];
    if (isset($data['password']) && !empty($data['password'])) {
        $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);
        $password_update_sql = ', password = ?';
        $password_params = [$hashed_password];
    }

    try {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // 4. Preparar y ejecutar la consulta de actualización
        $sql = "UPDATE users SET name = ?, email = ?, role = ?, is_active = ?" . $password_update_sql . " WHERE id = ?";
        $params = array_merge([$name, $email, $role, $is_active], $password_params, [$userId]);

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);

        // 5. Verificar si el usuario fue realmente actualizado
        if ($stmt->rowCount() > 0) {
            http_response_code(200); // OK
            echo json_encode(['message' => 'Usuario actualizado exitosamente.']);
        } else {
            // Si rowCount es 0, podría ser que el ID no exista o que los datos enviados sean idénticos a los existentes
            // En un caso real, querrías verificar si el ID existe primero.
            $checkStmt = $pdo->prepare('SELECT COUNT(*) FROM users WHERE id = ?');
            $checkStmt->execute([$userId]);
            if ($checkStmt->fetchColumn() == 0) {
                http_response_code(404); // Not Found
                echo json_encode(['error' => 'Usuario no encontrado.']);
            } else {
                http_response_code(200); // OK (porque no hubo cambio pero la solicitud fue "exitosa")
                echo json_encode(['message' => 'Usuario encontrado, pero no se realizaron cambios (los datos son idénticos).']);
            }
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