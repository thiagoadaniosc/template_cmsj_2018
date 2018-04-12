$(window).load(function() {
    $(".loader").fadeOut("slow");
    $('.menu-item-has-children').toggleClass('menu-item-has-children-disable');
});

$( ".menu-item-has-children a" ).click(function() {
    var elementID = '#' + $(this).parent().attr('id') + '> .sub-menu';
    var element = '#' + $(this).parent().attr('id') + '> a';
    var element_parent = "#" + $(element).parent().attr('id');
    if ($(element).hasClass('sub-menu-active')) {
        $(element).removeClass('sub-menu-active');
        $(element_parent).removeClass('menu-item-has-children-active');
        $(element_parent).toggleClass('menu-item-has-children-disable');
        elementID = $(elementID).toArray();
        $(elementID[0]).hide("slow");
    } else {
        $(element).toggleClass('sub-menu-active');
        $(element_parent).toggleClass('menu-item-has-children-active');
        $(element_parent).removeClass('menu-item-has-children-disable');
        //$(elementID).show('slow');
        elementID = $(elementID).toArray();
        $(elementID[0]).show('slow');
     

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

$('.bg-fr-folhaweb').hover(function(){
    $img_hover = $('.img-fr-folha-web')[0].getAttribute('data-hover')
    $('.img-fr-folha-web').attr("src", $img_hover);
});

$('.bg-fr-folhaweb').mouseleave(function(){
    $src = $('.img-fr-folha-web')[0].getAttribute('data-src');
    $('.img-fr-folha-web').attr("src", $src);
});

$('.bg-fr-dom').hover(function(){
    $img_hover = $('.img-fr-dom')[0].getAttribute('data-hover')
    $('.img-fr-dom').attr("src", $img_hover);
});

$('.bg-fr-dom').mouseleave(function(){
    $src = $('.img-fr-dom')[0].getAttribute('data-src');
    $('.img-fr-dom').attr("src", $src);
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