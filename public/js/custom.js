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
