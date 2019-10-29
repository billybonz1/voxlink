(function($){
    $(document).ready(function(){
        $(".b4-block-header").on("click", function(e){
            $(this).toggleClass("active").next().slideToggle(500);
        });
    });
})(window.jQuery);