$(document).ready(function () {

    formTools.useAjaxOnSubmit(
        'form-update-profile',
        function (response) {
            Swal.fire({
                title: 'Perfecto',
                text: "¡Se ha modificado su cuenta con éxito!",
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
