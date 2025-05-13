<?php
// Iniciar sesión solo si aún no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Definir una constante de base para construir URLs fácilmente
define('BASE_URL', '/alianza-php/practica-login-php');

// Configuración de zona horaria
date_default_timezone_set('America/Bogota');

// Incluir los componentes esenciales del sistema
require_once __DIR__ . '/auth.php';       // Verifica si el usuario está logueado y define funciones de roles
require_once __DIR__ . '/conexion.php';         // Conexión a la base de datos con PDO
//require_once __DIR__ . '/funciones.php';  // Funciones útiles como limpiarDatos(), redireccionar(), etc.
