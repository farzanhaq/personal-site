$(document).ready(function () {
    $('.scroll-to-about').click(function () {
        $('html, body').animate({
            scrollTop: $('#about').offset().top
        }, 1000);
    });
});