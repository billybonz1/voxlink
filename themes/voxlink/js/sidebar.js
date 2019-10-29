(function($){
    var voipSlider = $('#voip').lightSlider({
        adaptiveHeight:true,
        item:1,
        slideMargin:0,
        loop:true,
        pager: false,
        controls: false
    });

    $(".voip-prev").on("click",function(e){
        e.preventDefault();
        voipSlider.goToPrevSlide();
    });

    $(".voip-next").on("click",function(e){
        e.preventDefault();
        voipSlider.goToNextSlide();
    });


    var webinar = $('#webinar').lightSlider({
        adaptiveHeight:true,
        item:1,
        slideMargin:0,
        loop:true,
        pager: true,
        controls: false,
        onSliderLoad: function(el){
            $(".webinars__item").removeClass("hidden");
        }
    }); 
    
    $(".webinar-prev").on("click",function(e){
        e.preventDefault();
        webinar.goToPrevSlide();
    });

    $(".webinar-next").on("click",function(e){
        e.preventDefault();
        webinar.goToNextSlide();
    });
    
    
    $('li .icon-cat-plus').on('click',function(){
        var parent = $(this).parents("li");
        parent.toggleClass('is-active');
        parent.find(".cat-hide").slideToggle();
    });
    
    
    
    $(".why__item").on("click", function(e){
        e.preventDefault();
        $(this).toggleClass("active");
        $(this).find("p").slideToggle();
    });
    
    
    
})(jQuery)