$(window).load(function(){
  height = $(".navbar-wrapper").height();
});

// height = 0;

scroll = function (){
  if ($(window).scrollTop() >= height){
    $("nav").addClass("navbar-fixed-top");
    $(".navbar-brand img").addClass("logo");
  } else {
    $("nav").removeClass("navbar-fixed-top");
    $(".navbar-brand img").removeClass("logo");
  }
};

$(document).scroll(scroll);

$(window).resize(scroll);
