const modalProducto = document.getElementById('modalProducto');
  modalProducto.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget;
    const id = button.getAttribute('data-bs-id');
    const modalTitle = modalProducto.querySelector('.modal-title');
    const txtID = modalProducto.querySelector('#txtID');
    const tipo = modalProducto.querySelector('#tipo');
    const titulo = modalProducto.querySelector('#titulo');
    const autor = modalProducto.querySelector('#autor');
    const edicion = modalProducto.querySelector('#edicion');
    const anio = modalProducto.querySelector('#anio');
    const precio = modalProducto.querySelector('#precio');
    const stock = modalProducto.querySelector('#stock');
    const imagen = modalProducto.querySelector('#imagen');
    const previewImagen = modalProducto.querySelector('#previewImagen');
    const imagenActualInput = modalProducto.querySelector('#imagenActual');
    const guardarButton = modalProducto.querySelector('.modal-footer button[type="submit"]');
    const formulario = document.getElementById('formularioProducto');

    formulario.reset();
    previewImagen.innerHTML = '';
    imagenActualInput.value = '';
    guardarButton.value = 'Registrar';
    modalTitle.textContent = 'Crear Nuevo Producto';

    if (id) {
      fetch(`obtener_producto.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
          modalTitle.textContent = 'Editar Producto';
          txtID.value = data.id;
          tipo.value = data.tipo;
          titulo.value = data.titulo;
          autor.value = data.autor;
          edicion.value = data.edicion;
          anio.value = data.anio;
          precio.value = data.precio;
          stock.value = data.stock;
          imagenActualInput.value = data.imagen;
          guardarButton.value = 'Actualizar';
          if (data.imagen) {
            previewImagen.innerHTML = `<img src="img/${data.imagen}" alt="Imagen actual" width="50" class="mt-2">`;
          }
        });
    }
  });

  formularioProducto.addEventListener('submit', function() {
    const accion = modalProducto.querySelector('.modal-footer button[type="submit"]').value;
    const accionInput = document.createElement('input');
    accionInput.type = 'hidden';
    accionInput.name = 'accion';
    accionInput.value = accion;
    this.appendChild(accionInput);
  });