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

})(jQuery);