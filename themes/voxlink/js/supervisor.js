// СУПЕРВАЙЗЕР
(function($){
    $(document).ready(function(){
        var owl = $("#elem-slider");
        $("#elem-slider").owlCarousel({
            margin:0,
            autoWidth:false,
            autoHeight: true,
            items: 1,
            loop: false,
            nav: true,
            navText: ["",""],
            onTranslate: function(e){
                if (e.item) {
                    var index = e.item.index + 1;

                    $(".elem-schet span:first-child").text(index);
                }
            }
        });

        $(".elem-slider-arrows a:first-child").on("click", function(e){
            e.preventDefault();
            owl.trigger('prev.owl.carousel', [300]);
        });

        $(".elem-slider-arrows a:last-child").on("click", function(e){
            e.preventDefault();
            owl.trigger('next.owl.carousel', [300]);
        });
    });
})(window.jQuery)