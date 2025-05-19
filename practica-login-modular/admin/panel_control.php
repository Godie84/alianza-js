<?php 
require_once __DIR__ . '/../includes/cabecera.php';
?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="card border-0 shadow w-100" style="max-width: 60rem;">
            <div class="card-body">
                <div class="row g-4 justify-content-center">
                    <!-- Tarjeta 1 -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card h-100 text-center shadow-sm">
                            <img src="../public/img/libros.jpg" class="card-img-top mx-auto d-block" alt="Gestionar libros" style="max-width: 180px;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Gestionar libros</h5>
                                <p class="card-text flex-grow-1">Administracion de libros.</p>
                                <a href="../admin/libros/administrar_libros.php" class="btn btn-primary mt-auto">Gestionar libros</a>
                            </div>
                        </div>
                    </div>

                    <!-- Tarjeta 2 -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card h-100 text-center shadow-sm">
                            <img src="../public/img/usuarios.jpg" class="card-img-top mx-auto d-block" alt="Gestionar usuarios" style="max-width: 180px;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Gestionar usuarios</h5>
                                <p class="card-text flex-grow-1">Administracion de usuarios.</p>
                                <a href="../vista/permisos_reporte_excel.php" class="btn btn-primary mt-auto">Gestionar usuarios</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
