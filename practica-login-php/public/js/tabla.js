document.addEventListener('DOMContentLoaded', function () {
    $('#tablaLibros').DataTable({
        pageLength: 10,
        lengthMenu: [ [3, 6, 9, 12, -1], [3, 6, 9, 12, "Todos"] ],
        language: {
            url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
        }
    });
});
