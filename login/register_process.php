<?php
// Incluye el archivo que contiene la conexión a la base de datos.
require_once 'conexion.php';

// Verifica si la petición al script se realizó mediante el método POST.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtiene el valor del campo 'username' del formulario POST.
    // Si no existe, asigna una cadena vacía.
    $username = $_POST['username'] ?? '';
    // Obtiene el valor del campo 'email' del formulario POST.
    // Si no existe, asigna una cadena vacía.
    $email = $_POST['email'] ?? '';
    // Obtiene el valor del campo 'password' del formulario POST.
    // Si no existe, asigna una cadena vacía.
    $password = $_POST['password'] ?? '';
    // Obtiene el valor del campo 'confirm_password' del formulario POST.
    // Si no existe, asigna una cadena vacía.
    $confirm_password = $_POST['confirm_password'] ?? '';

    // 1. Validar que los campos no estén vacíos
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        // Si algún campo está vacío, redirige al formulario de registro
        // con un parámetro 'error' igual a 1 para mostrar un mensaje.
        header('Location: register_form.php?error=1');
        // Detiene la ejecución del script.
        exit();
    }

    // 2. Verificar si las contraseñas coinciden
    if ($password !== $confirm_password) {
        // Si las contraseñas no coinciden, redirige al formulario de registro
        // con un parámetro 'error' igual a 2 para mostrar un mensaje.
        header('Location: register_form.php?error=2');
        // Detiene la ejecución del script.
        exit();
    }

    // 3. Verificar la longitud de la contraseña (mínimo 8 caracteres)
    if (strlen($password) < 8) {
        // Si la longitud de la contraseña es menor a 8, redirige al formulario de registro
        // con un parámetro 'error' igual a 2 (podrías crear un código de error específico).
        header('Location: register_form.php?error=2');
        // Detiene la ejecución del script.
        exit();
    }

    // 4. Verificar si el nombre de usuario ya existe en la base de datos
    try {
        // Prepara una consulta SQL para contar cuántos usuarios existen con el nombre de usuario proporcionado.
        $stmt = $conexion->prepare("SELECT COUNT(*) FROM usuarios WHERE username = :username");
        // Vincula el valor de la variable $username al marcador de posición ':username' en la consulta.
        $stmt->bindParam(':username', $username);
        // Ejecuta la consulta preparada.
        $stmt->execute();
        // Obtiene el resultado de la consulta (la cantidad de usuarios con ese nombre).
        $count = $stmt->fetchColumn();

        // Si se encontró al menos un usuario con ese nombre de usuario.
        if ($count > 0) {
            // Redirige al formulario de registro con un parámetro 'error' igual a 3
            // para mostrar un mensaje de que el nombre de usuario ya existe.
            header('Location: register_form.php?error=3');
            // Detiene la ejecución del script.
            exit();
        }

        // 5. Hashear la contraseña de forma segura
        // Utiliza la función password_hash() para crear un hash seguro de la contraseña.
        // PASSWORD_DEFAULT utiliza un algoritmo bcrypt, que es seguro y se actualiza con el tiempo.
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // 6. Insertar el nuevo usuario en la base de datos
        // Prepara una consulta SQL para insertar un nuevo usuario en la tabla 'usuarios'.
        $stmt = $conexion->prepare("INSERT INTO usuarios (username, email, password) VALUES (:username, :email, :password)");
        // Vincula el valor de la variable $username al marcador de posición ':username'.
        $stmt->bindParam(':username', $username);
        // Vincula el valor de la variable $email al marcador de posición ':email'.
        $stmt->bindParam(':email', $email);
        // Vincula el valor de la variable $hashed_password al marcador de posición ':password'.
        $stmt->bindParam(':password', $hashed_password);

        // Ejecuta la consulta de inserción.
        if ($stmt->execute()) {
            // Si la inserción fue exitosa, redirige al formulario de registro
            // con un parámetro 'success' igual a 1 para mostrar un mensaje de éxito.
            header('Location: register_form.php?success=1');
            // Detiene la ejecución del script.
            exit();
        } else {
            // Si la inserción falló, redirige al formulario de registro
            // con un parámetro 'error' igual a 4 para mostrar un mensaje de error genérico.
            header('Location: register_form.php?error=4');
            // Detiene la ejecución del script.
            exit();
        }

    } catch (PDOException $e) {
        // Captura cualquier excepción PDO (error de base de datos).
        // Registra el error en el log del servidor.
        error_log("Error de base de datos en register_process.php: " . $e->getMessage());
        // Redirige al formulario de registro con un parámetro 'error' igual a 4
        // para mostrar un mensaje de error genérico al usuario.
        header('Location: register_form.php?error=4');
        // Detiene la ejecución del script.
        exit();
    }

} else {
    // Si se intenta acceder a register_process.php mediante un método diferente a POST (ej: GET),
    // redirige al formulario de registro.
    header('Location: register_form.php');
    // Detiene la ejecución del script.
    exit();
}
?>