(function($){

    $(document).ready(function(){

        var currentOwl = 0;
        var owls = [];
        $(".bitrix24-slider-block").each(function(){
            owls.push($(this).owlCarousel({
                items: 1,
                dots: false,
                nav: true,
                autoHeight: true
            }));
        });

        $(".inter-tabs-a").on("click", function(e){
            e.preventDefault();
            var id = $(this).attr("href");
            $(this).addClass("active").siblings("a").removeClass("active");
            $(id).addClass("active").siblings(".inter-content-container").removeClass("active");
            currentOwl = id.match(/\d+/)[0] - 1;
            setTimeout(function(){
                owls[currentOwl].trigger('refresh.owl.carousel');
            }, 800);
        });


        owls.forEach(function (item) {
            item.on("translated.owl.carousel", function(){
                setTimeout(function(){
                    item.trigger('refresh.owl.carousel');
                }, 800);
            });
        });


        document.addEventListener("lazyload", function(e) {
          owls[currentOwl].trigger('refresh.owl.carousel');
        });

    });


})(jQuery)