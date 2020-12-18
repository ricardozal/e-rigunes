import React from 'react';
import ReactDOM from 'react-dom';
import ShoppingCart from "./ShoppingCart";
import ShoppingCartPopover from "./ShoppingCartPopover";

$(document).ready(() => {

    let rootNode = document.getElementById("pop-cart");
    let rootShoppingCartPopover = document.getElementById("shopping-popover");
    const isShopping = document.getElementById("inp-shopping-cart");

    initShoppingView();

    //React
    $(".btn-cart").on("click", (e) => {
        makeShoppingCartPopover();
    });

    $("#btn-add-variant").on("click", (e) => {
        let $this = document.getElementById("btn-add-variant");
        $this.setAttribute('disabled', 'disabled');
        $this.innerHTML = '<i class="fas fa-spinner fa-spin"></i>&nbsp;Agregando...';

        let quantity = $('#quantity').val();
        let variantId = $('.selected-size').attr('data-id');
        let token = $('#token').val();

        let url = $('#inp-url-add-variant').val();

        if (typeof variantId === 'undefined') {
            Swal.fire({
                icon: 'info',
                title: 'Atención',
                text: 'Debes seleccionar el color y la talla del zapato',
            });

            $this.removeAttribute('disabled');
            $this.innerHTML = '<i class="fas fa-cart-plus"></i>&nbsp;Agregar al carrito';
        } else {

            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    quantity: quantity,
                    variantId: variantId,
                    "_token": token
                },
                success: function (response) {

                    if (response.success){
                        Swal.fire({
                            title: 'Producto agregado',
                            text: "El producto se agrego correctamente a tu carrito de compras",
                            icon: 'success',
                            showCancelButton: false,
                            allowEscapeKey: false,
                            allowOutsideClick: false,
                        }).then((result) => {
                            makeShoppingCartPopover();
                        });
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
                    $this.removeAttribute('disabled');
                    $this.innerHTML = '<i class="fas fa-cart-plus"></i>&nbsp;Agregar al carrito';
                }
            });

        }
    });

    function initShoppingView() {
        if (isShopping === undefined || isShopping === null) return;
        $(".btn-cart").css({"visibility": "hidden"});
        $("#modal-pop-cart").remove();
        rootNode = document.getElementById("pop-cart");
        mountShoppingCart();
    }

    function makeShoppingCartPopover(){
        const divCard = $('#shopping-popover');
        ReactDOM.unmountComponentAtNode(rootShoppingCartPopover);
        if (divCard.hasClass("d-block")) {
            divCard.removeClass("d-block");
        } else {
            divCard.addClass("d-block");
            ReactDOM.render(
            <ShoppingCartPopover/>,
                rootShoppingCartPopover
        );
        }
    }

    function mountShoppingCart() {
        ReactDOM.unmountComponentAtNode(rootNode);
        ReactDOM.render(
        <ShoppingCart/>,
            rootNode
    );
    }

});
