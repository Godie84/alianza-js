<?php
require_once __DIR__ . '/../includes/conexion.php';
require_once __DIR__ . '/../public/home_listar.php';

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catálogo de la Biblioteca</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-center m-0">📚 Catálogo de Libros biblioteca alianza francesa</h1>
            <a href="login.php" class="btn btn-outline-primary">
                <i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Listado disponible</h5>
            </div>
            <div class="card-body">
                <table id="tablaLibros" class="table table-bordered table-hover table-striped">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>Tipo</th>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Edición</th>
                            <th>Año</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Carátula</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php foreach ($listaLibros as $libro): ?>
                            <tr>
                                <td><?= htmlspecialchars($libro['tipo']) ?></td>
                                <td><?= htmlspecialchars($libro['titulo']) ?></td>
                                <td><?= htmlspecialchars($libro['autor']) ?></td>
                                <td><?= htmlspecialchars($libro['edicion']) ?></td>
                                <td><?= htmlspecialchars($libro['anio']) ?></td>
                                <td>$<?= number_format($libro['precio'], 2) ?></td>
                                <td><?= $libro['stock'] ?></td>
                                <td>
                                    <?php if (!empty($libro['ruta'])): ?>
                                        <a href="<?= htmlspecialchars($libro['ruta']) ?>" target="_blank">
                                            <img src="<?= htmlspecialchars($libro['ruta']) ?>" width="60" alt="Carátula">
                                        </a>
                                    <?php else: ?>
                                        <span class="text-muted">Sin imagen</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Scripts necesarios -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!-- Inicializar DataTables -->
    <script>
        $(document).ready(function() {
            $('#tablaLibros').DataTable({
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
                },
                responsive: true
            });
        });
    </script>
</body>

</html>