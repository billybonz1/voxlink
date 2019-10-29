(function($){

    // ИНТЕГРАЦИЯ ТЕЛЕФОНИИ И CRM

    $(".inter-tabs-a").on("click", function(e){
        e.preventDefault();
        var id = $(this).attr("href");
        $(this).addClass("active").siblings("a").removeClass("active");
        $(id).addClass("active").siblings(".inter-content-container").removeClass("active");
    });

})(jQuery)