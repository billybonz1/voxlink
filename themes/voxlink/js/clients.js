(function($){
    $(".clients-item2:not(.clients-item22)").on("click", function(){
       $(this).addClass("active");
    });

    $(".clients-item-hover-close").on("click", function(e){
        e.stopPropagation();
       $(this).parents(".clients-item2").removeClass("active");
    });
})(jQuery);