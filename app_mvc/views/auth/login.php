<?php require_once __DIR__ . '/../layout/header.php'; ?>
<div class="container mt-5" style="max-width: 400px;">
    <h2 class="mb-4 text-center">Iniciar Sesión</h2>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>    

    <!-- <?php if (!empty($_SESSION['login_error'])): ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars($_SESSION['login_error']) ?>
        </div>
        <?php unset($_SESSION['login_error']); ?>
    <?php endif; ?> -->

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
    </form>
</div>
<?php require_once __DIR__ . '/../layout/footer.php'; ?>