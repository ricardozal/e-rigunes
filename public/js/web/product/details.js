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

$(document).on('click', '.badge', function () {
    $('.badge').removeClass('selected-size');
    $(this).addClass('selected-size');
});

$(document).on('click', '#btn-add-variant', function () {

    var $this = $(this);
    $this.attr('disabled', 'disabled');
    $this.html('<i class="fas fa-spinner fa-spin"></i>&nbsp;Agregando...');

    var quantity = $('#quantity').val();
    var colorId = $('.selected-color').attr('data-id');
    var sizeId = $('.selected-size').attr('data-id');
    var token = $('#token').val();

    var url = $('#inp-url-add-variant').val();

    if (typeof colorId === 'undefined' || typeof sizeId === 'undefined') {
        Swal.fire({
            icon: 'info',
            title: 'Atención',
            text: 'Debes seleccionar el color y la talla del zapato',
        });

        $this.removeAttr('disabled');
        $this.html('<i class="fas fa-cart-plus"></i>&nbsp;Agregar al carrito');
    } else {

        $.ajax({
            url: url,
            method: 'POST',
            data: {
                quantity: quantity,
                colorId: colorId,
                sizeId: sizeId,
                "_token": token
            },
            success: function (response) {

                if (response.success){
                    Swal.fire(
                        'Producto agregado',
                        'El producto se agrego correctamente a tu carrito de compras',
                        'success'
                    );
                } else {
                    Swal.fire(
                        'Atención',
                        response.message,
                        'info'
                    );
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
                $this.removeAttr('disabled');
                $this.html('<i class="fas fa-cart-plus"></i>&nbsp;Agregar al carrito');
            }
        });

    }

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
            console.log(response);
            const sizes = response.data;
            $sizeList.html('');
            $('.images-slider').slick('unslick');
            $('.images-slider').html('');
            if(sizes.length > 0){

                sizes.forEach(function (item) {

                    let sizeElement =
                        $('<div class="col-2 text-center">' +
                            '   <h4><span class="badge badge-primary" data-id="'+item.size.id+'">'+item.size.value+'</span></h4>' +
                           '</div>');

                    $sizeList.append(sizeElement);
                });

            const images = sizes[0].variant_images;

                images.forEach(function (item) {

                    let element =
                        $('<div class="cursor-pointer btn-thumbnail"' +
                            'data-url="'+item.absolute_image_url+'">' +
                            '<div class="variant-thumbnail mx-auto"' +
                            'style="background-image: url('+item.absolute_image_url+'); background-size: contain;' +
                            '   background-repeat: no-repeat;' +
                            '   background-position: center center;' +
                            '   border: 1px solid lightgray;' +
                            '   border-radius: 16px;' +
                            '   height: 128px;' +
                            '   width: 128px;"></div>' +
                            '</div>');

                    $('.images-slider').append(element);
                    $('.variant-image').attr('src', item.absolute_image_url);

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
