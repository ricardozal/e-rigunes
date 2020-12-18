$(document).on('click', '.sent-data', function (e) {
    e.preventDefault();
    $(this).attr('disabled','disabled');
    $('#form-create-profile').submit();
});
