(function($){
    if( $(".products-cat-slider").length){

        var catsSliders = [];

        $(".products-cat-slider").each(function(){
            var $this = $(this);
            var id = $this.find(".cats-slider").attr("id");
            var items = $this.data("items");
            catsSliders.push(
                $("#" + id).lightSlider({
                    item: items,
                    controls: false,
                    slideMove: 1,
                    easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
                    speed: 600,
                    pager: false,
                    responsive : [
                        {
                            breakpoint:800,
                            settings: {
                                item:3,
                                slideMove:1,
                                slideMargin:6,
                            }
                        },
                        {
                            breakpoint:480,
                            settings: {
                                item:2,
                                slideMove:1
                            }
                        }
                    ],
                    onSliderLoad: function(){
                        $this.addClass("show");
                    }
                })
            );

            var currentSlider = catsSliders[catsSliders.length - 1];

            $this.find(".products-cat-arr-left").on("click",function(e){
                e.preventDefault();
                currentSlider.goToPrevSlide();
            });

            $this.find(".products-cat-arr-right").on("click",function(e){
                e.preventDefault();
                currentSlider.goToNextSlide();
            });

            if($(".cat-slide.current").length){
                var slide = $(".cat-slide.current").data("slide");
                currentSlider.goToSlide(slide);
            }
        });

    }
})(jQuery)