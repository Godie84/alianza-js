<?php
require_once 'conexion.php';
require_once 'funciones_productos.php';
require_once 'cabecera.php';
require_once 'nav.php';
$listaLibros = obtenerProductos($conexion);
?>
<div class="container mt-4">
  <h1>Lista de Productos</h1>
  <!-- <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalProducto">
    Crear Nuevo Producto
  </button> -->
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
          <!-- <td>
             <button type="button" class="btn btn-sm btn-primary me-1" data-bs-toggle="modal" data-bs-target="#modalProducto" data-bs-id="<?php echo $libro['id']; ?>">Editar</button>
            <a href="eliminar.php?id=<?php echo $libro['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</a>
          </td> -->
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <?php if (isset($_GET['mensaje'])): ?>
    <div class="alert alert-success mt-3"><?php echo $_GET['mensaje']; ?></div>
  <?php endif; ?>
</div>

<script src="./js/tabla.js"></script>
<!-- jQuery (requerido por DataTables) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JS y CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- Idioma español para DataTables -->
<script src="https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"></script>

<?php require_once 'footer.php'; ?>