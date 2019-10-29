(function($){
    $(document).ready(function(){
        $(".bitrix24-slider-block").owlCarousel({
            items: 1,
            dots: false,
            nav: true,
            autoHeight: true
        });



         function sliderCount(){
            var ivrCount = 0;
            $(".complex-slider-item").each(function(){
                ivrCount++;
            });

            if($(window).width() >= 1200){
                ivrCount -= 2;
            }else if($(window).width() < 1200 && $(window).width() >= 800){
                ivrCount -= 1;
            }

            $(".complex-schet span:last-child").text(ivrCount);
        }

        sliderCount();
        $(window).resize(function(){
            sliderCount();
        });

        $("#complex-slider").owlCarousel({
            margin:15,
            autoWidth:false,
            autoHeight:true,
            items: 1,
            loop: false,
            nav: true,
            navText: ["",""],
            responsive: {
                800: {
                    items: 2,
                },
                1200: {
                    items: 3,
                }
            },
            onTranslate: function(e){
                if (e.item) {
                    var index = e.item.index + 1;

                    $(".complex-schet span:first-child").text(index);
                }
            }
        });

        $(".complex-slider-arrows a:first-child").on("click", function(e){
            e.preventDefault();
            $("#complex-slider .owl-prev").click();
        });

        $(".complex-slider-arrows a:last-child").on("click", function(e){
            e.preventDefault();
            $("#complex-slider .owl-next").click();
        });


    });
})(window.jQuery);