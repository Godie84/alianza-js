<?php
require_once __DIR__ . '/../models/User.php'; // Requiere el modelo User para interactuar con la base de datos.

class AuthController // Controlador para manejar las operaciones de autenticación.
{

    // Método para mostrar el formulario de inicio de sesión.
    public function showLogin() 
    {
        $error = ''; // Declara una variable para almacenar mensajes de error.
        include __DIR__ . '/../views/auth/login.php'; // Incluye la vista del formulario de inicio de sesión.
    }


    // Método para manejar el inicio de sesión.
    public function login()
    {        
        $email = $_POST['email'] ?? ''; // Obtiene el email del formulario, o una cadena vacía si no se envió.
        $password = $_POST['password'] ?? ''; // Obtiene la contraseña del formulario, o una cadena vacía si no se envió.
        $error = ''; // Declara una variable para almacenar mensajes de error.

        if (!$email || !$password) { // Si el email o la contraseña están vacíos
            $error = 'Email y contraseña son requeridos.'; // Asigna un mensaje de error.
            include __DIR__ . '/../views/auth/login.php'; // Incluye la vista del formulario de inicio de sesión con el mensaje de error.
            return; // Termina la ejecución del método si faltan datos.
        }

        $userModel = new User(); // Crea una instancia del modelo User para interactuar con la base de datos.
        $user = $userModel->getByEmail($email); // Busca el usuario por su email en la base de datos.

        if ($user && password_verify($password, $user['password'])) { // Si se encuentra un usuario y la contraseña proporcionada coincide con la almacenada (verificada con password_verify)
            session_start(); // Inicia la sesión para poder almacenar datos del usuario autenticado.
            $_SESSION['user_id'] = $user['id']; // Almacena el ID del usuario en la sesión.
            $_SESSION['user_name'] = $user['name']; // Almacena el nombre del usuario en la sesión.
            
            header("Location: index.php?controller=home&action=index"); // Redirige al usuario a la página de inicio después de un inicio de sesión exitoso.
        } else { // Si no se encuentra un usuario o la contraseña no coincide
            $error = 'Credenciales incorrectas.'; // Asigna un mensaje de error indicando que las credenciales son incorrectas.
            include __DIR__ . '/../views/auth/login.php'; // Incluye la vista del formulario de inicio de sesión con el mensaje de error.
        }
    }

    // Método para manejar el cierre de sesión.
    public function logout()
    {
        session_start();
        session_unset();        // Opcional (limpia variables de sesión)
        session_destroy();      // Elimina la sesión

        if (ini_get("session.use_cookies")) { // Opcional (elimina la cookie de sesión)
            setcookie(session_name(), '', time() - 42000, '/');
        }

        header("Location: index.php?controller=auth&action=showLogin");
        exit;
    }


    // Método para mostrar el formulario de recuperación de contraseña. -----------------------------------------------
    public function forgotPassword()
{
    // Carga la vista que contiene el formulario para solicitar la recuperación de contraseña
    include __DIR__ . '/../views/auth/forgot_password.php';
}


    //Metodo para envio de correo de recuperación de contraseña
    // Método que envía un correo con el enlace de recuperación de contraseña
public function sendResetEmail()
{
    // Obtiene el correo electrónico enviado por POST, o una cadena vacía si no viene
    $email = $_POST['email'] ?? '';

    // Si el correo está vacío, termina el script con un mensaje de error
    if (empty($email)) {
        die("Correo requerido");
    }

    // Instancia el modelo User para interactuar con la base de datos
    $userModel = new User();

    // Busca al usuario por su correo electrónico
    $user = $userModel->getByEmail($email);

    // Si no encuentra al usuario, finaliza el proceso
    if (!$user) {
        die("Usuario no encontrado");
    }

    // Genera un token aleatorio y seguro de 32 caracteres hexadecimales
    $token = bin2hex(random_bytes(16));

    // Establece una hora de expiración del token (1 hora desde ahora)
    $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));

    // Guarda el token y la fecha de expiración en la base de datos del usuario
    $userModel->saveResetToken($user['id'], $token, $expiry);

    // Construye la URL que el usuario usará para restablecer su contraseña
    $resetUrl = "http://localhost/practica_cafeteria_alianza_mvc/public/index.php?controller=auth&action=resetForm&token=$token";

    // Botón estilizado en HTML que enlaza a la URL de restablecimiento
    $resetLink = "
        <a href='$resetUrl' 
           style='display:inline-block;padding:10px 20px;font-size:16px;color:#fff;
                  background-color:#28a745;text-decoration:none;border-radius:5px;'>
           Recuperar contraseña
        </a>
    ";

    // Asunto del correo
    $subject = 'Recuperación de contraseña';

    // Cuerpo HTML del correo, incluyendo saludo y botón de recuperación
    $body = "
        <p>Hola <strong>{$user['name']}</strong>,</p>
        <p>Has solicitado restablecer tu contraseña.</p>
        <p>Haz clic en el siguiente botón para continuar:</p>
        <p>$resetLink</p>
        <p>Este enlace expirará en 1 hora.</p>
    ";

    try {
        // Carga la clase MailService (que usa PHPMailer)
        require_once __DIR__ . '/../src/Services/MailService.php';

        // Instancia el servicio de correo
        $mailer = new MailService();

        // Envía el correo
        $mailer->send($email, $user['name'], $subject, $body);

        // Prepara mensaje de éxito para mostrar al usuario
        $type = "success";
        $message = "Se ha enviado un correo con el enlace de recuperación.";
        $redirectUrl = "index.php?controller=auth&action=showLogin";

    } catch (Exception $e) {
        // En caso de error al enviar el correo, muestra mensaje de error
        $type = "danger";
        $message = "Error al enviar el correo: " . $e->getMessage();
        $redirectUrl = "index.php?controller=auth&action=forgotPassword";
    }

    // Muestra la vista de mensaje genérico con el resultado
    require __DIR__ . '/../views/shared/message.php';
    exit;
}


    // Muestra el formulario para que el usuario introduzca una nueva contraseña
public function resetForm()
{
    // Obtiene el token desde la URL
    $token = $_GET['token'] ?? '';

    // Incluye la vista que muestra el formulario de nueva contraseña
    include __DIR__ . '/../views/auth/reset_password.php';
}


    // Procesa la nueva contraseña enviada por el usuario
public function resetPassword()
{
    // Obtiene el token y la nueva contraseña desde el formulario
    $token = $_POST['token'] ?? '';
    $newPassword = $_POST['new_password'] ?? '';

    // Carga el modelo User
    $userModel = new User();

    // Busca el usuario asociado al token
    $user = $userModel->findByToken($token);

    // Verifica si el token es válido y si aún no ha expirado
    if (!$user || strtotime($user['token_expiry']) < time()) {
        $type = "danger";
        $message = "Token inválido o expirado.";
        $redirectUrl = "index.php?controller=auth&action=showLogin";
        require __DIR__ . '/../views/shared/message.php';
        exit;
    }

    // Hashea la nueva contraseña de forma segura
    $hashed = password_hash($newPassword, PASSWORD_DEFAULT);

    // Actualiza la contraseña del usuario en la base de datos
    $userModel->updatePassword($user['id'], $hashed);

    // Elimina el token de recuperación para que no se pueda volver a usar
    $userModel->clearResetToken($user['id']);

    // Muestra mensaje de éxito al usuario
    $type = "success";
    $message = "Contraseña actualizada correctamente.";
    $redirectUrl = "index.php?controller=auth&action=showLogin";
    require __DIR__ . '/../views/shared/message.php';
    exit;
}

    
}
