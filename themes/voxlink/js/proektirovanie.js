(function($){
    $(document).ready(function(){
       $(".bitrix24-slider-block").owlCarousel({
            items: 1,
            dots: false,
            nav: true
       });

       $(".variac-click a").on("click", function(e){
            e.preventDefault();
            var id = $(this).attr("href");
            $(this).addClass("active").siblings("a").removeClass("active");
            $(id).addClass("active").siblings(".variac-container").removeClass("active");
        });
    });
})(jQuery);