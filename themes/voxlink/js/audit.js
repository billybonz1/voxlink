(function($){
    $(document).ready(function(){
        $('.audit-open-tab').on("click", function(e){
            e.preventDefault();
            $(this).addClass("active").siblings(".audit-open-tab").removeClass("active");
            $(".audit-tab").removeClass("active-adt");
            var id = $(this).attr("href");
            $(id).addClass("active-adt");
            $('html,body').animate({
                scrollTop: $(id).offset().top - 50
            }, 600);
        }); 
        
        // var hash = window.location.hash;
        // if(hash) {
        //     setTimeout(function(){
        //         $("[href='"+hash+"']").click();
        //     },1000);
        // }
    });
})(jQuery)