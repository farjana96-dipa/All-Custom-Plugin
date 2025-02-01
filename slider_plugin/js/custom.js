

jQuery(document).ready(function($) {
    $('.owl-carousel.event-row').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    autoplay:true,
    autoplayTimeout:3500,
    dots: false,              // Show dots for pagination
    navText: ["<i class='fa-solid fa-arrow-left-long'></i>", "<i class='fa-solid fa-arrow-right-long'></i>"], 
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1200:{
            items:3
        },
        1400:{
            items:3
        }
        
    }
    });
    });