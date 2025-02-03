/**
 *
 * This file contains all theme JS functions
 *
 * @package 
--------------------------------------------------------------
                   Contents
--------------------------------------------------------------
 * 01 -  Home Slider
 * 02 -  Categories Slider 
 * 03 -  New Arrival Slider   
 * 04 -  Branding Slider
 * 05 -  Best Product Slider
 * 06 -  Testimonial three Slider
 * 07 -  Client Slider 
 * 08 -  Tiny Payment Slider
  
--------------------------------------------------------------*/

(function ($) {
    "use strict";

/*============ Home Slider ============*/
$('.home-three-for-slider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: '.home-three-nav-slider', 
  autoplay: true,
  autoplaySpeed: 3000,
});

$('.home-three-nav-slider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: '.home-three-for-slider',
  autoplay: true,
  dots: true,
  autoplaySpeed: 3000,
});

/*============ Categories Slider ============*/
$('.categories-three-autoplay').slick({
    slidesToShow: 5,
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
          arrows: false,
          infinite: false,
          slidesToShow: 4,
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

/*============ New Arrival Slider ============*/
$('.new-arrival-autoplay').slick({
  slidesToShow: 4,
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
        arrows: false,
        infinite: false,
        slidesToShow: 3,
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

$('a[data-bs-toggle="pill"]').on('shown.bs.tab', function (e) {
  $('.new-arrival-autoplay').slick('refresh');
});

/*============ Branding Slider ============*/
$('.branding-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  autoplaySpeed: 3000,
  asNavFor: '.branding-nav'
});
$('.branding-nav').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.branding-for',
  dots: false,
  arrows: true,
  focusOnSelect: true,
  prevArrow: '<button type="button" class="slick-prev"><i class="flaticon-left-arrow-1"></i></button>',
  nextArrow: '<button type="button" class="slick-next"><i class="flaticon-right-arrow-1"></i></button>',
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
          slidesToShow: 2,
          slidesToScroll: 1
      }
      }  
  ]
});

/*============ Best Product Slider ============*/
$('.best-product-three-autoplay').slick({
  slidesToShow: 4,
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
        arrows: false,
        infinite: false,
        slidesToShow: 3,
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

$('a[data-bs-toggle="pill"]').on('shown.bs.tab', function (e) {
  $('.best-product-three-autoplay').slick('refresh');
});

/*============ Testimonial three Slider ============*/
$('.testimonial-three-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  autoplaySpeed: 2000,
  asNavFor: '.testimonial-three-nav'
});
$('.testimonial-three-nav').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.testimonial-three-for',
  dots: false,
  arrows: true,
  focusOnSelect: true,
  prevArrow: '<button type="button" class="slick-prev"><i class="flaticon-left-arrow-1"></i></button>',
  nextArrow: '<button type="button" class="slick-next"><i class="flaticon-right-arrow-1"></i></button>',
  responsive: [
      {
        breakpoint: 1100,
        settings: {
          dots: false,
          arrows: false,
          infinite: false,
          slidesToShow: 3,
          slidesToScroll: 1
      }
      },
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
          slidesToShow: 3,
          slidesToScroll: 1
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
$('.tiny-payment-three-autoplay').slick({
  slidesToShow: 5,
  slidesToScroll: 1,
  autoplay: true,
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
        slidesToShow: 5,
        slidesToScroll: 1
    }
    }  
  ]
});

})(jQuery);