(function($){

    // Снижение затрат

    $(".biz-tab-item a").on("click", function(e){
        e.preventDefault();
        var id = $(this).attr("href");
        $(this).addClass("active").siblings("a").removeClass("active");
        $(id).addClass("active").siblings(".tab-block").removeClass("active");
        $("html,body").animate({
            scrollTop: $(".tab-block").offset().top
        }, 400);
    });

})(jQuery)

