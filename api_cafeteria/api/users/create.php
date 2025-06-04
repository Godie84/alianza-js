<?php
require_once __DIR__ . '/../../config/database.php';

header('Access-Control-Allow-Origin: *'); // Permite solicitudes desde cualquier origen
header('Content-Type: application/json; charset=UTF-8'); // Establece el tipo de contenido a JSON

// Verifica si la solicitud es un método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);// Decodifica el JSON recibido en el cuerpo de la solicitud y lo convierte en un array asociativo

    // Verifica que los campos obligatorios no estén vacíos
    if (
        !isset($data['name'], $data['email'], $data['password'], $data['role']) ||
        empty($data['name']) || empty($data['email']) || empty($data['password']) || empty($data['role']) 
    ) {
        http_response_code(400); // Bad Request
        echo json_encode(['error' => 'Faltan campos obligatorios.']); // Responde con un error 400 si faltan campos obligatorios
        exit();
    }

    $name = $data['name']; // Obtiene el nombre del usuario desde los datos decodificados
    $email = $data['email']; // Obtiene el correo electrónico del usuario desde los datos decodificados
    // Hashea la contraseña antes de guardarla. ¡Es fundamental para la seguridad!
    $password = password_hash($data['password'], PASSWORD_DEFAULT);
    $role = $data['role'];
    // Establece un valor predeterminado para 'is_active' si no se proporciona
    $is_active = isset($data['is_active']) ? (int)$data['is_active'] : 1;

    try {
        $pdo = Database::connect();
        // Configura PDO para que lance excepciones en caso de errores
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configura el modo de error de PDO para lanzar excepciones

        // Prepara la consulta SQL para insertar un nuevo usuario
        $stmt = $pdo->prepare('INSERT INTO users (name, email, password, role, is_active) VALUES (?, ?, ?, ?, ?)');
        // Ejecuta la consulta con los datos validados
        $stmt->execute([$name, $email, $password, $role, $is_active]);

        // Obtiene el ID del último usuario insertado
        $userId = $pdo->lastInsertId();

        http_response_code(201); // Created (indica que el recurso fue creado exitosamente)
        echo json_encode(['message' => 'Usuario creado exitosamente.', 'id' => $userId]);
    } catch (PDOException $e) {
        // Ejemplo de manejo de error para email duplicado
        if ($e->getCode() == 23000) { // Código SQLSTATE común para violación de restricción de integridad
            http_response_code(409); // Conflict (indica que la solicitud no pudo ser completada debido a un conflicto con el estado actual del recurso)
            echo json_encode(['error' => 'El correo electrónico ya existe.']);
        } else {
            http_response_code(500); // Internal Server Error
            echo json_encode(['error' => 'Error al crear el usuario: ' . $e->getMessage()]);
        }
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['error' => 'Método no permitido.']); // Responde con un error 405 si el método no es POST
}
