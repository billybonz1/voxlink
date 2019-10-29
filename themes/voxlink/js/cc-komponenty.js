(function($){
    $(document).ready(function(){
       $(".open-tab").on("click", function(e){
    		e.preventDefault();
    		var id = $(this).attr("href");
    		$(this).addClass("link-active").siblings(".open-tab").removeClass("link-active");
    		$(id).addClass("tab-active").siblings(".tab").removeClass("tab-active");
    	});

    	$(".bitrix24-slider-block").owlCarousel({
    		items: 1,
    		dots: false,
    		nav: true
    	});

    	$(".block14-prev").on("click", function(e){
    			e.preventDefault();
    			$(".bitrix24-slider-block .owl-prev").click();
    	});

    	$(".block14-next").on("click", function(e){
    			e.preventDefault();
    			$(".bitrix24-slider-block .owl-next").click();
    	});

    	$("#complex-slider").owlCarousel({
    			margin:15,
    			autoWidth:false,
    			autoHeight:true,
    			items: 1,
    			loop: false,
    			nav: true,
    			navText: ["",""],
    			responsive: {
    					800: {
    							items: 1,
    					},
    					1200: {
    							items: 1,
    					}
    			},
    			onTranslate: function(e){
    					if (e.item) {
    							var index = e.item.index + 1;

    							$(".complex-schet span:first-child").text(index);
    					}
    			}
    	});

    	$(".complex-slider-arrows a:first-child").on("click", function(e){
    			e.preventDefault();
    			$("#complex-slider .owl-prev").click();
    	});

    	$(".complex-slider-arrows a:last-child").on("click", function(e){
    			e.preventDefault();
    			$("#complex-slider .owl-next").click();
    	});
    });
})(window.jQuery);