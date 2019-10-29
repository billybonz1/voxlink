(function($){
    $(".key-tab-link").on("click", function(e){
		e.preventDefault();
		var id = $(this).attr("href");
		$(this).addClass("key-link-active").siblings(".key-tab-link").removeClass("key-link-active");
		$(id).addClass("tab-active").siblings(".key-tab").removeClass("tab-active");
	});
})(jQuery)