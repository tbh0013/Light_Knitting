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
  // appendArrows: '.top_slide_nav_inner',
  // prevArrow: '<img src="./img/left_arrow.png" class="slick-prev">',
  // nextArrow: '<img src="./img/right_arrow.png" class="slick-next">',
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
  // prevArrow: '<img src="./img/left_arrow.png" class="lineup_prev">',
  // nextArrow: '<img src="./img/right_arrow.png" class="lineup_next">',
  responsive: [{
    breakpoint: 576,
    settings: {
      slidesToShow: 1,
      centerMode: true,
    }
  }]
});