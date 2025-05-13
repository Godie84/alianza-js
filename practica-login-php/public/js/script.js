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

//Codigo para generar las alertas con SweetAlert
document.querySelectorAll('.form-eliminar').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault(); // Detiene el envío del formulario

        //console.log("Formulario está a punto de ser enviado"); // Verifica en la consola

        Swal.fire({
            title: "¿Estás seguro?",
            text: "¡Esta acción no se puede deshacer!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                //console.log("Formulario enviado"); // Esto se debería ver en la consola si se confirma
                form.submit(); // Si el usuario confirma, se envía el formulario
            }
        });
    });
});

const urlParams = new URLSearchParams(window.location.search);

// Confirmación de registro
if (urlParams.get('mensaje') === 'registrado') {
    Swal.fire({
        title: "¡Registrado!",
        text: "El libro se ha registrado exitosamente.",
        icon: "success",
        showConfirmButton: false,
        timer: 2000
    });

    // Limpia el parámetro de la URL sin recargar
    window.history.replaceState(null, null, window.location.pathname);
}

// Confirmación de edición
if (urlParams.get('mensaje') === 'actualizado') {
    Swal.fire({
        title: "¡Actualizado!",
        text: "El libro se ha actualizado exitosamente.",
        icon: "success",
        showConfirmButton: false,
        timer: 2000
    });

    // Limpia el parámetro de la URL sin recargar
    window.history.replaceState(null, null, window.location.pathname);
}

// Confirmación de eliminación
if (urlParams.get('mensaje') === 'eliminado') {
    Swal.fire({
        title: "¡Eliminado!",
        text: "El registro ha sido eliminado exitosamente.",
        icon: "success",
        showConfirmButton: false,
        timer: 2000
    });

    // Limpia el parámetro de la URL sin recargar
    window.history.replaceState(null, null, window.location.pathname);
}





