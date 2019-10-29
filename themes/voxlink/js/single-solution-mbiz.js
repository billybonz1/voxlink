(function($){

    // Средний бизнес

    $("#reas-slider").owlCarousel({
        margin:30,
        autoWidth: false,
        autoHeight: true,
        items: 1,
        nav: true,
        navText: ["",""],
    });

    $(".reas-slider-btns a:last-child").on("click", function(e){
        e.preventDefault();
        $("#reas-slider .owl-next").click();
    });

    $(".reas-slider-btns a:first-child").on("click", function(e){
        e.preventDefault();
        $("#reas-slider .owl-prev").click();
    });

    $("#sip-slider").owlCarousel({
        margin:30,
        autoWidth:false,
        nav: true,
        navText: ["",""],
        responsive: {
            200: {
                items: 1
            },
            600: {
                items: 2
            },
            900: {
                items: 3
            },
            1230: {
                items: 4
            }
        }
    });

    $(".sip-btns a:last-child").on("click", function(e){
        e.preventDefault();
        $("#sip-slider .owl-next").click();
    });

    $(".sip-btns a:first-child").on("click", function(e){
        e.preventDefault();
        $("#sip-slider .owl-prev").click();
    });

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

