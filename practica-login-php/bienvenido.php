<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    // Si no hay sesión, redirigir al usuario a la página de login
    header("Location: login.php");
    exit();
}

// Obtener el nombre del usuario de la sesión
$nombreUsuario = $_SESSION['usuario_nombre'];
$emailUsuario = $_SESSION['usuario_email'];
require_once 'cabecera.php';
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h2 class="card-title mb-4">¡Bienvenido, <?php echo htmlspecialchars($nombreUsuario); ?>!. Su email es: <?php echo htmlspecialchars($emailUsuario); ?></h2>
                    <p class="lead">Has iniciado sesión exitosamente.</p>
                    <a href="cerrar_session.php" class="btn btn-danger mt-3">Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once 'footer.php';
?>