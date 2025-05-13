<?php require_once __DIR__ . '/../layout/header.php'; ?>

<h2>Editar usuario</h2>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="POST" action="index.php?controller=user&action=update&id=<?= $user['id'] ?>">
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="name" class="form-control"
               value="<?= htmlspecialchars($user['name']) ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control"
               value="<?= htmlspecialchars($user['email']) ?>" required>
    </div>
    <button class="btn btn-primary">Actualizar</button>
</form>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
