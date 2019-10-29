(function($){
    if($(".mSlider").length){
        var mSlider = $(".mSlider");

        mSlider.owlCarousel({
            items: 1,
            nav: true,
            navText: ['<img src="/wp-content/themes/voxlink/img/mslider-arrow-prev.png">','<img src="/wp-content/themes/voxlink/img/mslider-arrow-next.png">'],
            dots: true,
            loop: true
        });
    }



    var mainClSliders = [];
    var mClCounter = 0;
    $(".main-cl-slider").each(function(){
        mClCounter++;
        var id = $(this).attr("id");
        var $thisTab = $(this).parents(".tab");
        mainClSliders[mClCounter] = $("#"+id).lightSlider({
            item: 5,
            loop:false,
            controls: false,
            pager: false,
            slideMove: 1,
            easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
            speed: 600,
            slideMargin: 30,
            responsive : [
                {
                    breakpoint:1194,
                    settings: {
                        item:4
                    }
                },
                {
                    breakpoint:948,
                    settings: {
                        item:3
                    }
                },
                {
                    breakpoint:739,
                    settings: {
                        item:2
                    }
                },
                {
                    breakpoint:491,
                    settings: {
                        item:1
                    }
                }
            ],
            onSliderLoad: function(){
                $(".tabs-container").removeClass("loading");
            }
        });


    });




    $(".main-cl-slider-prev").on("click",function(e){
        e.preventDefault();
        var slider = $(this).data("slider");
        mainClSliders[slider].goToPrevSlide();
    });

    $(".main-cl-slider-next").on("click",function(e){
       e.preventDefault();
       var slider = $(this).data("slider");
       mainClSliders[slider].goToNextSlide();
    });





    $(".tab-link").on("click",function(e){
        e.preventDefault();
        var id = $(this).attr("href");
        $(this).addClass("active").siblings(".tab-link").removeClass("active");
        $(id).addClass("active").siblings(".tab").removeClass("active");

        if(mainClSliders.length > 0){
            mainClSliders.forEach(function(item, index){
                if(item.is(":visible")){
                    mainClSliders[index].refresh();
                }
            });
        }
    });






    var mdSlider = $('.main-developments-slider').lightSlider({
        item:3,
        loop:true,
        controls: false,
        pager: false,
        slideMove: 1,
        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        speed:600,
        slideMargin: 0,
        responsive : [
            {
                breakpoint:1173,
                settings: {
                    item:2
                }
            },
            {
                breakpoint:853,
                settings: {
                    item:1
                }
            }
        ],
        onSliderLoad: function(){
            $(".md-slider-cont").removeClass("loading");
        },
        onAfterSlide: function(el){
            var slide = $(".main-developments-slider .active").data("slide");
            $(".main-developments-content[data-slide="+slide+"]").addClass("active").siblings(".main-developments-content").removeClass("active");
            $(window).trigger("scroll");
        }
    });

    $(document).on("click",".mdSlider-prev",function(e){
        e.preventDefault();
        mdSlider.goToPrevSlide();
    });

    $(document).on("click",".mdSlider-next",function(e){
        e.preventDefault();
        mdSlider.goToNextSlide();
    });

    $(document).on("click",".md-slide-cont", function(e){
        var slide = $(this).data("slide");
        mdSlider.goToSlide(slide);
    });



    $(".main-news-slider").lightSlider({
        item: 1,
        loop: false,
        controls: false,
        pager: true,
        slideMove: 1,
        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        speed: 600,
        slideMargin: 30,
        adaptiveHeight: true,
        freeMove: false,
        onSliderLoad: function(){
            $(".main-news-slider").removeClass("loading");
        }
    });



    function getComputedTranslateXY(obj){
    	const transArr = [];
        if(!window.getComputedStyle) return;
        const style = getComputedStyle(obj),
            transform = style.transform || style.webkitTransform || style.mozTransform;
        let mat = transform.match(/^matrix3d\((.+)\)$/);
        if(mat) return parseFloat(mat[1].split(', ')[13]);
        mat = transform.match(/^matrix\((.+)\)$/);
        mat ? transArr.push(parseFloat(mat[1].split(', ')[4])) : 0;
        mat ? transArr.push(parseFloat(mat[1].split(', ')[5])) : 0;
        return transArr;
    }


    var motrSlider = $(".main-otr-slider").lightSlider({
        autoWidth: true,
        loop:false,
        controls: false,
        pager: false,
        slideMove: 1,
        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        speed: 600,
        slideMargin: 2,
        onBeforeSlide: function(el){
            if(el.getCurrentSlideCount() == 1){
                $(".motrSlider-prev").hide();
            }else{
                $(".motrSlider-prev").show();
            }
            console.log(el.getCurrentSlideCount(),el.getTotalSlideCount());


        },
        responsive : [
            {
                breakpoint: 0,
                settings: {
                    item: 1,
                    autoWidth: false
                  }
            },
            {
                breakpoint: 751,
                settings: {
                    item: 3,
                    autoWidth: false
                  }
            }
        ]
    });

    $(document).on("click",".motrSlider-prev",function(e){
        e.preventDefault();
        motrSlider.goToPrevSlide();
    });

    $(document).on("click",".motrSlider-next",function(e){
        e.preventDefault();
        motrSlider.goToNextSlide();
    });

    if($(".main-clients-about-slider").length){
        var macliFullSlider,macliSlider;

        macliSlider = $(".main-clients-about-slider");
        macliFullSlider = $(".main-clients-about-full-slider");
        macliFullSlider.owlCarousel({
            items: 1,
            nav: false,
            dots: false,
            margin: 15
        });
        macliSlider.owlCarousel({
            nav: false,
            dots: false,
            loop: true,
            responsive : {
                0 : {
                    items: 1
                },
                440 : {
                    items: 2
                },
                560 : {
                    items: 3
                },
                882 : {
                    items: 4
                },
                1029 : {
                    items: 5
                }
            },
            onInitialized: function(){
                $(".main-clients-about").removeClass("loading");
            }
        });



        macliSlider.on('translated.owl.carousel', function(event) {
            console.log(event);
            var index = event.item.index - event.page.size;
            if(index < 0){
                index = (event.item.index + event.item.count) - event.page.size;
            }
            var count = index > event.item.count ? index%event.item.count : index;

            macliFullSlider.trigger('to.owl.carousel', [count, 300])
        });


        $(".main-clients-about-slider-prev").on("click", function(e){
            e.preventDefault();
            macliSlider.trigger('prev.owl.carousel', [300]);
        });


        $(".main-clients-about-slider-next").on("click", function(e){
            e.preventDefault();
            macliSlider.trigger('next.owl.carousel', [300]);
        });

    }




    $('.mr-images').owlCarousel({
        loop:false,
        margin:10,
        nav:true,
        items: 1,
        navText: [
            '<div class="ip-prev mr-images-prev"></div>',
            '<div class="ip-next mr-images-next"></div>'
        ],
    });




    //CALC

    if($( ".mc-slider-i" ).length){
        $( ".mc-slider-i" ).each(function(){

            var slider = $(this)[0];
            var current = $(this).data("current");
            var max = $(this).data("max");
            var name = $(this).data("name");
            var $this = $(this);
            var change = function(values){
                $this.next().find(".mc-slider-i-value").text(Math.round(values));
            };


            noUiSlider.create(slider, {
                start: current,
                connect: [true, false],
                range: {
                    'min': 0,
                    'max': max
                }
            });


            if(name == "procent"){

            }else{
                change(current);
            }

            slider.noUiSlider.on('slide', function (values) {
                if(name != "procent"){
                    change(values);
                    $this.next().addClass("active");
                }
                if(!$this.find(".mc-slider-text").length){
                    $this.prepend('<div class="mc-slider-text"></div>');
                }

                var left = values*100/max;

                $this.find(".mc-slider-text").text(Math.round(values)).css("left",left+"%");
            });

            slider.noUiSlider.on('end', function (values) {
                if(name != "procent"){
                    change(values);
                    $this.next().removeClass("active");
                }

                $this.find(".mc-slider-text").remove();
            });


        });
    }


    $(".mc-select select").selectize();

})(jQuery)