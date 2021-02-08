"use strict";

$('#inputGroupSelect03 .optgroub').css({
  "display": "none"
});
$('#inputGroupSelect01').change(function () {
  console.log('value: ' + $(this).val());
  $v = $(this).val();
  $("#inputGroupSelect03").each(function () {
    $('#inputGroupSelect03 .optgroub').css({
      "display": "none"
    });
    $('.optgroub[value = ' + $v + ']').css({
      "display": "block"
    });
  });
});