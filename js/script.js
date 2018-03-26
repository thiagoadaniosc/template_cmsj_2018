$(window).load(function() {
    $(".loader").fadeOut("slow");
});

$( ".menu-item-has-children" ).click(function() {
    var elementID = '#' + $(this).attr('id') + ' > .sub-menu';
    if ($(this).hasClass('sub-menu-active')) {
        $(elementID).hide("slow");
        $(this).removeClass('sub-menu-active');
    } else {
        $(this).toggleClass('sub-menu-active');
        $(elementID).show("slow"); 
    }
});