(function($){
    var andeyougetslider = $(".ande-youget-slider").lightSlider({
        item: 2,
        slideMargin: 30,
        responsive : [
            {
                breakpoint: 500,
                settings: {
                    item:1
                }
            }
        ]
    });
    
    $(".ande-slider-contain .ip-prev").on("click",function(e){
        e.preventDefault();
        andeyougetslider.goToPrevSlide();
    });

    $(".ande-slider-contain .ip-next").on("click",function(e){
        e.preventDefault();
        andeyougetslider.goToNextSlide();
    });
})(jQuery);