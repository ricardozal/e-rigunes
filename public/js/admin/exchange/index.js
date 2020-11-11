$(document).ready(function () {
    $("body").tooltip({selector: '[data-toggle=tooltip]'});

    var table = $('#table-data').DataTable({
        "ajax": $('#inp-url-index-content').val(),
        "processing": true,
        "columns": [
            {"data": "buyer.full_name"},
            {"data": "reason"},
            {
                "data": "warranty",
                render: function (data) {
                    return data > 0 ? 'Cambio por garantia' : 'Cambio de producto';
                }
            },
            {"data": "address.full_address"},
            {"data": "shipping_info.guide_number"},
            {"data": "shipping_info.guide_number"},
            {"data": "refund_status.name"},
        ],
        "language": {
            "search": "Buscar: ",
            "zeroRecords": "No se encontró ningún registro.",
            "info": "Total de compradores: <strong>_TOTAL_</strong>",
            infoEmpty: "Sin datos disponibles",
            emptyTable: "No se ha encontrado ningún registro.",
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i> ',
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "lengthMenu": "Mostrar _MENU_ usuarios"
        },
        "ordering": false
    });
});
