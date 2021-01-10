$(document).ready(function () {

    $("body").tooltip({selector: '[data-toggle=tooltip]'});

    var table = $('#table-data').DataTable({
        "ajax": $('#inp-url-index-content').val(),
        "processing": true,
        "columns": [
            {
                "data": "buyer",
                render: function (data) {
                    return data === null ? 'Invitado' : data.full_name;
                }
            },
            {
                "data": null,
                render: function (data, type, row){
                    return data.address === null ? data.comments : data.address.full_address;
                }
            },
            {"data": "payment_method.name"},
            {"data": "total_price"},
            {
                "data": "shipping_information",
                render: function (data) {

                    var text = '';

                    if (data === null){
                        text = 'Aun no se ha realizado el envío';
                    } else {
                        text = 'Cotización realizada: ' + '$'+data.shipping_price;

                        if(data.guide_number !== null){
                            text = 'Orden enviada con ' + data.parcel_company + ' con número de guía: ' + data.guide_number
                        }

                    }

                    return text;
                }
            },
            {
                "data": "id",
                render: function (data) {
                    var $inpUrlProducts = $('#inp-url-products');
                    if ($inpUrlProducts.length === 0) {
                        return '';
                    }

                    var url = $inpUrlProducts.val();
                    url = url.replace('FAKE_ID', data);


                    return "<a href='" + url + "' title='Productos de la venta' data-toggle='tooltip' class='variant-btn' style='color: #2a3d66'><span class='fab fa-product-hunt'></span></a>";
                },
                "targets": -1
            },
            {
                "data": null,
                render: function (data, type, row)
                {
                    var $inpUrlSkydropx = $('#inp-url-skydropx-create-shipment');
                    if ($inpUrlSkydropx.length === 0) {
                        return '';
                    }

                    var url = $inpUrlSkydropx.val();
                    url = url.replace('FAKE_ID', data.id);

                    var ret = "<a href='" + url + "' title='Confirmar envío' data-toggle='tooltip' class='shipping-btn' style='color: #2a3d66'><span class='fas fa-shipping-fast'></span></a>";
                    var check = "<span title='Envío realizado' data-toggle='tooltip' style='color: #2a3d66'><i class='fas fa-check'></i></span>";
                    var error = "<span title='Sin cotización' data-toggle='tooltip' style='color: #2a3d66'><i class='fas fa-times'></i></span>";

                    var icon = '';

                    if (data.shipping_information === null){
                        icon = error;
                    } else {
                        icon = ret;

                        if(data.shipping_information.guide_number !== null){
                            icon = check;
                        }

                    }

                    return icon;
                },
                "targets": -1
            },
        ],
        "language": {
            "search": "Buscar: ",
            "zeroRecords": "No se encontró ningún registro.",
            "info": "Total de ventas: <strong>_TOTAL_</strong>",
            infoEmpty: "Sin datos disponibles",
            emptyTable: "No se ha encontrado ningún registro.",
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i> ',
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "lengthMenu": "Mostrar _MENU_ ventas"
        },
        "ordering": false
    });

    $(document).on('click', '.variant-btn', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');

        modalTools.renderView('modal-upsert', url, true, function () {
            formTools.useAjaxOnSubmit('form-upsert', function () {
                $('#modal-upsert').modal('hide');
                table.ajax.reload();
            });
        });
    });

    $(document).on('click', '.shipping-btn', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');

        var $this = $(this);

        $.ajax({
            url: url,
            beforeSend: function(){
                $this.children().removeClass('fa-toggle-on');
                $this.children().removeClass('fa-toggle-off');
                $this.children().removeClass('fas');
                $this.children().addClass('fa');
                $this.children().addClass('fa-spinner');
                $this.children().addClass('fa-spin');
            },
            success: function (response) {
                if(response.success)
                {
                    Swal.fire(
                        'Envío realizado',
                        'Los productos estan en espera para su recolección',
                        'success'
                    );
                    table.ajax.reload();
                } else {
                    Swal.fire(
                        'Algo salió mal',
                        response.message,
                        'error'
                    );
                }
            },
            error: function () {
                Swal.fire(
                    'Algo salió mal',
                    'Inténtelo de nuevo más tarde',
                    'error'
                );
            }
        });

    });
});
