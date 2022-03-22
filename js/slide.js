'use strict';

$('.top_slide').slick({
  slidesToShow: 2,
  slidesToScroll: 1,
  autoplay: true,
  infinite : true,
  autoplaySpeed: 1000,
  speed: 1000,
  arrows: false,
  dots: true,
  pauseOnHover: false,
  pauseOnFocus: false,
  responsive: [{
    breakpoint: 576,
    settings: {
      fade: true,
      slidesToShow: 1,
    }
  }]
});


$('.lineup_slide').slick({
  slidesToShow: 3,
  slidesToScroll: 3,
  autoplay: true,
  infinite : true,
  autoplaySpeed: 1000,
  speed: 1000,
  arrows: true,
  centerMode: true,
  responsive: [{
    breakpoint: 576,
    settings: {
      slidesToShow: 2,
      centerMode: true,
    }
  }]
});