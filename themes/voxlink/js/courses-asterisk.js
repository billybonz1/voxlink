(function($){

    $(".short-about-item a").on("click", function(e){
        e.preventDefault();
        var id = $(this).attr("href");
        $(this).addClass("active").siblings("a").removeClass("active");
        $(id).addClass("active").siblings(".short-about-block").removeClass("active");
        $("html,body").animate({
            scrollTop: $(id).offset().top
        }, 400);
    });

})(jQuery)