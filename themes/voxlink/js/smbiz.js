(function($){
    $(document).ready(function(){
        var owl = $('.dakr-reshenie-slider');
    	owl.owlCarousel({
    		items: 1,
    		controls: false,
    		dots: false,
    		autoHeight: true,
    		onInitialized  : counter, //When the plugin has initialized.
    		onTranslate : counter,
    		responsive: {
    		    983:{
    		        items: 2
    		    }
    		}
    	});

    	$('.resh-prev').click(function(e) {
    		e.preventDefault();
            owl.trigger('prev.owl.carousel');
    	});

    	$('.resh-next').click(function(e) {
    		e.preventDefault();
    		owl.trigger('next.owl.carousel');
    	});

    	function counter(event) {
    	    console.log(event);
        	var element   = event.target;
        	var items     = event.item.count;
        	if(event.page.size > 1){
        	    items--;
        	}
        	var item      = event.item.index + 1;

        	if(item > items) {
        		 item = item - items
        	}
        	$('.resh-current').html(item);
        	$('.resh-total').html(items);
        }




        $(".oms-slider").owlCarousel({
    		items: 1,
    		nav:true,
    		margin: 30,
    		autoHeight:true
    	});
    });
})(window.jQuery)