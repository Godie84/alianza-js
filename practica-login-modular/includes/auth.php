<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Verifica que el usuario haya iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    header("Location: /alianza-php/practica-login-php/login.php");
    exit();
}

// Verificar un solo rol
function verificarRol($rol_requerido) {
    if (!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] !== $rol_requerido) {
        echo "Acceso denegado. No tienes permiso para ver esta página.";
        exit();
    }
}

// Verificar múltiples roles
function verificarRoles($roles_permitidos = []) {
    if (!isset($_SESSION['usuario_rol']) || !in_array($_SESSION['usuario_rol'], $roles_permitidos)) {
        echo "Acceso denegado. No tienes permiso para ver esta página.";
        exit();
    }
}

//Funcion que limpia los campos del formulario antes de ser procesado
function limpiarDatos($data)
{
    $data = trim($data);//quietar espacios
    $data = stripslashes($data);//Quita caracteres como /
    $data = htmlspecialchars($data);//convierte caracteres especiales a texto plano
    return $data;
}

?>
