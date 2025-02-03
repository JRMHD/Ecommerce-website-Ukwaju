/**
 *
 * This file contains all theme JS functions
 *
 * @package 
--------------------------------------------------------------
                   Contents
--------------------------------------------------------------
 * 01 -  Home Product One Slider
 * 02 -  Navbar Autoplay        
 * 03 -  Shop Slider
 * 04 -  Blog Slider

--------------------------------------------------------------*/

(function ($) {
    "use strict";

/*============ Home Slider ============*/
$('.home-slider-autoplay').slick({
    slidesToShow: 1,
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
            slidesToShow: 1,
            slidesToScroll: 1
        }
        },
        {
        breakpoint: 991,
        settings: {
            dots: false,
            arrows: false,
            infinite: false,
            slidesToShow: 1,
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

/*============ Home Product One Slider ============*/
$('.home-product-one-autoplay').slick({
    slidesToShow: 1,
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
            slidesToShow: 1,
            slidesToScroll: 1
        }
        },
        {
        breakpoint: 991,
        settings: {
            dots: true,
            arrows: false,
            infinite: false,
            slidesToShow: 1,
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

/*============ Navbar Autoplay ============*/
$('.navbar-autoplay').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    autoplaySpeed: 3000,
    responsive: [
        {
        breakpoint: 991,
        settings: {
            dots: false,
            arrows: false,
            infinite: false,
            slidesToShow: 3,
            slidesToScroll: 1
        }
        },
        {
        breakpoint: 767,
        settings: {
            dots: false,
            arrows: false,
            infinite: false,
            slidesToShow: 2,
            slidesToScroll: 1
        }
        }  
    ]
});

/*============ Shop Slider ============*/
$('.shop-slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    autoplaySpeed: 2000,
    asNavFor: '.shop-slider-nav'
});
$('.shop-slider-nav').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    asNavFor: '.shop-slider-for',
    dots: false,
    arrows: false,
    focusOnSelect: true,
    responsive: [
        {
        breakpoint: 991,
        settings: {
            dots: false,
            arrows: false,
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 1
        }
        },
        {
        breakpoint: 767,
        settings: {
            dots: false,
            arrows: false,
            infinite: false,
            slidesToShow: 3,
            slidesToScroll: 1
        }
        }  
    ]
});

/*============ Blog Slider  ============*/
$('.blog-slider-img').slick({
    arrows: true,       
    autoplay: true,
    autoplaySpeed: 3000,
    prevArrow: '<button type="button" class="slick-prev"><i class="flaticon-left-arrow-1"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="flaticon-right-arrow-1"></i></button>'
});


// When the modal is shown, refresh the Slick slider
$('.dealsproductModal').on('shown.bs.modal', function () {
    $('.shop-slider-for').slick('setPosition');
    $('.shop-slider-nav').slick('setPosition');
});


document.addEventListener('touchmove', function(event) {
    if (event.cancelable) {
        event.preventDefault();
    }
});

})(jQuery);