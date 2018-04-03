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

$("#user-menu .dropdown-item-has-children").hover(function(){
    var element = $(this).find('ul');
    if (!$(this).hasClass('sub-menu-active')) {
        $(this).toggleClass('sub-menu-active');
        $(element).show("slow"); 
    }
});

$("#user-menu .dropdown-item-has-children").mouseleave(function(){
    var element = $(this).children();
    if ($(this).hasClass('sub-menu-active')) {
        $(this).removeClass('sub-menu-active');
        $(element).hide("slow");
    }
});

$(function () {
    $.scrollUp({
        scrollImg: true
      });
  });