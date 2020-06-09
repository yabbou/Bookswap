
// Code By Webdevtrick ( https://webdevtrick.com )

"use strict";
var underlineMenuItems = document.querySelectorAll(".nav li");
underlineMenuItems[0].classList.add("active");

underlineMenuItems.forEach(function (item) {
    item.addEventListener("click", function () {
        underlineMenuItems.forEach(function (item) {
            return item.classList.remove("active");
        });
    });
});

//this.classList.add("active");

//try 2
//var active = $( ".selector" ).tabs( "option", "active" );
// $( ".selector" ).tabs( "option", "active", 1 );

//try 3

//$(document).ready(function () {
//    $(".nav li").click(function (event) {
//        
//        var $this = $(this);
//        $(".nav li").removeClass("active");
//        $this.removeClass('active');
//        $($this).addClass("active");
//    });
//});
