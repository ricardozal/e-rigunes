$(document).ready(function () {

    formTools.useAjaxOnSubmit(
        'form-create-address',
        function (response) {
            Swal.fire({
                title: 'Perfecto',
                text: "¡Dirección guardada!",
                icon: 'success',
                showCancelButton: false,
                allowEscapeKey: false,
                allowOutsideClick: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Continuar'
            }).then((result) => {
                if (result.value) {
                    window.location.replace($('#inp-url-personal-data').val());
                }
            })
        }
    );

});
