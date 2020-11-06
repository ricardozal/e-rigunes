$(document).ready(function () {

    formTools.useAjaxOnSubmit('form-address-upsert', function () {

        window.location.href = $('#inp-url-personal-data').val();

    },
        function () {

        console.log("Error")
        }
        );
});
