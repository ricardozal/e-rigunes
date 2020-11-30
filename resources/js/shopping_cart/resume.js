import React from 'react';
import ReactDOM from 'react-dom';
import ShoppingCart from "./ShoppingCart";
import ShoppingCartPopover from "./ShoppingCartPopover";

$(document).ready(() => {

    let rootNode = document.getElementById("pop-cart");
    let rootShoppingCartPopover = document.getElementById("shopping-popover");
    const isShopping = document.getElementById("inp-shopping-cart");

    let showedCart = false;

    initShoppingView();

    //React
    $(".btn-cart").on("click", (e) => {
        makeShoppingCartPopover();
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
        if (showedCart) {
            divCard.removeClass("d-block");
            showedCart = false;
        } else {
            showedCart = true;
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
