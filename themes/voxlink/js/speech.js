
(function ($) {

	var sl = $('.slider').lightSlider({
		item: 1,
		controls: false,
		pager: false,
	});

	$('.sl-prev').on('click', function (e) {
		e.preventDefault();
		sl.goToPrevSlide();
	});

	$('.sl-next').on('click', function (e) {
		e.preventDefault();
		sl.goToNextSlide();
	});

	$("[name=phone]").inputmask("+7 (999) 999-99-99");

})(window.jQuery);
