const onScroll = () => {
$(window).scroll(function(){

    if (window.screen.width > 768)
    {
        $('nav').toggleClass('scrolled', $(this).scrollTop() > 750)
    $('nav a').toggleClass('scrolled', $(this).scrollTop() > 750)
    $('.nav_links').toggleClass('scrolled', $(this).scrollTop() > 750)
    $('.burger div').toggleClass('scrolled', $(this).scrollTop() > 750)
    $('.upbutton a').toggleClass('show', $(this).scrollTop() > 750)
    }
    else
    {
        $('nav').toggleClass('scrolled', $(this).scrollTop() > 80)
        $('nav a').toggleClass('scrolled', $(this).scrollTop() > 80)
        $('.nav_links').toggleClass('scrolled', $(this).scrollTop() > 80)
        $('.burger div').toggleClass('scrolled', $(this).scrollTop() > 80)
        $('.upbutton a').toggleClass('show', $(this).scrollTop() > 80)
    }

});
}
onScroll();