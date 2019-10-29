(function($){
$(function() {


    $(".dakr-open-tab").on("click", function(e){
		e.preventDefault();
		var id = $(this).attr("href");
		$(this).addClass("dakr-open-tab-active").siblings(".dakr-open-tab").removeClass("dakr-open-tab-active");
		$(id).addClass("dakr-tab-active").siblings(".dakr-tab").removeClass("dakr-tab-active");
    });



// 	$('.stalo-list').masonry({
//         itemSelector: '.stalo-item',
//         columnWidth: '.stalo-sizer',
//         percentPosition: true,
//         gutter: 0
// 	  });





    if($(".solutions-slider").length){

        var solutionsSlider = $(".solutions-slider").lightSlider({
            item:3,
            loop:false,
            controls:false,
            slideMove:1,
            easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
            speed:600,
            adaptiveHeight:true,
            addClass: "solutions-slider-cont",
            responsive : [
                {
                    breakpoint: 1132,
                    settings: {
                        item:2
                    }
                },
                {
                    breakpoint: 700,
                    settings: {
                        item:1
                    }
                }
            ],
            onSliderLoad: function(el){
                $(".solutions-slider-cont .lSPager").before("<a class='solutions-prev'></a>");
                $(".solutions-slider-cont .lSPager").after("<a class='solutions-next'></a>");
            }
        });

        $(document).on("click",".solutions-prev",function(e){
            e.preventDefault();
            solutionsSlider.goToPrevSlide();
        });

        $(document).on("click",".solutions-next",function(e){
            e.preventDefault();
            solutionsSlider.goToNextSlide();
        });
    }






    var page = 1;

    if($('.events-container').length){
        var masonryOptions = {
            itemSelector: '.event__item',
            columnWidth: '.grid-sizer',
            gutter: '.gutter-sizer',
            percentPosition: true
        };
        var $masonryGrid = $('.events-container').masonry(masonryOptions);
    }


    $(".load-more").on("click", function(e) {
        page++;
        var $this = $(this);
        $this.addClass("loading");
        var total = $(this).data("total");
        var postType = $(this).data("post-type");
        if(postType == "events"){
            $.ajax({
              url: "/",
              method: "POST",
              data: {
                  type: "events",
                  page: page
              }
            }).done(function(data) {
                $this.removeClass("loading");
                var $items = $(data);
                $masonryGrid.append( $items ).masonry( 'appended', $items );
                var postCounter = 0;
                $(".event__item").each(function(){
                    postCounter++;
                });
                if(postCounter == total){
                    $this.remove();
                }
                $(".events-container").addClass("loaded");

            });
        }
    });










});

//Форма отправки 2.0
// $(function() {
//     $("[name=send]").click(function () {
//         $(":input.error").removeClass('error');
//         $(".allert").remove();
//         var error;
//         var btn = $(this);
//         var ref = btn.closest('form').find('[required]');
//         var msg = btn.closest('form').find('input, textarea');
//         var send_btn = btn.closest('form').find('[name=send]');
//         var subject = btn.closest('form').find('[name=form_subject]');
//         var form = btn.closest('form'), name = form.find('[name=name]').val();
//         $(ref).each(function () {
//             if ($(this).val() == '') {
//                 var errorfield = $(this);
//                 $(this).addClass('error').parent('.field').append('<div class="allert"><span>Заполните это поле</span><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></div>');
//                 error = 1;
//                 $(":input.error:first").focus();
//                 return;
//             } else {
//                 var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
//                 if ($(this).attr("type") == 'email') {
//                     if (!pattern.test($(this).val())) {
//                         $("[name=email]").val('');
//                         $(this).addClass('error').parent('.field').append('<div class="allert"><span>Укажите коректный e-mail</span><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></div>');
//                         error = 1;
//                         $(":input.error:first").focus();
//                     }
//                 }
//                 var patterntel = /^()[0-9]{9,18}/i;
//                 if ($(this).attr("type") == 'tel') {
//                     if (!patterntel.test($(this).val())) {
//                         $("[name=phone]").val('');
//                         $(this).addClass('error').parent('.field').append('<div class="allert"><span>Укажите коректный номер телефона</span><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></div>');
//                         error = 1;
//                         $(":input.error:first").focus();
//                     }
//                 }
//             }
//         });
//         if (!(error == 1)) {
//             $(send_btn).each(function () {
//                 $(this).attr('disabled', true);
//             });



//             $.ajax({
//                 type: 'POST',
//                 url: 'mail.php',
//                 data: msg,
//                 success: function (data) {
//                     $.magnificPopup.close();
//                     form[0].reset();
//                     $(send_btn).each(function () {
//                         $(this).attr('disabled', false);
//                     });

//                     $("a[href='#popupty']").click();


//                 },
//                 error: function (xhr, str) {
//                     alert('Возникла ошибка: ' + xhr.responseCode);
//                 }
//             });
//         }
//         else{
//             if(form.hasClass("form-shake")){
//                 form.parents(".form-block").addClass("shake");
//                 form.parents(".form-block").one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(e) {
//                     $(this).removeClass("shake");
//                 });
//             }
//         }
//         return false;
//     });
// });


})(jQuery);