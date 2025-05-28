<?php require_once __DIR__ . '/../layout/header.php'; ?>
<?php require_once __DIR__ . '/../layout/nav.php'; ?>
<h2>Listado de usuarios</h2>
<a href="index.php?controller=user&action=create" class="btn btn-success mb-2">Nuevo usuario</a>

<?php if (isset($_GET['success'])): ?><!-- Si se ha registrado un nuevo usuario, se muestra un mensaje de éxito -->
    <div class="alert alert-success">Usuario registrado correctamente.</div>
<?php elseif (isset($_GET['updated'])): ?>
    <div class="alert alert-success">Usuario actualizado.</div>
<?php elseif (isset($_GET['deleted'])): ?>
    <div class="alert alert-success">Usuario eliminado.</div>
<?php endif; ?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['name']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= htmlspecialchars($user['role']) ?></td>
                <td>
                    <a href="index.php?controller=user&action=edit&id=<?= $user['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="index.php?controller=user&action=delete&id=<?= $user['id'] ?>"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('¿Estás seguro de eliminar este usuario?')">
                        Eliminar
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php require_once __DIR__ . '/../layout/footer.php'; ?>