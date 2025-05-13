<?php
require 'conexion.php';
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
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Sistema de libros</a>
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
    <h1 class="display-1 text-center">Registrar Productos</h1>
    <!-- Botón para abrir el modal -->
    <div class="container text-center mt-5">
        <button id="btnRegistrar" type="button" class="btn btn-outline-primary btn-lg rounded-pill px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#registroModal">
            <i class="bi bi-journal-plus me-2"></i> Nuevo Libro
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
                    <form id="formRegistro" action="backend/crear.php" method="post" enctype="multipart/form-data">

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
                        <div class="mb-3">
                            <input type="file" name="imagen" class="form-control" required>
                        </div>
                        <button type="submit" id="btnFormulario" name="accion" value="Registrar" class="btn btn-success w-100">Registrar</button>
                    </form>

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