let productName = '';

$(window).on('hashchange', function() {
    if (window.location.hash) {
        var page = window.location.hash.replace('#', '');
        if (page === Number.NaN || page <= 0) {
            return false;
        } else {
            getProducts(page,productName);
        }
    }
});

$(document).ready(function() {
    $(document).on('click', '.pagination a', function (e) {
        getProducts($(this).attr('href').split('page=')[1],productName);
        e.preventDefault();
    });

    $(document).on('click', '#btn-search', function () {
        productName = $('#search').val();
        getProducts(1,productName);
    });
});
function getProducts(page, productName = '') {

    var $productName = $('.product-container');

    $.ajax({
        url : '?page=' + page + '&productName=' + productName,
        dataType: 'json',
        success: function (data) {
            $productName.html(data);
            location.hash = page;
        },
        error: function () {
            Swal.fire(
                'Atención',
                'Algo salió mal, intente más tarde',
                'error'
            );
        }
    });
}
