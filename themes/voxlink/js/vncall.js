(function($){

    // salesman
    
    
    
    
    
    

    // Внедрение call-центра

    $("#sbor-slider").owlCarousel({
        margin:30,
        autoWidth:false,
        items: 1,
        nav: true,
        navText: ["",""],
        responsive: {
            500: {
                items: 2,
                autoWidth: true
            }
        }
    });

    $(".block-arrows a:last-child").on("click", function(e){
        e.preventDefault();
        $("#sbor-slider .owl-next").click();
    });

    $(".block-arrows a:first-child").on("click", function(e){
        e.preventDefault();
        $("#sbor-slider .owl-prev").click();
    });

    $(".how-tab-container a").on("click", function(e){
        e.preventDefault();
        var id = $(this).attr("href");
        $(this).addClass("active").siblings("a").removeClass("active");
        $(id).addClass("active").siblings(".how-content-container").removeClass("active");
        $("html,body").animate({
            scrollTop: $(".how-tab-container").offset().top
        }, 400);
    });

    $(".soft-tab-container a").on("click", function(e){
        e.preventDefault();
        var id = $(this).attr("href");
        $(this).addClass("active").siblings("a").removeClass("active");
        $(id).addClass("active").siblings(".soft-content-container").removeClass("active");
        $("html,body").animate({
            scrollTop: $(".soft-tab-container").offset().top
        }, 400);
    });


    var ivrCount = 0;
    $(".ivr-useful-slide").each(function(){
        ivrCount++;
    });

    if(ivrCount < 10){
        ivrCount = "0" + ivrCount;
    }

    $(".ivr-slider-count .total").text(ivrCount);


    $('.ivr-useful-slider').owlCarousel({
        loop: false,
        margin:10,
        items: 1,
        dots: true,
        nav: true,
        autoHeight:true,
        onInitialized: function(){
            $(".ivr-useful-slider").removeClass("loading");
        },
        onTranslate: function(e){
            if (e.item) {
                var index = e.item.index + 1;
                if(index < 10){
                    index = "0" + index;
                }
                $(".ivr-slider-count .current").text(index);
            }
        }
    });

})(jQuery)