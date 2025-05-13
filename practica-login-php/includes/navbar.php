<?php
// Incluir el archivo init.php que inicia la sesión y la conexión
require_once __DIR__ . '/../includes/init.php'; 
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Mi Librería</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContenido" aria-controls="navbarContenido" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContenido">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <?php if (isset($_SESSION['usuario_id'])): ?>
          <li class="nav-item">
            <a class="nav-link" href="/usuarios/perfil.php">Mi Perfil</a>
          </li>

          <?php if (isset($_SESSION['usuario_rol']) && $_SESSION['usuario_rol'] === 'admin'): ?>
            <li class="nav-item">
              <a class="nav-link" href="../admin/panel_control.php">Panel Admin</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../admin/libros/administrar_libros.php">Gestionar Productos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../admin/usuarios/administrar_usuarios.php">Gestionar Usuarios</a>
            </li>
          <?php endif; ?>

          <?php if (isset($_SESSION['usuario_rol']) && $_SESSION['usuario_rol'] === 'editor'): ?>
            <li class="nav-item">
              <a class="nav-link" href="/editor/productos.php">Gestionar Productos (Editor)</a>
            </li>
          <?php endif; ?>

          <?php if (isset($_SESSION['usuario_rol']) && $_SESSION['usuario_rol'] === 'usuario'): ?>
            <li class="nav-item">
              <a class="nav-link" href="/usuario/compras.php">Mis Compras</a>
            </li>
          <?php endif; ?>

        <?php endif; ?>
      </ul>

      <ul class="navbar-nav ms-auto">
        <?php if (isset($_SESSION['usuario_id'])): ?>
          <li class="nav-item">
            <span class="navbar-text text-light me-2">
              Bienvenido, <?= htmlspecialchars($_SESSION['usuario_nombre'] ?? 'Usuario'); ?>
            </span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/includes/cerrar_session.php">Cerrar Sesión</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="/login.php">Iniciar Sesión</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/registrar.php">Registrarse</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
