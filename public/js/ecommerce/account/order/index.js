$(document).ready(function () {
    $('#table-data').DataTable({
        "language": {
            "search": "Buscar: ",
            "zeroRecords": "No se encontró ningún registro.",
            "info": "Total de compras: <strong>_TOTAL_</strong>",
            infoEmpty: "Sin datos disponibles",
            emptyTable: "No se ha encontrado ningún registro.",
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i> ',
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "lengthMenu": "Mostrar _MENU_ compras"
        },
        "ordering": false
    });
});

$(document).on('click', '.show-order', function (e) {
    e.preventDefault();
    var url = $(this).attr('href');

    modalTools.renderView('modal-upsert', url, true,function () {
    });
});
