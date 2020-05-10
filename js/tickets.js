$(document).ready(function(){
    $('.loading').fadeOut('slow');

    $('#stadium g *').on('mouseover', function(){
        $(this).tooltip('show');
    });

    $('#stadium g *').on('mouseout', function(){
        $(this).tooltip('hide');
    });
});