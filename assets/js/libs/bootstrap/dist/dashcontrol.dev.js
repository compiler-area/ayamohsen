"use strict";

$(document).ready(function () {
  $('canvas').fadeOut();
  $('.government').fadeOut();
  $('.area').fadeOut();
  $('.apartment').fadeOut();
  $('.room').fadeOut();
  $('.beds').fadeOut();
  $('.booking').fadeOut(); // $('.edit').fadeOut();

  $('.add-government').fadeOut();
  $('.add-area').fadeOut();
  $('.add-apartment').fadeOut();
  $('.add-room').fadeOut();
  $('.add-beds').fadeOut();
  $('.sidebar-sticky .nav-link').on("click", function () {
    // console.log($(this).data('to'));
    $('.all_inside').fadeOut();
    $('.government').fadeOut();
    $('.area').fadeOut();
    $('.apartment').fadeOut();
    $('.room').fadeOut();
    $('.beds').fadeOut();
    $('.booking').fadeOut(); // $('.edit').fadeOut();

    $('.add-government').fadeOut();
    $('.add-area').fadeOut();
    $('.add-apartment').fadeOut();
    $('.add-room').fadeOut();
    $('.add-beds').fadeOut();
    $('.' + $(this).data('to')).fadeIn();
  });
});