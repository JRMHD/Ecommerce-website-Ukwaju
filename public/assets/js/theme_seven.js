/**
 *
 * This file contains all theme JS functions
 *
 * @package 
--------------------------------------------------------------
                   Contents
--------------------------------------------------------------
 * 01 -  Testimonial Slider         
  
--------------------------------------------------------------*/

(function ($) {
    "use strict";

/*============ Testimonial Slider ============*/
$('.testimonial-seven-autoplay').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    dots: false,
    arrows: true,
    autoplaySpeed: 3000,
    prevArrow: '<button type="button" class="slick-prev"><i class="flaticon-left-chevron"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="flaticon-chevron"></i></button>',
    responsive: [
        { 
        breakpoint: 1100,
        settings: {
            dots: false,
            arrows: true,
            infinite: false,
            slidesToShow: 2,
            slidesToScroll: 1
        }
        },
        {
        breakpoint: 991,
        settings: {
            dots: false,
            arrows: false,
            infinite: false,
            slidesToShow: 2,
            slidesToScroll: 1
        }
        },
        {
        breakpoint: 767,
        settings: {
            dots: false,
            arrows: false,
            infinite: false,
            slidesToShow: 1,
            slidesToScroll: 1
        }
        }  
    ]
});

})(jQuery);