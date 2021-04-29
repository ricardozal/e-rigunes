$(document).ready(function () {
    $('.owl-carousel.owl-products').owlCarousel({
        loop: false,
        margin: 10,
        dots: true,
        nav: true,
        // navText : ['<i class="fa fa-lg fa-angle-left " aria-hidden="true"></i>','<i class="fa fa-lg fa-angle-right" aria-hidden="true"></i>'],
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
