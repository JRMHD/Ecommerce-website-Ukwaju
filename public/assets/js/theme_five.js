/**
 *
 * This file contains all theme JS functions
 *
 * @package 
--------------------------------------------------------------
                   Contents
--------------------------------------------------------------
 * 01 -  Client Slider         
  
  

--------------------------------------------------------------*/

(function ($) {
    "use strict";

/*============ Home Slider ============*/
$('.home-five-for-autoplay').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: '.home-five-nav-autoplay', 
  autoplay: true,
  autoplaySpeed: 3000,
  responsive: [
    {
      breakpoint: 1100,
      settings: {
        arrows: false,
        slidesToShow: 1
    }
    },
    {
      breakpoint: 991,
      settings: {
        arrows: false,
        slidesToShow: 1
      }
    },
    {
      breakpoint: 767,
      settings: {
        arrows: false,
        dots: false,
        slidesToShow: 1
      }
    }
  ]
});

$('.home-five-nav-autoplay').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: '.home-five-for-autoplay',
  autoplay: true,
  dots: true,
  autoplaySpeed: 3000,
  responsive: [
    {
      breakpoint: 1100,
      settings: {
        arrows: false,
        slidesToShow: 1
    }
    },
    {
      breakpoint: 991,
      settings: {
        arrows: false,
        slidesToShow: 1
      }
    },
    {
      breakpoint: 767,
      settings: {
        arrows: false,
        dots: false,
        slidesToShow: 1
      }
    }
  ]
});

/*============ Client Slider ============*/
$('.client-slider-center-mode').slick({
    centerMode: true,
    centerPadding: '60px',
    slidesToShow: 5,
    autoplay: true,
    responsive: [
      {
        breakpoint: 1100,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 3
      }
      },
      {
        breakpoint: 991,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 3
        }
      },
      {
        breakpoint: 767,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 1
        }
      }
    ]
  });

/*============ Modern Product Slider ============*/
$('.product-slider-five-autoplay').slick({
  slidesToShow: 6,
  slidesToScroll: 1,
  autoplay: true,
  dots: true,
  autoplaySpeed: 2000,
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


})(jQuery);