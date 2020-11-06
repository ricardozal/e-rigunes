$(document).ready(function () {

    loadAddresses();

    function loadAddresses() {

        var $loading = formTools._makeLoading();
        var $addressesContainer = $('#my-addresses');
        var addresses = [];
        var url = $('#inp-url-content').val();

        $.ajax({
            type: 'GET',
            url: url,
            beforeSend: function () {
                $addressesContainer.addClass('d-none');
                $('.addresses-container').append($loading);
            },
            success: function (response) {
                $addressesContainer.html('');

                addresses = response.addresses;

                if (addresses.length !== 0) {
                    for (var i = 0; i < addresses.length; i++) {
                        var active = addresses[i].pivot.active ? 'on' : 'off';
                        var $inpUrlUpdate = $('#inp-url-update');
                        if ($inpUrlUpdate.length === 0) {
                            return '';
                        }

                        var updateUrl = $inpUrlUpdate.val();
                        updateUrl = updateUrl.replace('FAKE_ID', addresses[i].id);

                        var $inpUrlActive = $('#inp-url-active');
                        if ($inpUrlActive.length === 0) {
                            return '';
                        }

                        var activeUrl = $inpUrlActive.val();
                        activeUrl = activeUrl.replace('FAKE_ID', addresses[i].id);

                        var activeClass = $('.active-check');

                        $addressesContainer.append('<div class="row w-50 w-auto mx-md-auto my-5">\n' +
                            '                    <div class="col-12 col-md-1"><i class="active-check cursor-pointer fas fa-toggle-' + active + ' "style="color: #84A07F;" data-url="'+activeUrl+'"></i></div>\n' +
                            '                    <div class="col-12 col-md-10 font-family-2">' + addresses[i].full_address + '</div>\n' +
                            '                    <div class="col-12 col-md-1"><a href="' + updateUrl + '"><i class="far fa-edit "style="color: #84A07F;"></i></a></div>\n' +
                            '                </div>');

                    }
                } else {
                    $addressesContainer.append('<div class="w-100 text-center"><h5>No se ha registrado ninguna dirección</h5></div>');
                }
            },
            error: function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ocurrió un error al cargar las direcciones'
                })
            },
            complete: function () {
                $loading.remove();
                $addressesContainer.removeClass('d-none');
            }
        });
    }

    // activeClass.addEventListener('click',function (){
    //     if (){
    //
    //     }
    // });

    $(document).on('click','.active-check',function (){
        var url = $(this).data('url');
        //location.reload();

        $.ajax({
            type: 'GET',
            url: url,
            success : function (response){
                active = response.success;
                //console.log(active);
                location.reload();

            },
            error:function (){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ocurrió un error al cargar las direcciones'
                });
            },
            complete:function (){

            }
        });
    });
});