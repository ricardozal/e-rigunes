$(document).ready(function () {
    $("body").tooltip({selector: '[data-toggle=tooltip]'});

    var table = $('#table-data').DataTable({
        "ajax": $('#inp-url-index-content').val(),
        "processing": true,
        "columns": [
            {"data": "buyer.full_name"},
            {"data": "reason"},
            {"data": "quantity"},
            {"data": "address.full_address"},
            {"data": "shipping_info.guide_number"},
            {
                "data": "id",
                render:function(data)
                {
                    var $inpUrlVariant = $('#inp-url-variant');
                    if ($inpUrlVariant.length === 0) {
                        return '';
                    }

                    var url = $inpUrlVariant.val();
                    url = url.replace('FAKE_ID', data);


                    return "<a href='"+url+"' title='Productos' data-toggle='tooltip' class='variant-btn' style='color: #2a3d66'><span class='fab fa-product-hunt'></span></a>";
                },
                "targets": -1
            },
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

    $(document).on('click', '.variant-btn', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');

        modalTools.renderView('modal-upsert', url, true,function () {
            formTools.useAjaxOnSubmit('form-upsert', function () {
                $('#modal-upsert').modal('hide');
                table.ajax.reload();
            });
        });
    });
});
