$(document).ready(function () {

    $("body").tooltip({selector: '[data-toggle=tooltip]'});

    var table = $('#table-data').DataTable({
        "ajax": $('#inp-url-index-content').val(),
        "processing": true,
        "columns": [
            {"data": "name"},
            {"data": "phone"},
            {"data": "email"},
            {
                "data": null,
                render:function(data, type, row )
                {
                    var $inpUrlShow = $('#inp-url-show');
                    if ($inpUrlShow.length === 0) {
                        return '';
                    }

                    var url = $inpUrlShow.val();
                    url = url.replace('FAKE_ID', data.id);
                    return "<a href='"+url+"' class='show-btn' style='color: #2a3d66'><span class='fas fa-envelope'/></a>";
                },
                "targets": -1
            },
        ],
        "language": {
            "search": "Buscar: ",
            "zeroRecords": "No se encontró ningún registro.",
            "info": "Total de mensajes: <strong>_TOTAL_</strong>",
            infoEmpty: "Sin datos disponibles",
            emptyTable: "No se ha encontrado ningún registro.",
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i> ',
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "lengthMenu": "Mostrar _MENU_ mensajes"
        },
        "ordering": false
    });
});

$(document).on('click', '.show-btn', function (e) {
    e.preventDefault();
    var url = $(this).attr('href');

    modalTools.renderView('modal-upsert', url, true,function () {
        formTools.useAjaxOnSubmit('form-upsert', function () {
            $('#modal-upsert').modal('hide');
            Swal.fire(
                'Enviado!',
                'Mensaje enviado!',
                'success'
            )
        });
    });
});
