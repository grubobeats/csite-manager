$('#get-link').click(function(e){
    var link = $(this).data('link');

    $('.data-holder a').attr('href', link).attr('target', '_blank').text(link);

    $('.data-holder').show('slow')
});

$('.close-info').click(function(){
    $('.data-holder').hide('slow');
});