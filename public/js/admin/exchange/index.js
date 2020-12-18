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
            {
                "data": "id",
                render:function(data)
                {
                    var $inpUrlExchangeSaleVariant = $('#inp-url-exchangeSaleVariant');
                    if ($inpUrlExchangeSaleVariant.length === 0) {
                        return '';
                    }

                    var url = $inpUrlExchangeSaleVariant.val();
                    url = url.replace('FAKE_ID', data);


                    return "<a href='"+url+"' title='Producto de cambio' data-toggle='tooltip' class='exchange-sale-variant-btn' style='color: #2a3d66'><span class='fab fa-product-hunt'></span></a>";
                },
                "targets": -1
            },
            {
                "data": "id",
                render:function(data)
                {
                    var $inpUrlExchangeVariant = $('#inp-url-exchangeVariant');
                    if ($inpUrlExchangeVariant.length === 0) {
                        return '';
                    }

                    var url = $inpUrlExchangeVariant.val();
                    url = url.replace('FAKE_ID', data);


                    return "<a href='"+url+"' title='Producto a cambio' data-toggle='tooltip' class='exchange-variant-btn' style='color: #2a3d66'><span class='fab fa-product-hunt'></span></a>";
                },
                "targets": -1
            },
            {
                "data": "id",
                render:function(data)
                {
                    var $inpUrlStatus = $('#inp-url-status');
                    if ($inpUrlStatus.length === 0) {
                        return '';
                    }

                    var url = $inpUrlStatus.val();
                    url = url.replace('FAKE_ID', data);


                    return "<a href='"+url+"' title='Estatus del reembolso' data-toggle='tooltip' class='status-btn' style='color: #2a3d66'><span class='fas fa-align-justify'></span></a>";
                },
                "targets": -1
            },
        ],
        "language": {
            "search": "Buscar: ",
            "zeroRecords": "No se encontró ningún registro.",
            "info": "Total de cambios: <strong>_TOTAL_</strong>",
            infoEmpty: "Sin datos disponibles",
            emptyTable: "No se ha encontrado ningún registro.",
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i> ',
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "lengthMenu": "Mostrar _MENU_ cambios"
        },
        "ordering": false
    });

    $(document).on('click', '.exchange-sale-variant-btn', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');

        modalTools.renderView('modal-upsert', url, true,function () {
            formTools.useAjaxOnSubmit('form-upsert', function () {
                $('#modal-upsert').modal('hide');
                table.ajax.reload();
            });
        });
    });

    $(document).on('click', '.exchange-variant-btn', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');

        modalTools.renderView('modal-upsert', url, true,function () {
            formTools.useAjaxOnSubmit('form-upsert', function () {
                $('#modal-upsert').modal('hide');
                table.ajax.reload();
            });
        });
    });

    $(document).on('click', '.status-btn', function (e) {
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
