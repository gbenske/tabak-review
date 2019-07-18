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

function highlight() {
    $("body form.addTabak input, body form.addTabak select, body form.addTabak textarea").click( function(event){
        $(this).parent().addClass('active');
        // $("body").addClass("overlay");
        event.stopPropagation();
    });

    $(document).click(function(event){
        $('body').removeClass('overlay');
        if (!$(event.target).hasClass('overlay')) {
            $("body form.addTabak input").removeClass("overlay");
            $("body form.addTabak section").removeClass('active');
        }
    });
}

/*Show Rating of Tobacco */
function showRating() {
    $(".btn.rating").click( function(event){
        $(".col .products").removeClass('showRating');
        $(this).parent().parent().addClass('showRating');
        event.stopPropagation();
    });

    $(document).click(function(event){
        if (!$(event.target).hasClass('showRating')) {
            $(".col .products").removeClass("showRating");
        }
    });
}

/*Show Rating of Tobacco */
function showNote() {
    $(".btn.note").click( function(event){
        console.log('click');
        $(".col .products").removeClass('showNote');
        $(this).parent().parent().addClass('showNote');
        event.stopPropagation();
    });

    $(document).click(function(event){
        if (!$(event.target).hasClass('showNote')) {
            $(".col .products").removeClass("showNote");
        }
    });
}

function searchBox() {
    $(".search-form figure").click( function(){
        $('.search-form input').toggleClass('active');
    });
}

function stickyNav() {
    /*Sticky nav*/
   $(window).scroll(function () {
     if($(window).scrollTop() > 120){
       $('header').addClass('sticky');
     }
     if ($(window).scrollTop() < 121) {
         $('header').removeClass('sticky');
     }
     /*
     var section = $('section');
     var nav = $('nav');
     var nav_height = nav.outerHeight();
     var cur_pos = $(this).scrollTop();
     
     section.each(function() {
       var top = $(this).offset().top - nav_height;
       var bottom = top + $(this).outerHeight();
       
       if (cur_pos >= top && cur_pos <= bottom) {
         nav.find('li a').removeClass('active');
         section.removeClass('active');
         
         $(this).addClass('active');
         nav.find('a[href="#'+$(this).attr('id')+'"]').addClass('active');
       }
     });*/
   });
 
 }

$( document ).ready(function() {
	mobileNav();
    closeMobileNav();
    highlight();
    showRating();
    showNote();
    searchBox();
    stickyNav();
    console.log('working');
});