(function($){
    
    var predictSlider = $('.predict-slider').lightSlider({
		item: 3,
		pager: true,
		controls: false,
		slideMargin: 0,
		responsive : [
            {
                breakpoint: 1220,
                settings: {
                    item:2,
                    slideMargin: 15
                  },
			},
			{
                breakpoint: 900,
                settings: {
                    item:1,
                    slideMargin: 15
                  },
			},
			{
                breakpoint: 544,
                settings: {
                    item:1,
                    adaptiveHeight: true,
                    slideMargin: 15
                }
			}
		],
        onSliderLoad: function(){
            $(".obzvon-predictive").removeClass("loading");
        }
	});

	$('.predict-next').click(function(e){
		e.preventDefault();
		predictSlider.goToNextSlide();
	});

	$('.predict-prev').click(function(e){
		e.preventDefault();
		predictSlider.goToPrevSlide();
	});
	
	
})(jQuery);