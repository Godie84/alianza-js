<?php
session_start(); // Iniciar la sesión al principio del script
require 'conexion.php';
// Función para limpiar los datos de entrada (reutilizar la de registrar.php)
require_once 'funciones.php';

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir y limpiar los datos del formulario
    $email = limpiarDatos($_POST["email"]);
    $password = $_POST["password"];

    // Validaciones básicas
    if (empty($email)) {
        $error = "El email es requerido.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "El formato del email no es válido.";
    } elseif (empty($password)) {
        $error = "La contraseña es requerida.";
    }

    // Si no hay errores de validación
    if (!isset($error)) {
        // Consultar la base de datos para obtener el usuario con el email ingresado
        $stmt = $conexion->prepare("SELECT id, username, password FROM usuarios WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar si se encontró un usuario con ese email
        if ($usuario) {
            // Verificar la contraseña ingresada con el hash almacenado
            if (password_verify($password, $usuario['password'])) {
                // La contraseña es correcta, iniciar sesión
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nombre'] = $usuario['username'];
                $_SESSION['usuario_email'] = $usuario['email'];

                // Redirigir al usuario a la página de bienvenida
                header("Location: bienvenido.php");
                exit();
            } else {
                // Contraseña incorrecta, mostrar error
                $error = "Contraseña incorrecta.";
            }
        } else {
            // No se encontró ningún usuario con ese email
            $error = "El email ingresado no está registrado.";
        }
    }

    // Si hubo un error, redirigir de vuelta al formulario de login con el mensaje de error
    if (isset($error)) {
        header("Location: login.php?error=" . urlencode($error));
        exit();
    }
} else {
    // Si se intenta acceder a este archivo directamente sin enviar el formulario
    header("Location: login.php");
    exit();
}
