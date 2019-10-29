(function($){
    if( $(".team-slider").length){

        var teamCatSlider = $(".team-slider").lightSlider({
            item:1,
            loop:true,
            controls:true,
            slideMove:1,
            easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
            speed:600,
            pager: false,
            addClass: "team-slider-cont",
            adaptiveHeight: true,
            onSliderLoad: function(){
                $(".team-slider").removeClass("loading");
            }
        });

    }



    // $.ajax({
    //   url: "/",
    //   data: {
    //       action: "get-about-clients"
    //   }
    // }).done(function(data){
    //     $(".our-clients>div").removeClass("loading").html(data);
    // });

})(jQuery)