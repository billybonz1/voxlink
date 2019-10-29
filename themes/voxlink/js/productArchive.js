(function($){
    $(".products-cat-slide").on("click", function(e){
        e.preventDefault();
        var id = $(this).attr("href");
        $(this).addClass("selected").siblings("a").removeClass("selected");
        $(id).addClass("active").siblings(".top-product").removeClass("active");
    });


    $('.top-product-slider').owlCarousel({
        loop:false,
        margin:10,
        dots:true,
        nav: false,
        items: 1,
        autoHeight:true
    });


})(jQuery);