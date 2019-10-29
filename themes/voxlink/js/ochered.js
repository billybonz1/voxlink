(function($){
    $(".open-tab").on("click", function(e){
		e.preventDefault();
		var id = $(this).attr("href");
		$(this).addClass("link-active").siblings(".open-tab").removeClass("link-active");
		$(id).addClass("tab-active").siblings(".tab").removeClass("tab-active");
	});

	$("#oaf").owlCarousel({
		items: 1,
		nav:true
	});

	$(".oms-slider").owlCarousel({
		items: 1,
		nav:true,
		margin: 30,
		autoHeight:true
	});
})(jQuery);
