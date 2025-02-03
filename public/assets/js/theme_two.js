/**
 *
 * This file contains all theme JS functions
 *
 * @package 
--------------------------------------------------------------
                   Contents
--------------------------------------------------------------
 * 01 -  Home Slider
 * 02 -  Modern Product Slider      
 * 03 -  Trending Product Slider
 * 04 -  Tiny Payment Slider

--------------------------------------------------------------*/

(function ($) {
    "use strict";

/*============ Home Slider ============*/
$(document).ready(function(){
    // Initialize Slick Slider
    $('.home-autoplay-slider').slick({
        dots: false,
        arrows: false,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000
    });
    
    // Function to update line animation
    function updateLineAnimation(progress) {
        $('.nav-line').css('transform', `scaleX(${progress})`);
    }
    
    // Update custom navigation and line
    $('.home-autoplay-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide){
        // Format the slide number to always have 2 digits
        let formattedNumber = String(nextSlide + 1).padStart(2, '0');
        $('.current-slide').text(formattedNumber);
        
        // Calculate progress for line animation
        let totalSlides = slick.slideCount;
        let progress = (nextSlide + 1) / totalSlides;
        updateLineAnimation(progress);
        
        // Update active state
        if(nextSlide === 0) {
            $('.nav-number').addClass('active');
        } else {
            $('.nav-number').removeClass('active');
        }
    });
    
    // Initialize line animation
    updateLineAnimation(1/3); // For first slide
    
    // Click handlers for custom navigation
    $('.nav-number').click(function(){
        $('.home-autoplay-slider').slick('slickGoTo', 0);
    });
    
    $('.current-slide').click(function(){
        let currentSlide = $('.home-autoplay-slider').slick('slickCurrentSlide');
        let nextSlide = (currentSlide + 1) % $('.home-autoplay-slider').slick('getSlick').slideCount;
        $('.home-autoplay-slider').slick('slickGoTo', nextSlide);
    });
});

/*============ Modern Product Slider ============*/
$('.modern-product-autoplay').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    dots: true,
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

/*============ Trending Product Slider ============*/
$('.trending-product-autoplay').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    dots: true,
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

$('a[data-bs-toggle="pill"]').on('shown.bs.tab', function (e) {
    $('.trending-product-autoplay').slick('refresh');
});

/*============ Modern Product Slider ============*/
$('.product-slider-two-autoplay').slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    autoplay: true,
    dots: true,
    autoplaySpeed: 3000,
    responsive: [
        { 
        breakpoint: 1100,
        settings: {
            dots: true,
            arrows: false,
            infinite: false,
            slidesToShow: 6,
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

/*============ Tiny Payment Slider ============*/
$('.tiny-two-payment-autoplay').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    autoplay: true,
    dots: false,
    arrows: false,
    autoplaySpeed: 3000,
});


})(jQuery);