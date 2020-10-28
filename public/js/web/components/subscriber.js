$(document).ready(function () {
    formTools.useAjaxOnSubmit('form-subscriber', function () {

        Swal.fire({
            title: 'Éxito',
            text: "Suscripción exitosa",
            icon: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ok'
        }).then((result) => {
            location.reload();
        })

    });
});
