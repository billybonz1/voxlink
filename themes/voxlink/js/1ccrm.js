(function($){
    // Custom JS
    $(document).ready(function(){
    	var andeteleOwl = $('#ande-telephoni-owl');

		andeteleOwl.owlCarousel({
			items: 1,
			nav: true,
			loop: true,
			smartSpeed: 1000,
			autoHeight: true,
			navText: ['<img class="ande-telephoni-nav" src="/wp-content/themes/voxlink/minimg/1ccrm/ande-triangle.png" alt=""> ','<img class="ande-telephoni-nav" src="/wp-content/themes/voxlink/minimg/1ccrm/ande-triangle.png" alt="">']
		});

		var andeOwl = $('#ande-telephoni-owl');


		andeOwl.on('changed.owl.carousel', function(event) {
			var current = event.item.index-2;
			if(current == 0){
				$('.ande-tele-tabnum1').addClass("ande-slide-tab-active").siblings(".ande-tele-slide-item").removeClass("ande-slide-tab-active");
			}else if( current == 1){
				$('.ande-tele-tabnum2').addClass("ande-slide-tab-active").siblings(".ande-tele-slide-item").removeClass("ande-slide-tab-active");
			}else{
				$('.ande-tele-tabnum3').addClass("ande-slide-tab-active").siblings(".ande-tele-slide-item").removeClass("ande-slide-tab-active");
			}
		});

	    $('.ande-tele-tabnum1').on('click', function(){
			andeOwl.trigger('to.owl.carousel', 1, 3000)
			$(this).addClass("ande-slide-tab-active").siblings(".ande-tele-slide-item").removeClass("ande-slide-tab-active");
		})

		$('.ande-tele-tabnum2').on('click', function(){
			andeOwl.trigger('to.owl.carousel', 2, 3000)
			$(this).addClass("ande-slide-tab-active").siblings(".ande-tele-slide-item").removeClass("ande-slide-tab-active");
		})

		$('.ande-tele-tabnum3').on('click', function(){
			andeOwl.trigger('to.owl.carousel', 3, 3000)
			$(this).addClass("ande-slide-tab-active").siblings(".ande-tele-slide-item").removeClass("ande-slide-tab-active");
		});

		$('#ande-smartowl').owlCarousel({
			items: 1,
			nav: true,
			loop: true,
			margin: 10,
			navText: ['<img class="ande-telephoni-nav" src="/wp-content/themes/voxlink/minimg/1ccrm/ande-triangle.png" alt=""> ','<img class="ande-telephoni-nav" src="/wp-content/themes/voxlink/minimg/1ccrm/ande-triangle.png" alt="">']
		});
    });
})(jQuery);