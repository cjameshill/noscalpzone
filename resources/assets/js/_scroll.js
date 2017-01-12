$(document).ready(function () {

    $(window).scroll(function(){
        if($(window).scrollTop() >= 150) {
            $('nav.nav').addClass('reduce');
        } else {
            $('nav.nav').removeClass('reduce');
        }
    });

});