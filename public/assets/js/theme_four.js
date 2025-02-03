/**
 *
 * This file contains all theme JS functions
 *
 * @package 
--------------------------------------------------------------
                   Contents
--------------------------------------------------------------
 * 01 - Home Slider
 * 02 - Trending Slider      
 * 03 - Featured Autoplay Slider
 * 04 - Partners Slider
 * 05 - Testimonial Img Slider
 * 06 - Testimonial dtls Slider 
 * 07 - Tiny Payment Slider
  
--------------------------------------------------------------*/

(function ($) {
    "use strict";

/*============ Home Slider ============*/

$('.home-autoplay-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    dots: true,
    customPaging : function(slider, i) {
        var thumb = $(slider.$slides[i]).data();
    
          return (i + 1);
                },
    arrows: false,
    autoplaySpeed: 3000,
});

/*============ Trending Slider ============*/

$('.trending-autoplay').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    dots: true,
    arrows: false,
    autoplaySpeed: 3000,
    responsive: [
        { 
        breakpoint: 1100,
        settings: {
            dots: true,
            arrows: false,
            infinite: false,
            slidesToShow: 3,
            slidesToScroll: 1
        }
        },
        {
        breakpoint: 991,
        settings: {
            dots: true,
            arrows: false,
            infinite: false,
            slidesToShow: 2,
            slidesToScroll: 1
        }
        },
        {
        breakpoint: 767,
        settings: {
            dots: true,
            arrows: false,
            infinite: false,
            slidesToShow: 1,
            slidesToScroll: 1
        }
        }  
    ]
});

/*============ Featured Autoplay Slider ============*/
$('.featured-autoplay-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    dots: true,
    arrows: false,
    autoplaySpeed: 3000,
    responsive: [
        { 
        breakpoint: 1100,
        settings: {
            dots: false,
            arrows: false,
            infinite: false,
            slidesToShow: 2,
            slidesToScroll: 2
        }
        },
        {
        breakpoint: 992,
        settings: {
            dots: false,
            arrows: false,
            infinite: false,
            slidesToShow: 2,
            slidesToScroll: 2
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

$('a[data-bs-toggle="pill"]').on('shown.bs.tab', function (e) {
    $('.featured-autoplay-slider').slick('refresh');
});

/*============ Partners Slider ============*/
$('.partners-autoplay').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    dots: false,
    arrows: false,
    autoplaySpeed: 3000,
    responsive: [
        { 
        breakpoint: 1100,
        settings: {
            dots: false,
            arrows: false,
            infinite: false,
            slidesToShow: 2,
            slidesToScroll: 2
        }
        },
        {
        breakpoint: 992,
        settings: {
            dots: false,
            arrows: false,
            infinite: false,
            slidesToShow: 2,
            slidesToScroll: 2
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

/*============ Testimonial Img Slider ============*/
$('.testimonial-img-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.testimonial-dtls-slider', 
    autoplay: true,
    autoplaySpeed: 3000,
});

/*============ Testimonial dtls Slider ============*/
$('.testimonial-dtls-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.testimonial-img-slider',
    autoplay: true,
    dots: true,
    autoplaySpeed: 3000,
});

/*============ Tiny Payment Slider ============*/
$('.tiny-payment-autoplay').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    autoplay: true,
    dots: false,
    arrows: false,
    autoplaySpeed: 3000,
});

document.addEventListener('touchmove', function(event) {
    if (event.cancelable) {
        event.preventDefault();
    }
});

})(jQuery);