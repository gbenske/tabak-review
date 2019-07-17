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
        $(this).parent().parent().parent().parent().addClass('showRating');
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
        $(this).parent().parent().parent().parent().addClass('showNote');
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

$( document ).ready(function() {
	mobileNav();
    closeMobileNav();
    highlight();
    showRating();
    showNote();
    searchBox();
    console.log('working');
});