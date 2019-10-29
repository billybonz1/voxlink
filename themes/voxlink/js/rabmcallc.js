(function($){

    $("#pol2-slider").owlCarousel({
        margin:10,
        loop:true,
        autoWidth:false,
        items: 1,
        nav: true,
        navText: ["",""]
    });

    $("#pol3-slider").owlCarousel({
        margin:10,
        loop:true,
        autoWidth:false,
        items: 1,
        nav: true,
        navText: ["",""]
    });

    $("#pol4-slider").owlCarousel({
        margin:10,
        loop:true,
        autoWidth:false,
        items: 1,
        nav: true,
        navText: ["",""]
    });

    $("#pol5-slider").owlCarousel({
        margin:10,
        loop:true,
        autoWidth:false,
        items: 1,
        nav: true,
        navText: ["",""]
    });

    $("#pol6-slider").owlCarousel({
        margin:10,
        loop:true,
        autoWidth:false,
        items: 1,
        nav: true,
        navText: ["",""]
    });



    $(".oper-click a").on("click", function(e){
        e.preventDefault();
        var id = $(this).attr("href");
        $(this).addClass("active").siblings("a").removeClass("active");
        $(id).addClass("active").siblings(".oper-container").removeClass("active");
    });
})(jQuery);