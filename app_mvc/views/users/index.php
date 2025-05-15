<?php require_once __DIR__ . '/../layout/header.php'; ?>
<!-- Opcion de busqueda -->
<form method="GET" action="index.php" class="mb-3 row g-2">
    <input type="hidden" name="controller" value="user">
    <input type="hidden" name="action" value="index">

    <div class="col-auto">
        <input type="text" name="q" class="form-control" placeholder="Buscar..." value="<?= $_GET['q'] ?? '' ?>">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-secondary">Buscar</button>
    </div>
</form>


<h2>Listado de usuarios</h2>
<!-- Boton nuevo usuario -->
<a href="index.php?controller=user&action=create" class="btn btn-success mb-2">
    <i class="fas fa-user-plus"></i> Nuevo usuario
</a>
<!-- Boton exportar a excel -->
<a href="index.php?controller=user&action=exportarExcel" class="btn btn-success mb-2">
    <i class="fas fa-file-excel"></i> Exportar a Excel
</a>
<!-- Boton exportar a pdf -->
<a href="index.php?controller=user&action=exportarPDF" class="btn btn-danger mb-2" target="_blank">
    <i class="fas fa-file-pdf"></i> Exportar a PDF
</a>

<!-- <?php if (isset($_GET['success'])): ?>
    <div class="alert alert-success">Usuario registrado correctamente.</div>
<?php endif; ?> -->

<?php if (isset($_GET['success'])): ?>
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
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['name']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
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

<?php if ($totalPages > 1): ?>
    <nav>
        <ul class="pagination">
            <?php if ($page > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?controller=user&action=index&page=<?= $page - 1 ?>&q=<?= $search ?>">Anterior</a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                    <a class="page-link" href="?controller=user&action=index&page=<?= $i ?>&q=<?= $search ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
                <li class="page-item">
                    <a class="page-link" href="?controller=user&action=index&page=<?= $page + 1 ?>&q=<?= $search ?>">Siguiente</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
<?php endif; ?>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>