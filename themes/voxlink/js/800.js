(function($){

    // 8800
    $(document).ready(function(){
        $(".variac-click a").on("click", function(e){
            e.preventDefault();
            var id = $(this).attr("href");
            $(this).addClass("active").siblings("a").removeClass("active");
            $(id).addClass("active").siblings(".variac-container").removeClass("active");
        });
    });


})(window.jQuery)