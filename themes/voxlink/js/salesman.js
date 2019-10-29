(function($){
    $(".sales-tab-link").on("click", function(e){
		e.preventDefault();
		var id = $(this).attr("href");
		$(this).addClass("sales-link-active").siblings(".sales-tab-link").removeClass("sales-link-active");
		$(this).parent(".sales-tab-links").addClass('stl-active')
		$(id).addClass("sales-tab-active").siblings(".sales-tab").removeClass("sales-tab-active");
	});

	$('.sales-faq-item').on('click', function(){
		$(this).toggleClass("faq-item-active").siblings(".sales-faq-item").removeClass("faq-item-active");
	});
})(jQuery);