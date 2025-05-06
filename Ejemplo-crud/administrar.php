<?php
require 'conexion.php';
require './backend/listar.php';
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
    <!-- SwetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        #btnRegistrar {
            display: none;
            /* Esto oculta el botón */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="./registrar.php">Registrar Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./administrar.php">Administrar Productos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
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
                    <form id="formRegistro" action="backend/actualizar.php" method="post">

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
                    <th>Imagen</th>
                    <th>Imagen1</th>
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
                        <td><?= htmlspecialchars($libros['precio']) ?></td>
                        <td><?= htmlspecialchars($libros['stock']) ?></td>
                        <td>
                            <a target="_blank" href="<?= htmlspecialchars($libros['ruta']) ?>">
                                <?= htmlspecialchars($libros['imagen']) ?>
                            </a>
                        </td>
                        <td>
                            <a target="_blank" href="<?= htmlspecialchars($libros['ruta']) ?>">
                                <img src="<?= htmlspecialchars($libros['ruta']) ?>" width="100" alt="Imagen del libro">
                            </a>
                        </td>


                        <td>
                            <form action=" backend/eliminar.php" method="post" class="form-eliminar d-flex justify-content-center gap-2">
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
    <script src="./js/script.js"></script>
    <script src="./js/tabla.js"></script>
    <!-- jQuery (requerido por DataTables) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS y CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- Idioma español para DataTables -->
    <script src="https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"></script>



</body>

</html>