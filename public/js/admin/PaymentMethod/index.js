$(document).ready(function () {

    $("body").tooltip({selector: '[data-toggle=tooltip]'});

    var table = $('#table-data').DataTable({
        "ajax": $('#inp-url-index-content').val(),
        "processing": true,
        "columns": [
            {"data": "name"},
            {
                "data": null,
                render:function(data, type, row )
                {
                    var $inpUrlShow = $('#inp-url-active');
                    if ($inpUrlShow.length === 0) {
                        return '';
                    }

                    var url = $inpUrlShow.val();
                    url = url.replace('FAKE_ID', data.id);
                    var active = data.active ? 'on' : 'off';
                    return "<a href='"+url+"' class='active-btn' style='color: #2a3d66'><span class='fas fa-toggle-"+active+"''></span></a>";
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

    $(document).on('click', '.active-btn', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');

        var option = $(this).children().hasClass('fa-toggle-on') ? 'desactivar' : 'activar';
        var optionContra = !$(this).children().hasClass('fa-toggle-on') ? 'desactivar' : 'activar';
        var preValue = $(this).children().hasClass('fa-toggle-on');
        var $this = $(this);

        Swal.fire({
            title: '¿Desea '+option+' el método de pago?',
            text: 'Podrá '+optionContra+' en cualquier momento',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: option,
            calcelButtonText: 'cancelar'
        }).then((result) => {
            if (result.value) {

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
                                preValue ? 'Desactivado' : 'Activado',
                                'El método de pago fue '+(preValue ? 'desactivado' : 'activado')+'.',
                                'success'
                            );
                        }
                    },
                    complete: function () {
                        $this.children().removeClass('fa');
                        $this.children().removeClass('fa-spinner');
                        $this.children().removeClass('fa-spin');
                        if (preValue){
                            $this.children().addClass('fas');
                            $this.children().addClass('fa-toggle-off');
                        } else{
                            $this.children().addClass('fas');
                            $this.children().addClass('fa-toggle-on');
                        }
                    }
                });

            }
        })
    });
});
