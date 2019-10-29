(function($){
    $(document).ready(function(){
        $(".single-product-quantity").on("click", ".plus,.minus", function() {
            var input = $(this).siblings("input");
            var value = parseInt(input.val());
            if($(this).hasClass("minus") && value>1){
                value--;
            }else if($(this).hasClass("plus")){
                value++;
            }
            input.val(value);
            $(this).parent().siblings(".add-to-cart").attr("data-quantity", value);
        });


        $('[role="tab"] a').on("click", function(e){
            e.preventDefault();
            $(this).parent().addClass("active").siblings("li").removeClass("active");
            var id = $(this).attr("href");
            $(id).addClass("active").siblings(".woocommerce-Tabs-panel").removeClass("active");
        });







        $(".select-rating .sr-item").on("mouseover", function(e){
            e.preventDefault();
            $(this).addClass("active").prevAll(".sr-item").addClass("active");
        });
        $(".select-rating .sr-item").on("mouseleave", function(e){
            e.preventDefault();
            $(this).removeClass("active").prevAll(".sr-item").removeClass("active");
        });

        $(".select-rating .sr-item").on("click", function(e){
            e.preventDefault();
            $("[name=rating]").val($(this).data("value"));
            $(".select-rating .sr-item").removeClass("selected");
            $(this).addClass("selected").prevAll(".sr-item").addClass("selected");
        });

        $(window).load(function(){
            if(location.hash == "#commentform"){
                $(".reviews_tab a").click();
                $("html, body").animate({ scrollTop: $('.reviews_tab').offset().top }, 1000);
            }else{
                $('[role="tab"]:first-child a').click();
            }
        });

    });
})(jQuery)