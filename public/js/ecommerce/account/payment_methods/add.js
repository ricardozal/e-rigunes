$(document).ready(function () {

    let pk = $('#pk-stripe').val();

    let stripe = Stripe(pk);
    var elements = stripe.elements({
        locale: 'es',
    });

    let cardElement = elements.create('card');
    cardElement.mount('#card-element');

    cardElement.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = "Verifica tus datos";
        } else {
            displayError.textContent = '';
        }
    });

    let cardholderName = document.getElementById('holder-name');
    let cardButton = document.getElementById('card-button');

    cardButton.addEventListener('click', function(ev){
        ev.preventDefault();

        if(cardholderName.value === ''){

            makeMessage('info', 'Atención', 'Debes llenar todos los campos')

        } else {
            $('.form-card').addClass('d-none');

            let $loading =  formTools._makeLoading();

            $('#form-content').append($loading);

            validateAndGetIntent(function (response) {
                Swal.fire({
                    icon: 'success',
                    title: '¡Listo!',
                    text: 'Tarjeta agregada con éxito'
                }).then(()=>{
                    window.location.href = $('#inp-url-personal-data').val();
                });
            }, function () {
                $loading.remove();
                $('.form-card').removeClass('d-none');
            });
        }

    });

    function validateAndGetIntent(cbSuccess, cbError) {
        var url = $('#inp-url-intent').val();
        $.get(url, (responseIntent) => {
            if (responseIntent.success === true) {
                var secretClient = responseIntent.data;
                completeCreateCart(secretClient, cbSuccess, cbError);
            } else {
                cbError();
                makeMessage('error', 'Error al guardar la tarjeta', responseIntent.message);
            }
        });
    }

    function completeCreateCart(clientSecret, cbSuccess, cbError) {

        stripe.confirmCardSetup(
            clientSecret,
            {
                payment_method: {
                    card: cardElement,
                    billing_details: {
                        name: cardholderName.value,
                    },
                },
            }
        ).then(function (result) {
            if (result.error) {
                console.log(result);
                cbError();
                makeMessage('error', 'Error al procesar el pago', 'Verifique los datos de su tarjeta')
            }else{
                let payment_method = result.setupIntent.payment_method;
                completeSaving(payment_method,cbSuccess, cbError);
            }
        });

    }

    function completeSaving(payment_method,cbSuccess, cbError) {
        let url = $('#inp-url-create-post').val();
        let _token = $('#inp-url-token').val();

        $.ajax({
            url: url,
            method: "POST",
            data: {
                _token : _token,
                payment_method : payment_method,
                holder_name: cardholderName.value
            },
            success: function (response) {
                if(response.success){
                    cbSuccess(response);
                } else {
                    cbError();
                    makeMessage('error', 'Error al registrar la tarjeta', response.message);
                }
            },
            error: function (response) {
                cbError();
                makeMessage('error', 'Error al registrar la tarjeta', response.message);
            }
        });

    }

    function makeMessage(icon, message, text) {
        Swal.fire({
            icon: icon,
            title: message,
            text: text,
            allowOutsideClick: false
        })
    }

});
