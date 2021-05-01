$(document).ready(function () {
    $('.owl-carousel.owl-catalogue').owlCarousel({
        loop: false,
        margin: 10,
        dots: true,
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
                items: 5
            },
            1200:{
                items: 5
            }
        }
    });
});
