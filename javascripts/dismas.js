var ready;
ready = function() {

};

scroll = function (){
  var height = $("nav").height();

  if ($(window).scrollTop() >= height){
    $("nav").addClass("navbar-fixed-top").height( 100 );
    $(".navbar-brand img").addClass("logo");
    console.log("WORKING");
  } else {
    $("nav").removeClass("navbar-fixed-top").height( 235 );
    $(".navbar-brand img").removeClass("logo");
  }
};

$(document).scroll(scroll);
$(document).ready(ready);
$(document).on('page:load', ready);
