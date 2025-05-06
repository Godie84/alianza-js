<?php
// Inicia la sesión o reanuda la sesión actual.
session_start();

// Destruye todas las variables de sesión. Esto elimina los datos de la sesión actual.
$_SESSION = array();

// Si se está utilizando cookies para mantener la sesión, también es necesario eliminar la cookie de sesión.
// Esto asegura que el navegador del usuario también olvide el ID de sesión.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalmente, destruye la sesión en el servidor. Esto elimina el archivo de sesión.
session_destroy();

// Redirige al usuario a la página de inicio de sesión después de cerrar la sesión.
header('Location: login_form.php');
// Asegura que el script se detenga después de la redirección.
exit();
?>