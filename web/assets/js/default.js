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

$( document ).ready(function() {
	mobileNav();
	closeMobileNav();
	console.log('working');
});