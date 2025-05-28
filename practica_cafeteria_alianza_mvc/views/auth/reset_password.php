<?php require_once __DIR__ . '/../layout/header.php'; ?>
<?php if (empty($_GET['token'])): ?>
    <p style="color: red;">Token no válido.</p>
<?php else: ?>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-lg border-0" style="width: 100%; max-width: 400px;">
            <h2 class="mb-4 text-center">Restablecer Contraseña</h2>
            <form action="index.php?controller=auth&action=resetPassword" method="POST">
                <input type="hidden" name="token" value="<?= htmlspecialchars($_GET['token']) ?>">

                <div class="mb-3">
                    <label for="new_password" class="form-label">Nueva contraseña</label>
                    <input type="password" id="new_password" name="new_password" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Actualizar contraseña</button>
            </form>
        </div>
    </div>

<?php endif; ?>
</body>

</html>