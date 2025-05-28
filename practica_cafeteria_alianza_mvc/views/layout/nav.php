<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuNavbar">
            <?php if (isset($_SESSION['user_id'])): ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=user&action=index">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=auth&action=logout">Cerrar sesion</a>
                    </li>
                    <!-- Agrega más enlaces según tus controladores -->
                </ul>
            <?php endif; ?>

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">,
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <span class="navbar-text me-2 text-white">
                            Bienvenido, <?= htmlspecialchars($_SESSION['user_name']) ?>
                        </span>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light btn-sm" href="index.php?controller=auth&action=logout">
                            Cerrar sesión
                        </a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="btn btn-outline-light btn-sm" href="index.php?controller=auth&action=showLogin">
                            Iniciar sesión
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">