<?php
require_once 'conexion.php';
require_once 'funciones_productos.php';
require_once 'cabecera.php';
require_once 'nav.php';

$listaLibros = obtenerProductos($conexion);
?>
<div class="container mt-4">
  <h1>Lista de Productos</h1>
  <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalProducto">
    Crear Nuevo Producto
  </button>
  <table id="tablaLibros" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Tipo</th>
        <th>Título</th>
        <th>Autor</th>
        <th>Edición</th>
        <th>Año</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Imagen</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($listaLibros as $libro): ?>
        <tr>
          <td><?php echo $libro['id']; ?></td>
          <td><?php echo $libro['tipo']; ?></td>
          <td><?php echo $libro['titulo']; ?></td>
          <td><?php echo $libro['autor']; ?></td>
          <td><?php echo $libro['edicion']; ?></td>
          <td><?php echo $libro['anio']; ?></td>
          <td><?php echo $libro['precio']; ?></td>
          <td><?php echo $libro['stock']; ?></td>
          <td>
            <?php if ($libro['imagen']): ?>
              <img src="img/<?php echo $libro['imagen']; ?>" alt="<?php echo $libro['titulo']; ?>" width="50" class="img-thumbnail">
            <?php else: ?>
              Sin imagen
            <?php endif; ?>
          </td>
          <td>
            <button type="button" class="btn btn-sm btn-primary me-1" data-bs-toggle="modal" data-bs-target="#modalProducto" data-bs-id="<?php echo $libro['id']; ?>">Editar</button>
            <a href="eliminar.php?id=<?php echo $libro['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <?php if (isset($_GET['mensaje'])): ?>
    <div class="alert alert-success mt-3"><?php echo $_GET['mensaje']; ?></div>
  <?php endif; ?>
</div>

<div class="modal fade" id="modalProducto" tabindex="-1" aria-labelledby="modalProductoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalProductoLabel">Crear Nuevo Producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="procesar_formulario.php" enctype="multipart/form-data" id="formularioProducto">
          <input type="hidden" name="txtID" id="txtID">
          <input type="hidden" name="imagenActual" id="imagenActual">

          <div class="mb-3">
            <label for="tipo" class="form-label">Tipo:</label>
            <input type="text" class="form-control" name="tipo" id="tipo">
          </div>
          <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" class="form-control" name="titulo" id="titulo" required>
          </div>
          <div class="mb-3">
            <label for="autor" class="form-label">Autor:</label>
            <input type="text" class="form-control" name="autor" id="autor">
          </div>
          <div class="mb-3">
            <label for="edicion" class="form-label">Edición:</label>
            <input type="text" class="form-control" name="edicion" id="edicion">
          </div>
          <div class="mb-3">
            <label for="anio" class="form-label">Año:</label>
            <input type="number" class="form-control" name="anio" id="anio">
          </div>
          <div class="mb-3">
            <label for="precio" class="form-label">Precio:</label>
            <input type="number" step="0.01" class="form-control" name="precio" id="precio" required>
          </div>
          <div class="mb-3">
            <label for="stock" class="form-label">Stock:</label>
            <input type="number" class="form-control" name="stock" id="stock" required>
          </div>
          <div class="mb-3">
            <label for="imagen" class="form-label">Imagen:</label>
            <input type="file" class="form-control" name="imagen" id="imagen">
            <div id="previewImagen" class="mt-2"></div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" name="accion" value="Registrar" form="formularioProducto">Guardar</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="./js/script.js"></script>

<script src="./js/tabla.js"></script>
<!-- jQuery (requerido por DataTables) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JS y CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- Idioma español para DataTables -->
<script src="https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"></script>

<?php require_once 'footer.php'; ?>