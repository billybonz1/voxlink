(function($){
    $(document).ready(function(){
        $("#reas-slider").owlCarousel({
            margin:30,
            autoWidth: false,
            autoHeight: true,
            items: 1,
            nav: true,
            navText: ["",""],
            onInitialized: function(){
                $("#reas-slider").removeClass("loading");
            }
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










        function sliderCount(){
            var ivrCount = 0;
            $(".decide-biz-item").each(function(){
                ivrCount++;
            });

            if($(window).width() >= 1200){
                ivrCount -= 3;
            }else if($(window).width() < 1200 && $(window).width() >= 800){
                ivrCount -= 1;
            }

            $("#complex-slider").next().find(".complex-schet span:last-child").text(ivrCount);
        }

        sliderCount();
        $(window).resize(function(){
            sliderCount();
        });

        $("#complex-slider").owlCarousel({
            margin:15,
            autoWidth:false,
            autoHeight:true,
            items: 1,
            loop: false,
            nav: true,
            navText: ["",""],
            responsive: {
                800: {
                    items: 2,
                },
                1200: {
                    items: 4,
                }
            },
            onTranslate: function(e){
                if (e.item) {
                    var index = e.item.index + 1;
                    $("#complex-slider").next().find(".complex-schet span:first-child").text(index);
                }
            }
        });

        $(".complex-slider-arrows a:first-child").on("click", function(e){
            e.preventDefault();
            $(this).parent().prev().find(".owl-prev").click();
        });

        $(".complex-slider-arrows a:last-child").on("click", function(e){
            e.preventDefault();
            $(this).parent().prev().find(".owl-next").click();
        });

        function sliderCount2(){
            var ivrCount = 0;
            $(".complex-slider-item").each(function(){
                ivrCount++;
            });

            if($(window).width() >= 1200){
                ivrCount -= 2;
            }else if($(window).width() < 1200 && $(window).width() >= 800){
                ivrCount -= 1;
            }

            $("#complex-slider2").next().find(".complex-schet span:last-child").text(ivrCount);
        }

        sliderCount2();
        $(window).resize(function(){
            sliderCount2();
        });

        $("#complex-slider2").owlCarousel({
            margin:15,
            autoWidth:false,
            autoHeight:true,
            items: 1,
            loop: false,
            nav: true,
            navText: ["",""],
            responsive: {
                800: {
                    items: 2,
                },
                1200: {
                    items: 3,
                }
            },
            onTranslate: function(e){
                if (e.item) {
                    var index = e.item.index + 1;

                    $("#complex-slider2").next().find(".complex-schet span:first-child").text(index);
                }
            }
        });
    });
})(window.jQuery);

