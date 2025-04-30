<?php
require 'conexion.php';
require 'backend.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro - Librería</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

    <!-- Botón para abrir el modal -->
    <div class="container text-center mt-5">
        <button type="button" class="btn btn-outline-primary btn-lg rounded-pill px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#registroModal">
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
                    <form id="formRegistro" method="post">
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
    
    <!-- Tabla de registros -->
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Listado de Libros Registrados</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>Tipo</th>
                                <th>Título</th>
                                <th>Autor</th>
                                <th>Edición</th>
                                <th>Año</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listaLibros as $libros) { ?>
                                <tr>
                                    <td><?= htmlspecialchars($libros['tipo']) ?></td>
                                    <td><?= htmlspecialchars($libros['titulo']) ?></td>
                                    <td><?= htmlspecialchars($libros['autor']) ?></td>
                                    <td><?= htmlspecialchars($libros['edicion']) ?></td>
                                    <td><?= htmlspecialchars($libros['anio']) ?></td>
                                    <td><?= htmlspecialchars($libros['precio']) ?></td>
                                    <td><?= htmlspecialchars($libros['stock']) ?></td>
                                    <td>
                                        <form action="" method="post" class="d-flex justify-content-center gap-2">
                                            <input type="hidden" name="txtID" value="<?= $libros['id'] ?>">
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-outline-primary"
                                                data-bs-toggle="modal"
                                                data-bs-target="#registroModal"
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

                                            <button type="submit" name="accion" value="btnEliminar" onclick="return confirm('¿Desea eliminar este elemento?');" class="btn btn-sm btn-outline-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Js Actualizar -->
    <script src="./js/script.js"></script>

</body>

</html>