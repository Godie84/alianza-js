<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        /* Establece un color de fondo gris claro para el cuerpo de la página. */
        body { background-color: #f8f9fa; }
        /* Estilos para el contenedor principal del formulario. */
        .container {
            /* Establece un ancho máximo de 500 píxeles. */
            max-width: 500px;
            /* Centra el contenedor horizontalmente en la página con márgenes automáticos. */
            margin: 50px auto;
            /* Añade un relleno interno de 20 píxeles. */
            padding: 20px;
            /* Establece un color de fondo blanco. */
            background-color: #fff;
            /* Aplica bordes redondeados de 8 píxeles. */
            border-radius: 8px;
            /* Añade una ligera sombra para destacar el contenedor. */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        /* Estilos para los mensajes de error. */
        .error { color: red; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4 text-center">Registro de Nuevo Usuario</h2>
        <?php
        // Verifica si existe el parámetro 'error' en la URL (indicando un error en el procesamiento).
        if (isset($_GET['error'])) {
            // Inicializa una variable para almacenar el mensaje de error.
            $errorMessage = '';
            // Comprueba el valor del parámetro 'error' para determinar el mensaje específico.
            if ($_GET['error'] == 1) {
                $errorMessage = 'Todos los campos son obligatorios.';
            } elseif ($_GET['error'] == 2) {
                $errorMessage = 'Las contraseñas no coinciden.';
            } elseif ($_GET['error'] == 3) {
                $errorMessage = 'El nombre de usuario ya existe.';
            } elseif ($_GET['error'] == 4) {
                $errorMessage = 'Error al registrar el usuario. Inténtalo de nuevo.';
            }
            // Muestra el mensaje de error dentro de un div con estilos de alerta de Bootstrap.
            // htmlspecialchars() se usa para prevenir posibles ataques XSS.
            echo '<div class="alert alert-danger" role="alert">' . htmlspecialchars($errorMessage) . '</div>';
        // Verifica si existe el parámetro 'success' en la URL (indicando un registro exitoso).
        } elseif (isset($_GET['success'])) {
            // Muestra un mensaje de éxito dentro de un div con estilos de alerta de Bootstrap,
            // incluyendo un enlace para ir a la página de inicio de sesión.
            echo '<div class="alert alert-success" role="alert">Registro completado con éxito. <a href="login_form.php">Iniciar Sesión</a></div>';
        }
        ?>
        <form action="register_process.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Nombre de Usuario:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <small class="form-text text-muted">La contraseña debe tener al menos 8 caracteres.</small>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirmar Contraseña:</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
            <div class="mt-3 text-center">
                ¿Ya tienes una cuenta? <a href="login_form.php">Iniciar Sesión</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>