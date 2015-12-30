var ready;
ready = function() {

};

scroll = function (){
  var height = $("nav").height();

  if (screen.width > 600) {
    if ($(window).scrollTop() >= height){
      $("nav").addClass("navbar-fixed-top").height( 85 );
      $(".navbar-brand img").addClass("logo");
      console.log("WORKING");
    } else {
      $("nav").removeClass("navbar-fixed-top").height( 235 );
      $(".navbar-brand img").removeClass("logo");
    }
  }
  
};

$(document).scroll(scroll);
$(document).ready(ready);
$(document).on('page:load', ready);
