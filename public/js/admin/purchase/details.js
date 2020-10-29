$(document).ready(function () {

    $("body").tooltip({selector: '[data-toggle=tooltip]'});

    var table = $('#table-data').DataTable({
        "ajax": $('#inp-url-index-contentTableDetails').val(),
        "processing": true,
        "columns": [
            {"data": "product.name"},
            {"data": "product.description"},
            {"data": "sku"},
            {"data": "size.value"},
            {"data": "color_name"},
            {"data": "pivot.quantity"},
            {"data": "pivot.purchase_price"},
        ],
        "language": {
            "search": "Buscar: ",
            "zeroRecords": "No se encontró ningún registro.",
            "info": "Total de productos: <strong>_TOTAL_</strong>",
            infoEmpty: "Sin datos disponibles",
            emptyTable: "No se ha encontrado ningún registro.",
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i> ',
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "lengthMenu": "Mostrar _MENU_ detalles"
        },
        "ordering": false
    });
});
