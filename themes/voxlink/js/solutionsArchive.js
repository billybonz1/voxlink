(function($){
    $(".faq__q").on("click", function(e){
       e.preventDefault();
       $(this).toggleClass("active");
       $(this).parent().toggleClass("active");
       $(this).next().slideToggle(400);
    });
})(jQuery)