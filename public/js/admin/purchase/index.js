$(document).ready(function () {

    $("body").tooltip({selector: '[data-toggle=tooltip]'});

    var table = $('#table-data').DataTable({
        "ajax": $('#inp-url-index-content').val(),
        "processing": true,
        "columns": [
            {"data": "provider.name"},
            {"data": "total_price"},
            {
                "data": "id",
                render: function (data) {
                    var $inpUrlDetail = $('#inp-url-detail');
                    if ($inpUrlDetail.length === 0) {
                        return '';
                    }

                    var url = $inpUrlDetail.val();
                    url = url.replace('FAKE_ID', data);

                    return "<a href='" + url + "' title='Detalles' data-toggle='tooltip' class='detail-btn' style='color: #2a3d66'><span class='fas fa-info-circle'></span></a>";
                },
                "targets": -1
            },
            {"data": "status.name"},
            {
                "data": null,
                render: function (data) {
                    var $inpUrlDeliver = $('#inp-url-deliver');
                    if ($inpUrlDeliver.length === 0) {
                        return '';
                    }

                    var url = $inpUrlDeliver.val();
                    url = url.replace('FAKE_ID', data.id);

                    var ret = "<a href='"+url+"' title='Entregar paquete' data-toggle='tooltip' class='deliver-btn' style='color: #2B6699'><span class='fas fa-shipping-fast'></span></a>";
                    var check = "<span title='Entregado' data-toggle='tooltip' style='color: #2B6699'><i class='fas fa-check'></i></span>";
                    return data.fk_id_purchase_status !== 3 ? ret : check;
                },
                "targets": -1
            },
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

    $(document).on('click', '.detail-btn', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');

        modalTools.renderView('modal-upsert', url, true, function () {
            formTools.useAjaxOnSubmit('form-upsert', function () {
                $('#modal-upsert').modal('hide');
                table.ajax.reload();
            });
        });
    });

    $(document).on('click', '.deliver-btn', function (e) {
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
                        'Paquete entregado',
                        'Los productos han sido entregados al servicio de Skydropx',
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
