$(document).ready(function() {
    $('.num-in span').click(function () {
        var $input = $(this).parents('.num-block').find('input.in-num');
        if($(this).hasClass('minus')) {
            var count = parseFloat($input.val()) - 1;
            count = count < 1 ? 1 : count;
            if (count < 2) {
                $(this).addClass('dis');
            }
            else {
                $(this).removeClass('dis');
            }
            $input.val(count);
        }
        else {
            var count = parseFloat($input.val()) + 1
            $input.val(count);
            if (count > 1) {
                $(this).parents('.num-block').find(('.minus')).removeClass('dis');
            }
        }

        $input.change();
        return false;
    });

    $('.images-slider').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1240,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.colors-container').children('div').each(function () {
        if($(this).hasClass('selected-color')){
            loadSizes($(this).attr('data-id'));
        }
    });

});

$(document).on('click', '.btn-thumbnail', function () {
    $('.variant-image').attr('src', $(this).data('url'));
});

$(document).on('click', '.color-item', function () {
    $(this).parent().children('div').each(function () {
        if($(this).hasClass('selected-color')){
            $(this).removeClass('selected-color');
        }
    });

    loadSizes($(this).attr('data-id'));
    $(this).addClass('selected-color');
});

function loadSizes(colorId) {

    var $inpUrlSize = $('#inp-url-load-sizes');
    if ($inpUrlSize.length === 0) {
        return '';
    }

    var url = $inpUrlSize.val();
    url = url.replace('FAKE_ID', colorId);
    const $sizeContainer = $('.size-container');
    const $sizeList = $('.size-list');
    const $loading = formTools._makeLoading();

    $.ajax({
        url: url,
        method: 'GET',
        beforeSend: function() {
            $sizeList.addClass('d-none');
            $sizeContainer.append($loading);
        },
        success: function (response) {

            const sizes = response.data;
            $sizeList.html('');

            console.log(sizes);

            if(sizes.length > 0){

                sizes.forEach(function (item) {

                    let sizeElement =
                        $('<div class="col-2 text-center">' +
                            '   <h4><span class="badge badge-primary">'+item.size.value+'</span></h4>' +
                           '</div>');

                    $sizeList.append(sizeElement);
                });
            } else {
                const text = $('<span>', {html: "No hay tallas disponibles"});
                $sizeList.append(text);
            }

        },
        error: function () {
            Swal.fire(
                'Atención',
                'Algo salió mal, intente más tarde',
                'error'
            );
        },
        complete: function () {
            $sizeList.removeClass('d-none');
            $loading.remove();
        }
    });

}
