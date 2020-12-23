$(document).on('click','.fa-trash-alt', function () {

    var $inpUrlDelete = $('#inp-url-delete');
    if ($inpUrlDelete.length === 0) {
        return '';
    }

    var $this = $(this);

    var url = $inpUrlDelete.val();
    url = url.replace('FAKE_ID', $(this).attr('data-id'));

    $.ajax({
        url: url,
        method: 'GET',
        beforeSend: function() {
            Swal.fire({
                title: 'Por favor, espere...',
                allowEscapeKey: false,
                allowOutsideClick: false
            });
            Swal.showLoading();
        },
        success: function (response) {

            if(response.success){
                $this.parent().remove();
            } else {
                Swal.fire(
                    'Atención',
                    'Algo salió mal, intente más tarde',
                    'error'
                );
            }

        },
        error: function () {
            Swal.fire(
                'Atención',
                'Algo salió mal, intente más tarde',
                'error'
            );
        }
    });

});
