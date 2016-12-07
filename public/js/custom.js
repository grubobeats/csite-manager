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


/**
 * Donation form
 */


$('.input-cart-number').on('keyup change', function(){
    $t = $(this);

    if ($t.val().length > 3) {
        $t.next().focus();
    }

    var card_number = '';
    $('.input-cart-number').each(function(){
        card_number += $(this).val() + ' ';
        if ($(this).val().length == 4) {
            $(this).next().focus();
        }
    })

    var raw_card_number_holder = $('#card-number-clean');
    var raw_card_number = card_number.replace(/ /g, '');

    raw_card_number_holder.val(raw_card_number);

    $('.credit-card-box .number').html(card_number);
});

$('#card-holder').on('keyup change', function(){
    $t = $(this);
    $('.credit-card-box .card-holder div').html($t.val());
});

$('#card-holder').on('keyup change', function(){
    $t = $(this);
    $('.credit-card-box .card-holder div').html($t.val());
});

$('#card-expiration-month, #card-expiration-year').change(function(){
    m = $('#card-expiration-month option').index($('#card-expiration-month option:selected'));
    m = (m < 10) ? '0' + m : m;
    y = $('#card-expiration-year').val().substr(2,2);
    $('.card-expiration-date div').html(m + '/' + y);
})

$('#card-ccv').on('focus', function(){
    $('.credit-card-box').addClass('hover');
}).on('blur', function(){
    $('.credit-card-box').removeClass('hover');
}).on('keyup change', function(){
    $('.ccv div').html($(this).val());
});


/*--------------------
 CodePen Tile Preview
 --------------------*/
setTimeout(function(){
    $('#card-ccv').focus().delay(1000).queue(function(){
        $(this).blur().dequeue();
    });
}, 500);

/*function getCreditCardType(accountNumber) {
 if (/^5[1-5]/.test(accountNumber)) {
 result = 'mastercard';
 } else if (/^4/.test(accountNumber)) {
 result = 'visa';
 } else if ( /^(5018|5020|5038|6304|6759|676[1-3])/.test(accountNumber)) {
 result = 'maestro';
 } else {
 result = 'unknown'
 }
 return result;
 }

 $('#card-number').change(function(){
 console.log(getCreditCardType($(this).val()));
 })*/

$('#donate-us').click(function(){
    // $('#donation-form').css('display', 'block');
    $('#donation-form').fadeIn('slow');
});

