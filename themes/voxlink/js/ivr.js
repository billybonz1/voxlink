(function($){

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




})(jQuery);