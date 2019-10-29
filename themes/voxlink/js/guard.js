(function($){
    $('.gf-vatc-slider').owlCarousel({
        loop:true,
        margin:10,
        items: 1,
        dots: true,
        nav: true,
        autoHeight:true
    });
    
    $('.trust-us-slider').owlCarousel({
        loop:true,
        margin:10,
        items: 1,
        dots: true,
        nav: true,
        autoHeight:true,
        onInitialized: function(){
            $(".trust-us-slider").removeClass("loading");
        }
    });
})(jQuery);