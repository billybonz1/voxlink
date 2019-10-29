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