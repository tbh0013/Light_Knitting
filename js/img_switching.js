'use strict';

$(function() {
  $('.sub_pic img').on('click', function() {
    var img = $(this).attr('src');
    console.log(img);
    $('.sub_pic li').removeClass('current');
    $(this).parent().addClass('current');
    $('.main_pic img').fadeTo(500,0, function(){
      $('.main_pic img').attr('src', img).on('load', function(){
        $(this).fadeTo(500,1);
      })
    })
  });
});