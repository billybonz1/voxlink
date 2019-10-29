(function($){
    $(document).ready(function() {
    	$(".open-banner:not(.open-banner-right)").fancybox({
    		fitToView	: false,
    		autoSize	: true,
    		closeClick	: true,
    		openEffect	: 'elastic',
    		closeEffect	: 'none',
    		beforeClose: function(e){
    		    var id = $(e.slides[0].src).data("id");
    		    var global = $(e.slides[0].src).data("global");
    		    if(global != "showall"){
    		        Cookies.set('banner' + id, '1', { expires: 3 });
    		    }
    		}
    	});
    	
    	var timeToShow = parseInt($(".open-banner").data("timetoshow"))*1000;
    	if($(".open-banner").hasClass("open-banner-right")){
    	    setTimeout(function(){
        	    var id = $(".open-banner").data("id");
            	Cookies.set('banner' + id, '1', { expires: 3 });
            	$(".new-right-banner").addClass("active");
            	$(document).on("click",function(event){
            		if( $(event.target).closest(".new-right-banner").length )return;
            		$(".new-right-banner").removeClass("active");
            		event.stopPropagation();
            	});
            	
            	$(".nrb-close").on("click", function(){
            	    $(".new-right-banner").removeClass("active");
            	});
    	    }, timeToShow);
    	    
    	} else {
    	    setTimeout(function(){
        	    $(".open-banner").click();
        	}, timeToShow);
    	}
    	
    	
    	
    	
    	
    	
    	
    });
})(window.jQuery);