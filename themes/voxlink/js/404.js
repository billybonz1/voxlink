(function($){
    $(".owl-carousel").owlCarousel({
        items: 2,
        nav: true,
        navText: ['',''],
        dots: false,
        loop: false,
        margin: 30,
        responsive: {
            0:{
                items: 1
            },
            430: {
                items: 2
            }
        }
    });


    $("a.page404-btn").on("click", function(e){
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "/sendmail.php",
            data: {
                url: location.href,
                subject: "Запрос со страницы 404"
            }
        }).done(function(data){
            console.log(data);
            if(data == "1"){
                $(".second404").show();
                $(".first404").hide();
            }
        });
    });
})(jQuery);