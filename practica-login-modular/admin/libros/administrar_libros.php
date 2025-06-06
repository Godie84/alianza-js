<?php
require_once __DIR__ . '/../../includes/init.php';
require_once __DIR__ . '/../../includes/cabecera.php'; // Asegúrate de que la ruta sea correcta
require_once __DIR__ . '/../../includes/navbar.php'; // Asegúrate de que la ruta sea correcta
$sentencia = $conexion->prepare("SELECT * FROM productos ORDER BY id DESC");
$sentencia->execute();
$listaLibros = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<style>
    #btnRegistrar {
        display: none;
        /* Esto oculta el botón */
    }
</style>
<h1 class="display-1 text-center">Administrar Productos</h1>
<!-- Botón para abrir el modal -->
<div class="container text-center mt-5">
    <button id="btnRegistrar" type="button" class="btn btn-outline-primary btn-lg rounded-pill px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#registroModal">
        <i class="bi bi-journal-plus me-2"></i> Registrar Libro
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="registroModal" tabindex="-1" aria-labelledby="registroModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="registroModalLabel">Registro en la Librería</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <div class="modal-body">
                <form id="formRegistro" action="../libros/actualizar_libros.php" method="post">

                    <input type="hidden" name="txtID" id="txtID"> <!-- ID oculto para actualizar -->

                    <div class="mb-3">
                        <input type="text" class="form-control form-control-sm" name="tipo" id="tipo" placeholder="Tipo libro" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control form-control-sm" name="titulo" id="titulo" placeholder="Título" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control form-control-sm" name="autor" id="autor" placeholder="Autor" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control form-control-sm" name="edicion" id="edicion" placeholder="Edición" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control form-control-sm" name="anio" id="anio" placeholder="Año" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control form-control-sm" name="precio" id="precio" placeholder="Precio" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control form-control-sm" name="stock" id="stock" placeholder="Stock" required>
                    </div>

                    <button type="submit" id="btnFormulario" name="accion" value="Registrar" class="btn btn-success w-100">Registrar</button>
                </form>

            </div>

        </div>
    </div>
</div>

<!-- Tabla de registros con ID correcto para DataTables -->
<div class="container card shadow-sm p-2">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Listado de Libros Registrados</h5>
    </div>
    <table id="tablaLibros" class="table table-bordered table-striped table-hover">
        <thead class="table-dark text-center">
            <tr>
                <th>Tipo</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Edición</th>
                <th>Año</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Caratula</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php foreach ($listaLibros as $libros) { ?>
                <tr>
                    <td><?= htmlspecialchars($libros['tipo']) ?></td>
                    <td><?= htmlspecialchars($libros['titulo']) ?></td>
                    <td><?= htmlspecialchars($libros['autor']) ?></td>
                    <td><?= htmlspecialchars($libros['edicion']) ?></td>
                    <td><?= htmlspecialchars($libros['anio']) ?></td>
                    <td>$<?= number_format($libros['precio'], 2) ?></td>
                    <td><?= htmlspecialchars($libros['stock']) ?></td>
                    <td>
                        <?php if (!empty($libro['ruta'])): ?>
                            <a href="/img/<?= htmlspecialchars($libros['ruta']) ?>" target="_blank">
                                <img src="/img/<?= htmlspecialchars($libros['ruta']) ?>" width="60" alt="Carátula">
                            </a>
                        <?php else: ?>
                            <span class="text-muted">Sin imagen</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <form action="../libros/eliminar_libros.php" method="post" class="form-eliminar d-flex justify-content-center gap-2">
                            <input type="hidden" name="txtID" value="<?= $libros['id'] ?>">
                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#registroModal"
                                data-id="<?= $libros['id'] ?>"
                                data-tipo="<?= htmlspecialchars($libros['tipo']) ?>"
                                data-titulo="<?= htmlspecialchars($libros['titulo']) ?>"
                                data-autor="<?= htmlspecialchars($libros['autor']) ?>"
                                data-edicion="<?= htmlspecialchars($libros['edicion']) ?>"
                                data-anio="<?= htmlspecialchars($libros['anio']) ?>"
                                data-precio="<?= htmlspecialchars($libros['precio']) ?>"
                                data-stock="<?= htmlspecialchars($libros['stock']) ?>"
                                onclick="cargarLibro(this)">
                                Actualizar
                            </button>
                            <button type="submit" name="accion" value="btnEliminar" class="btn btn-sm btn-outline-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<!-- Bootstrap Js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Js Actualizar -->
<script src="../../public/js/script.js"></script>
<script src="../../public/js/tabla.js"></script>
<!-- jQuery (requerido por DataTables) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JS y CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- Idioma español para DataTables -->
<script src="https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"></script>



</body>

</html>