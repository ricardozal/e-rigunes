$(document).ready(function () {
    formTools.useAjaxOnSubmit('form-contact', function () {

        Swal.fire({
            title: 'Éxito',
            text: "Mensaje enviado correctamente",
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
