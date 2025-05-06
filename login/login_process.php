<?php
require_once 'conexion.php'; // Asegúrate de tener tu archivo de conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // 1. Validar que los campos no estén vacíos
    if (empty($username) || empty($password)) {
        header('Location: login_form.php?error=1');
        exit();
    }

    // 2. Buscar el usuario en la base de datos por nombre de usuario
    try {
        $stmt = $conexion->prepare("SELECT id, username, password FROM usuarios WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // 3. Verificar si se encontró el usuario y la contraseña es correcta
        if ($usuario && password_verify($password, $usuario['password'])) {
            // ¡Contraseña correcta! Iniciar sesión

            session_start();
            session_regenerate_id(true); // Regenerar ID de sesión después del login

            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['username'] = $usuario['username'];
            $_SESSION['autenticado'] = true; // Marcador de autenticación

            // Redirigir a la página de inicio (cambia 'inicio.php' por tu página principal)
            header('Location: inicio.php');
            exit();
        } else {
            // Nombre de usuario o contraseña incorrectos
            header('Location: login_form.php?error=1');
            exit();
        }

    } catch (PDOException $e) {
        // Manejar errores de base de datos (loggear, mostrar mensaje genérico)
        error_log("Error de base de datos en login_process.php: " . $e->getMessage());
        header('Location: login_form.php?error=1'); // O un mensaje de error más genérico
        exit();
    }

} else {
    // Si se intenta acceder a login_process.php por GET, redirigir al formulario
    header('Location: login_form.php');
    exit();
}
?>