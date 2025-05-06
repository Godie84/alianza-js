<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
    header('Location: login_form.php?error=2'); // Redirigir si no está autenticado
    exit();
}

// Si el usuario ha iniciado sesión, mostrar contenido
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="bg-light py-5">
    <div class="container">
        <div class="card shadow-sm p-4">
            <h1 class="mb-4">Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
            <p class="lead">Has iniciado sesión correctamente.</p>
            <div class="mt-3">
                <a href="logout.php" class="btn btn-warning">Cerrar Sesión</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>