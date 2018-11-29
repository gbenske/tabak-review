function mobileNav() {
    $(".hamburger").click( function(){
        $("header nav").toggleClass("open");
        $(".hamburger .icon").toggleClass("cross");
    });
};

function closeMobileNav() {
   $("nav ul li a").click( function(){
        $("header nav").removeClass("open");
        $(".hamburger .icon").removeClass("cross");
    });
}

function parallax() {
    var speed = 8.0;
    document.getElementById("parallax-hero").style.backgroundPosition = (-window.pageXOffset/speed)+"px "+(-window.pageYOffset/speed)+"px";
}

function progressBar() {
    var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    var scrolled = (winScroll / height) * 100;
    document.getElementById("progress-bar").style.width = scrolled + "%";
}

$( document ).ready(function() {
	mobileNav();
    closeMobileNav();
    console.log('working');
    
    window.onscroll = function() {
        if($(window).width() > 1200) {
            parallax();
        }
        progressBar();
    };
});