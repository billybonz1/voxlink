(function($){

    var ipSlider = $('#ip').lightSlider({
        item:3,
        loop:false,
        controls:false,
        slideMove:1,
        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        speed:600,
        adaptiveHeight:true,
        responsive : [
            {
                breakpoint: 1132,
                settings: {
                    item:2
                }
            },
            {
                breakpoint: 932,
                settings: {
                    item:1
                }
            }
        ],
        onSliderLoad: function(){
            $(".reshenie-content").removeClass("loading");
        }
    });

    $(".resh-slider .ip-prev").on("click",function(e){
        e.preventDefault();
        ipSlider.goToPrevSlide();
    });

    $(".resh-slider .ip-next").on("click",function(e){
        e.preventDefault();
        ipSlider.goToNextSlide();
    });


})(jQuery)