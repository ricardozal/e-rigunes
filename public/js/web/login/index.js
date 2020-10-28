$(document).ready(function () {

    formTools.useAjaxOnSubmit(
        'form-create-profile',
        function (response) {
            Swal.fire({
                title: '¡Se ha creado su cuenta con éxito!',
                text: "Debes iniciar sesión para continuar",
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Continuar'
            }).then((result) => {
                if (result.value) {
                    location.reload();
                }
            })
        }
    );

});
