// Funcion para mostrar los datos en el modal"
// Esta funcion es una manera optima de traer los datos y mostrarlos en el modal sin tener que recargar la página"
function cargarLibro(button) {
    document.getElementById('txtID').value = button.getAttribute('data-id');
    document.getElementById('tipo').value = button.getAttribute('data-tipo');
    document.getElementById('titulo').value = button.getAttribute('data-titulo');
    document.getElementById('autor').value = button.getAttribute('data-autor');
    document.getElementById('edicion').value = button.getAttribute('data-edicion');
    document.getElementById('anio').value = button.getAttribute('data-anio');
    document.getElementById('precio').value = button.getAttribute('data-precio');
    document.getElementById('stock').value = button.getAttribute('data-stock');

    // Cambiar botón a "Actualizar"
    const boton = document.getElementById('btnFormulario');
    boton.innerText = "Actualizar";
    boton.value = "Actualizar";
}

document.getElementById('registroModal').addEventListener('hidden.bs.modal', function() {
    document.getElementById('formRegistro').reset();
    document.getElementById('txtID').value = "";

    const boton = document.getElementById('btnFormulario');
    boton.innerText = "Registrar";
    boton.value = "Registrar";
});