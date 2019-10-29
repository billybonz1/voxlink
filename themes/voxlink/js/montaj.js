(function($){
    var badSlider = $('.net-slider').lightSlider({
		item: 1,
		controls: false,
		pager: true,
		responsive : [
            {
                breakpoint:1000,
                settings: {
                    item:1
                  }
			},
		]
	});

	$('.slide-prev').click(function(e){
		e.preventDefault();
		badSlider.goToPrevSlide();
	});
	$('.slide-next').click(function(e){
		e.preventDefault();
		badSlider.goToNextSlide();
	});
	
	
	
	
	
	
	
	var exSlider = $('.example-slider').lightSlider({
		item: 4,
		pager: false,
		controls: false,
		slideMargin: 0,
		responsive : [
            {
                breakpoint:1174,
                settings: {
                    item:2
                  }
			},
			{
                breakpoint:826,
                settings: {
                    item:1
                  }
			}
		]
	});
 
	$('.ex-next').click(function(e){
		e.preventDefault();
		exSlider.goToNextSlide();
	});

	$('.ex-prev').click(function(e){
		e.preventDefault();
		exSlider.goToPrevSlide();
	});
	
})(jQuery);