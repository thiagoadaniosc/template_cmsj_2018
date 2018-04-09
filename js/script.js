$(window).load(function() {
    $(".loader").fadeOut("slow");
    $('.menu-item-has-children').toggleClass('menu-item-has-children-disable');
});

$( ".menu-item-has-children" ).click(function() {
    var elementID = '#' + $(this).attr('id') + ' > .sub-menu';
    if ($(this).hasClass('sub-menu-active')) {
        $(elementID).hide("slow");
        $(this).removeClass('sub-menu-active');
        $(this).removeClass('menu-item-has-children-active');
        $(this).toggleClass('menu-item-has-children-disable');
    } else {
        $(this).toggleClass('sub-menu-active');
        $(this).toggleClass('menu-item-has-children-active');
        $(this).removeClass('menu-item-has-children-disable');
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
  /*

$(".header-logo").hover(function(){
    $(this).addClass('pulse animated');
      console.log('Hover');
});

$(".header-logo").mouseleave(function(){
    $(this).removeClass('pulse animated');
    console.log('Hover');
});
  */