$(window).load(function(){
  height = $(".navbar-wrapper").height();
  $(document).scroll(scroll);
  $(window).resize(scroll);
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

$('#trigger').on('click', function(){
  $('#donate').slideToggle();
});
Stripe.setPublishableKey('pk_test_M9SVdeGO1qJ5O62WnWuNMggY');
jQuery(function($) {
  $('#donation-form').submit(function(event) {
    var $form = $(this);

    // Disable the submit button to prevent repeated clicks
    $form.find('button').prop('disabled', true);

    Stripe.card.createToken($form, stripeResponseHandler);

    // Prevent the form from submitting with the default action
    return false;
  });
});
function stripeResponseHandler(status, response) {
  var $form = $('#donation-form');

  if (response.error) {
    // Show the errors on the form
    $form.find('.payment-errors').text(response.error.message);
    $form.find('button').prop('disabled', false);
  } else {
    // response contains id and card, which contains additional card details
    var token = response.id;
    // Insert the token into the form so it gets submitted to the server
    $form.append($('<input type="hidden" name="stripeToken" />').val(token));
    // and submit
    $form.get(0).submit();
  }
}