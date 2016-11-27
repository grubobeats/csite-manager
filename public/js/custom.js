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
