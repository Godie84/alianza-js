<?php
session_start();
require_once __DIR__ . '/../includes/conexion.php';
require_once __DIR__ . '/../includes/funciones.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = limpiarDatos($_POST["email"]);
    $password = $_POST["password"];

    // Validaciones
    if (empty($email)) {
        $error = "El email es requerido.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "El formato del email no es válido.";
    } elseif (empty($password)) {
        $error = "La contraseña es requerida.";
    }

    if (!isset($error)) {
        $stmt = $conexion->prepare("SELECT id, username, email, password, role_id FROM usuarios WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($password, $usuario['password'])) {
            // Mapeo de role_id a nombre del rol
            $roles_map = [
                1 => 'admin',
                2 => 'usuario',
                3 => 'editor'
            ];
            $rol_nombre = $roles_map[$usuario['role_id']] ?? 'usuario';

            // Guardar sesión
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nombre'] = $usuario['username'];
            $_SESSION['usuario_email'] = $usuario['email'];
            $_SESSION['usuario_rol'] = $rol_nombre;

            // Redirigir al panel (puedes cambiarlo según el rol)
            header("Location: /admin/panel_control.php");
            exit();
        } else {
            $error = "Credenciales incorrectas.";
        }
    }

    // Redirigir con mensaje de error
    header("Location: login.php?error=" . urlencode($error));
    exit();
} else {
    header("Location: login.php");
    exit();
}
