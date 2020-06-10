// $(document).ready($(function () {
//     var $el, leftPos, newWidth, $mainNav = $("#navbar-list");

//     $mainNav.append("<li id='magic-line'></li>");
//     var $magicLine = $("#magic-line");

//     $magicLine
//         .width($(".current-nav-item").width())
//         .css("left", $(".current-nav-item a").position().left) //left?
//         .data("origLeft", $magicLine.position().left)
//         .data("origWidth", $magicLine.width());

//     $("#navbar-list li a").hover(function () {
//         $el = $(this);
//         leftPos = $el.position().left;
//         newWidth = $el.parent().width();
//         $magicLine.stop().animate({
//             left: leftPos,
//             width: newWidth
//         });
//     }, function () {
//         $magicLine.stop().animate({
//             left: $magicLine.data("origLeft"),
//             width: $magicLine.data("origWidth")
//         });
//     });
// })
// );

$(document).ready(function() {
    // cool nav menu
    $(window).on('load resize', function() {
      var $thisnav = $('.current-nav-item').offset().left;
  
      $('.nav-item').hover(function() {
        var $left = $(this).offset().left - $thisnav;
        var $width = $(this).outerWidth();
        var $start = 0;
        $('.wee').css({ 'left': $left , 'width': $width });
      }, function() {
        var $initwidth = $('.current-nav-item').width();
        $('.wee').css({ 'left': '0' , 'width': $initwidth });
      });
    });
  
  });