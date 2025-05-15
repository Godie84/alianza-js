<?php require_once __DIR__ . '/../layout/header.php'; ?>

<h2>Crear ciudad</h2>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="POST" action="index.php?controller=city&action=store">
    <div class="mb-3">
        <label class="form-label">Ciudad</label>
        <input type="text" name="city" class="form-control"
               value="<?= $oldData['city'] ?? '' ?>" required>
    </div>
    
    <button class="btn btn-primary">Guardar</button>
</form>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
