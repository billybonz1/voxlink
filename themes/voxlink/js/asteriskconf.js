(function($){
    $(document).ready(function(){
        function sliderCount(){
            var ivrCount = 0;
            $("#complex-slider .gallery-item").each(function(){
                ivrCount++;
            });

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
            onTranslate: function(e){
                if (e.item) {
                    var index = e.item.index + 1;

                    $(".complex-schet span:first-child").text(index);
                }
            },
            lazyLoad: true
        });

        $(".complex-slider-arrows a:first-child").on("click", function(e){
            e.preventDefault();
            $("#complex-slider .owl-prev").click();
        });

        $(".complex-slider-arrows a:last-child").on("click", function(e){
            e.preventDefault();
            $("#complex-slider .owl-next").click();
        });



        function sliderCount2(){
            var ivrCount = 0;
            $("#complex-slider2 .gallery-item").each(function(){
                ivrCount++;
            });

            $(".complex-schet2 span:last-child").text(ivrCount);
        }

        sliderCount2();
        $(window).resize(function(){
            sliderCount2();
        });

        $("#complex-slider2").owlCarousel({
            margin:15,
            autoWidth:false,
            autoHeight:true,
            items: 1,
            loop: false,
            nav: true,
            navText: ["",""],
            lazyLoad: true,
            onTranslate: function(e){
                if (e.item) {
                    var index = e.item.index + 1;

                    $(".complex-schet span:first-child").text(index);
                }
            }
        });

        $(".complex-slider-arrows a:first-child").on("click", function(e){
            e.preventDefault();
            $("#complex-slider2 .owl-prev").click();
        });

        $(".complex-slider-arrows a:last-child").on("click", function(e){
            e.preventDefault();
            $("#complex-slider2 .owl-next").click();
        });


        $('.asterconf-form select').selectize({

        });

        $(".asterconf-form-count-input span").on("click", function(){
            var input = $(this).parent().find("input");
            var value = parseInt(input.val());
            var text = $(this).text().trim();
            if(text == "+"){
                value++;
            }else if(text == "-" && value > 1){
                value --
            }
            input.val(value);
        });
    });
})(window.jQuery);