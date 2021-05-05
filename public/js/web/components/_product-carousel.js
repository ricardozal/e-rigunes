$(document).ready(function () {
    $('.owl-carousel.owl-products').owlCarousel({
        loop: false,
        margin: 10,
        dots: false,
        nav: true,
        responsive:{
            0:{
                items: 1
            },
            575:{
                items: 2
            },
            768:{
                items: 3
            },
            992:{
                items: 4
            },
            1200:{
                items: 4
            }
        }
    });
});
