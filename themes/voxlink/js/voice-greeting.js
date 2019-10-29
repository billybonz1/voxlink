(function($){
	$(function andeVtab() {

			$(".ande-vtab-block").not(":first").hide();
			$(".ande-vtype-in .ande-vtab-s").click(function() {
			$(".ande-vtype-in .ande-vtab-s").removeClass("active").eq($(this).index()).addClass("active");
			$(".ande-vtab-block").hide().eq($(this).index()).fadeIn()
			}).eq(0).addClass("active");

	});
})(jQuery);

