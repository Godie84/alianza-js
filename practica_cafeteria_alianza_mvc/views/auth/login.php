<?php require_once __DIR__ . '/../layout/header.php'; ?>

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow-lg border-0" style="width: 100%; max-width: 400px;">
        <h2 class="mb-4 text-center">Iniciar Sesión</h2>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <form action="index.php?controller=auth&action=login" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>

            <div class="text-center mt-3">
                <a href="index.php?controller=auth&action=forgotPassword" class="btn btn-link p-0">
                    ¿Olvidaste tu contraseña?
                </a>
            </div>

        </form>
    </div>
</div>
<?php require_once __DIR__ . '/../layout/footer.php'; ?>