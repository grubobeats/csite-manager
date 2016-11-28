$('#get-link').click(function(e){
    var link = $(this).data('link');

    $('.get-link-here a').attr('href', link).attr('target', '_blank').text(link);

    $('.get-link-here').show('slow')
});

$('#send-email').click(function(e){
    var link = $(this).data('link');

    $('.send-email').show('slow')
});

$('.close-info').click(function(){
    $('.data-holder').hide('slow');
});

$('.haveLoader').click(function(event){
  // event.preventDefault();
  var target = $( event.target );
  var html = '<i class="fa fa-cog fa-spin fa-fw"></i> ';

  if ( target.is( "button, a" ) ) {
    target.html(html);
  }

  if ( target.is( "input" ) ) {
    target.val('Loading...');
  }

  $(this).addClass('avoid-clicks').html(html);

});


/**
 * Stripe integration
 */


$(function() {
  var $form = $('#payment-form');
  $form.submit(function(event) {
    // Disable the submit button to prevent repeated clicks:
    $form.find('.submit').prop('disabled', true);

    // Request a token from Stripe:
    Stripe.card.createToken($form, stripeResponseHandler);

    // Prevent the form from being submitted:
    return false;
  });
});


function stripeResponseHandler(status, response) {
  // Grab the form:
  var $form = $('#payment-form');

  if (response.error) { // Problem!

    // Show the errors on the form:
    $form.find('.payment-errors').text(response.error.message);
    $form.find('.submit').prop('disabled', false); // Re-enable submission

  } else { // Token was created!

    // Get the token ID:
    var token = response.id;
    // alert('token is: ' + token);

    // Insert the token ID into the form so it gets submitted to the server:
    // $form.append($('<input type="hidden" name="stripeToken">').val(token));
    $('#stripeToken').val(token);

    // Submit the form:
    $form.get(0).submit();
  }
};
