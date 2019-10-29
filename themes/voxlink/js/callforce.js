(function($){
    $(document).ready(function(){
        var $owl1 = $(".cf-slider-block").owlCarousel({
            items: 1,
            nav: true,
            autoHeight: true,
            onTranslated: function(e){
                var textID = e.item.index + 1;
                $(".cf-slider-text").hide();
                $("#stext" + textID).show();
            }
        });

        var $owl2 = $(".cf-slider2-block").owlCarousel({
            items: 1,
            nav: true,
            autoHeight: true,
            margin: 30
        });




        $(window).on("scroll", function(){
            $owl1.trigger('refresh.owl.carousel');

            $owl2.trigger('refresh.owl.carousel');
        });


        $(".variac-click a").on("click", function(e){
            e.preventDefault();
            var id = $(this).attr("href");
            $(this).addClass("active").siblings("a").removeClass("active");
            $(id).addClass("active").siblings(".variac-container").removeClass("active");
        });


    });
})(window.jQuery)