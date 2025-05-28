<?php
/*
 * El archivo index.php es el punto de entrada de la aplicación.
 * Aquí se manejan las solicitudes HTTP y se dirigen a los controladores correspondientes.
*/

$controller = $_GET['controller'] ?? 'auth';// Obtiene el controlador de la URL, por defecto 'user'.
$action = $_GET['action'] ?? 'showLogin';// Obtiene la acción de la URL, por defecto 'index'.

$controllerClass = ucfirst($controller) . "Controller";// Convierte el nombre del controlador a formato de clase (ej. 'user' a 'UserController').
$controllerFile = __DIR__ . "/../controllers/{$controllerClass}.php";// Construye la ruta del archivo del controlador.

if (!file_exists($controllerFile)) {// Verifica si el archivo del controlador existe.
    die("Error: El controlador '$controllerClass' no existe.");// Si no existe, muestra un mensaje de error.
}

require_once $controllerFile;// Requiere el archivo del controlador.

if (!class_exists($controllerClass)) {// Verifica si la clase del controlador existe.
    die("Error: La clase '$controllerClass' no está definida.");// Si no existe, muestra un mensaje de error.
}

$controllerInstance = new $controllerClass();// Crea una instancia de la clase del controlador.

if ($_SERVER['REQUEST_METHOD'] === 'POST') {// Verifica si la solicitud es de tipo POST.
    if (isset($_GET['id'])) {// Si se proporciona un ID en la URL
        $controllerInstance->$action($_GET['id'], ...array_values($_POST));// Llama al método del controlador con el ID y los datos del formulario.
    } else {// Si no se proporciona un ID
        $controllerInstance->$action(...array_values($_POST));// Llama al método del controlador con los datos del formulario.
    }
} else {// Si la solicitud no es de tipo POST
    if (isset($_GET['id'])) {// Si se proporciona un ID en la URL
        $controllerInstance->$action($_GET['id']);// Llama al método del controlador con el ID.
    } else {// Si no se proporciona un ID
        $controllerInstance->$action();// Llama al método del controlador sin parámetros.
    }
}