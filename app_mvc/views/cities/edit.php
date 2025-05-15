<?php require_once __DIR__ . '/../layout/header.php'; ?>

<h2>Editar ciudad</h2>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="POST" action="index.php?controller=city&action=update&id=<?= $user['id'] ?>">
    <div class="mb-3">
        <label class="form-label">Ciudad</label>
        <input type="text" name="city" class="form-control"
               value="<?= htmlspecialchars($city['city']) ?>" required>
    </div>
    
    <button class="btn btn-primary">Actualizar</button>
</form>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
