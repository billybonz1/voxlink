window.mobileAndTabletcheck = function() {
  var check = false;
  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
  return check;
};


(function($){
    if(!Cookies.get('HTTP_REFERER') || Cookies.get('HTTP_REFERER') == ""){
        Cookies.set('HTTP_REFERER', document.referrer);
    }
    Cookies.set('URL', location.href);
    $("img, a").on("dragstart", function(event) { event.preventDefault(); });



    // Табы общие

    $(".tab-link").on("click",function(e){
        e.preventDefault();
        var id = $(this).attr("href");
        $(this).addClass("active").siblings(".tab-link").removeClass("active");
        $(id).addClass("active").siblings(".tab").removeClass("active");
        $(window).trigger("scroll");
    });

    //image meta
    function getMeta(url){

    }

    //
    var mPopup = function(){
        $.magnificPopup.instance.popupsCache = {};
        $('.popup,.open-popup-link').magnificPopup({
            removalDelay: 300,
            mainClass: 'mfp-fade',
            callbacks: {
                open: function() {
                  $(".mfp-container iframe[data-src]").each(function(){
                     var src = $(this).data("src");
                     $(this).attr("src", src);
                  });
                }
              }
        });




        $('.wp-block-image img,.single-photo-popup,.gallery-item,.kb-content a[href*=".jpg"],.kb-content a[href*=".png"]').on("click", function(e){
            e.preventDefault();
            var $this = $(this);
            if($this.children("em").length){
                $this = $this.children("[href]");
            }
            var url;
            if($this.parents(".wp-block-image").length){
                url = $this.attr("src");
            } else {
                url = $this.attr("href");
            }

            $.fancybox.open({
            	src  : url
            });


            // $("<img/>",{
            //     load : function(){
            //         var pswpElement = document.querySelectorAll(".pswp")[0];
            //         var items = [{
            //           src: url,
            //           w: this.width,
            //           h: this.height
            //         }];
            //         console.log(this);
            //         var gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items);
            //         gallery.init();
            //     },
            //     src: url
            // });
        });


        $(document).on("click",".pswp__button--close", function(){
            $(".pswp__img").remove();
        });
    };
    mPopup();




    //
    $('.hamburger').on('click',function(){
        $(this).toggleClass('is-active');
        $(".main-mnu").toggleClass('active');
    });
    $(document).on("click",function(event){
        if( $(event.target).closest(".main-mnu,.hamburger").length )return;
        $('.hamburger').removeClass('is-active');
        $(".main-mnu").removeClass('active');
        event.stopPropagation();
    });



    //
    $("a[rel='m_PageScroll2id']").on("click", function(e) {
        e.preventDefault();
        var id = $(this).attr("href");
        document.querySelector(id).scrollIntoView({
          behavior: 'smooth'
        });
    });


    //

    var checkPhone;
    var config = {
    // ordinary validation config
        ignore: ['wc_comment'],
        form : 'form:not(.wc_comm_form)',
        errorMessageClass: 'allert',
        scrollToTopOnError : false,
        validateHiddenInputs: true,
        validate : {
          'name' : {
              validation : 'required'
          },
          'author' : {
              validation : 'required'
          },
          'text' : {
              validation : 'required'
          },
          'comment' : {
              validation : 'required'
          },
          'rating' : {
              validation : 'required',
          },
          'email' : {
              validation : 'required, email'
          },
          'email2': {
              validation : 'required, email'
          },
          'phone' : {
              validation : 'required, number, length',
              length : '8-12',
              ignore : "+,(,),-, "
          },
          'agree' : {
              validation: 'required'
          },
          'inn' : {
              validation : 'required, number'
          },
          'details[]':{
              validation : 'extension',
              allowing : 'doc, docx, pdf, txt'
          }
        },
        onSuccess: function($form){
            var msg = $form.find('input, textarea');
            if($form.hasClass("ivr-form")){
                $(".ir-step-block.active .ir-next").click();
                return false;
            }else if($form.hasClass("cnf")){
                $.ajax({
                    type: "POST",
                    url: "/check-number.php",
                    data: msg,
                    success: function (data) {
                        checkPhone = $form.find('input[name=phone1]').val();
                        $(".check-form-pre-result").hide();

                        $(".check-form-result span").text(checkPhone);

                        var operators = JSON.parse(data);
                        if(operators.length > 0){
                            $(".cfn-operators p:first-child").text(operators[0].operator + " (" + operators[0].region + ")");
                            if(operators.length == 2){
                                $(".cfn-arr").show();
                                $(".cfn-operators p:last-child").text(operators[1].operator);
                            }
                        }else{
                            $(".cfn-operators p:first-child").text("Такой номер не обслуживается ни одним оператором.");
                        }

                        $(".check-form-result").show();
                        $form[0].reset();
                    },
                    error: function (xhr, str) {
                        alert('Возникла ошибка: ' + xhr.responseCode);
                    }
                });
                return false;
            }else if(
                !$form.hasClass("woocommerce-form-login")
                && !$form.hasClass("checkout-form")
                && !$form.hasClass("search-sidebar")
            ){
                if($form.hasClass("comment-form")){
                    $.ajax({
                        type: "POST",
                        url: "/",
                        data: msg,
                        success: function (data) {
                            if(data != ""){
                                $("[href='#reviews-success']").click();
                            }
                            $form[0].reset();
                        },
                        error: function (xhr, str) {
                            alert('Возникла ошибка: ' + xhr.responseCode);
                        }
                    });
                }else{
                    $.ajax({
                        type: "POST",
                        url: "/",
                        data: msg,
                        success: function (data) {
                            console.log(data);
                            if(data == 1){
                                $("[href='#success']").click();
                            }
                            $form[0].reset();
                        },
                        error: function (xhr, str) {
                            alert('Возникла ошибка: ' + xhr.responseCode);
                        }
                    });
                }
                return false;
            }

        }
    };
    $.validate({

        validateOnBlur: true,
        validateHiddenInputs: true,
        lang: 'ru',
        modules: 'file, jsconf, security',
        errorMessageClass: 'allert',
        onModulesLoaded : function() {
            $.setupValidation(config);
        }
    });




    //Menu Item Hover Change Image
    $(".second-mnu a").on("mouseover",function(e){
        e.preventDefault();
        var img = $(this).data("img");
        $(".first-img").css("background-image","url(" + img + ")");
    });
    $(".second-mnu").on("mouseleave",function(e){
        $(".first-img").css("background-image","none");
    });


    $(".quest-open-tab").on("click", function(e){
		e.preventDefault();
		var id = $(this).attr("href");
		$(this).addClass("quest-active-a").siblings(".quest-open-tab").removeClass("quest-active-a");
		$(id).addClass("quest-active-tab").siblings(".quest-tab").removeClass("quest-active-tab");
    });





    //PRODUCTS bookmarks

    $(document).on("click", ".to-compare" ,function(e){
        if(!$(this).hasClass("active")){
            e.preventDefault();
            var id = $(this).data("id");
            var compareArray = [];
            var compareString = Cookies.get('compare');
            if(compareString){
                var compareArray = compareString.split(",");
            }
            if(compareArray.indexOf(id + "") == -1){
                compareArray.push(id);
            }

            compareString = compareArray.join(",");

            Cookies.set('compare', compareString);
            $(this).addClass("active").find(".to-compare-text").text("В сравнении");
        }
    });



    //PRODUCTS BOOKMARKS

    $(document).on("click", ".to-bookmark" ,function(e){
        if(!$(this).hasClass("active")){
            e.preventDefault();
            var id = $(this).data("id");
            var bookmarksArray = [];
            var bookmarksString = Cookies.get('bookmarks');
            if(bookmarksString){
                var bookmarksArray = bookmarksString.split(",");
            }
            if(bookmarksArray.indexOf(id + "") == -1){
                bookmarksArray.push(id);
            }

            bookmarksString = bookmarksArray.join(",");

            Cookies.set('bookmarks', bookmarksString);
            $(this).addClass("active").find(".to-compare-text").text("В закладках");
        }
    });




    //AJAX Добавление в корзину
    $(document).on("click", ".add-to-cart", function(e){
        e.preventDefault();
        var $this = $(this);
        var id = $(this).data("id");
        var quantity = $(this).data("quantity");
        var currentCartCount = parseInt($(".btn-korz .orange-circle").text());
        $this.addClass("loading");
        $.ajax({
          url: "/",
          data: {
              action: "add-to-cart",
              id: id,
              quantity: quantity
          }
        }).done(function(data){
            console.log(data);
            if(data != ""){
                currentCartCount++;
                $(".btn-korz .orange-circle").removeClass("hide").text(currentCartCount);
                $this.removeClass("add-to-cart").addClass("added_to_cart");
                $this.text("В корзине").attr("href","/cart/");
            }
            $this.removeClass("loading");
        });
    });






    //Lazy Load for images

    function lazyload(){
       var scrollTop = $("html, body").scrollTop();
       $("img[data-src]").each(function(){
          var top = $(this).offset().top - 800;
          var left = $(this).offset().left;


          if(scrollTop >= top && left >= 0  && left < $(window).width() && $(this).is(":visible") ){
              $(this).attr("src", $(this).attr("data-src"));
          }
       });

       $("[data-background-src]").each(function(){
          var top = $(this).offset().top - 800;
          var left = $(this).offset().left;
          if($(this).hasClass("main-kb-bg")){
              if(scrollTop >= top){
                  $(this).css("background-image", "url("+$(this).attr("data-background-src")+")");
              }
          } else {
              if(scrollTop >= top && left >= 0  && left < $(window).width() && $(this).is(":visible")){
                  $(this).css("background-image", "url("+$(this).attr("data-background-src")+")");
              }
          }

       });
    }

    $(window).on("scroll lazyload", function(){
        lazyload();
    });


    $(document).on("click", ".owl-prev,.owl-next,.ip-next,.ip-prev,.motrSlider-next,.motrSlider-prev,.lSPager,.owl-dot", function(){
        setTimeout(function(){
            lazyload();
        },100);
    });

    $(document).on("mousemove", ".lSPager", function(){
        setTimeout(function(){
            lazyload();
        },100);
    });



    //AJAX SEARCH
    var searchTimeout;
    $("[name=s]").on("keyup", function(e){
        if(e.keyCode != 13){
            var searchValue = $(this).val();
            var parentSearch = $(this).parents(".search-sidebar");
            $(".search-content").remove();
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(function(){
                if(searchValue != ""){
                    parentSearch.append("<div class='loading'></div>");
                    $.ajax({
                        url: "/",
                        data: {
                            action: "ajax-search",
                            s: searchValue
                        }
                    }).done(function(data){
                        parentSearch.find(".loading").remove();
                        parentSearch.append(data);
                    });
                }
            }, 300);
        }
    });


    $(document).on("click",function(event){
		if( $(event.target).closest(".search-content").length )return;
		$(".search-content").hide();
		event.stopPropagation();
	});


    $("[name=s]").on("focus", function(){
        var parentSearch = $(this).parents(".search-sidebar");
        parentSearch.find(".search-content").show();
    });



    //Полоса
    $("body").append("<div class='page-progress'><div></div></div>");
    $(window).on("scroll", function(){
        var scrollTopTotal = $("html, body").height()-$(window).height();
        var scrollTop = $("html, body").scrollTop();
        var percent = scrollTop*100/scrollTopTotal;
        $(".page-progress>div").css("width",percent + "%");
    });
    $(document).ready(function(){
        $(window).trigger("scroll");
    });


    $("[name=phone]").inputmask("+7 (999) 999-99-99");
    $("[name=phone1]").inputmask("+9 (999) 999-99-99");


    $(".top-callback-open").on("click", function(e){
        e.preventDefault();
        $(this).toggleClass("active");
        $(this).next().slideToggle();
    });

    $(".btn-present").on("click", function(e){
        e.preventDefault();
        $(this).toggleClass("active");
        $(this).next().slideToggle();
    });


    $(document).on("click",function(event){
		if( $(event.target).closest(".top-callback-open,.top-callback").length )return;
		$(".top-callback-open").removeClass("active");
		$(".top-callback").hide();
		event.stopPropagation();
	});

    $(document).on("click",function(event){
		if( $(event.target).closest(".top-present,.btn-present").length )return;
		$(".btn-present").removeClass("active");
		$(".top-present").hide();
		event.stopPropagation();
	});


    $(".top-banners-i").on("click", function(){
       var cls = $(this).next().data("cls");
       $(".top-banners").attr("class", "top-banners " + cls);
    });



    $(".check-number-btn").on("click", function(e){
        e.preventDefault();
        $(".check-number-form").addClass("active");
    });


    $(".check-number-form-close").on("click", function(e){
        e.preventDefault();
        $(".check-number-form").removeClass("active");
    });

    $(".check-number-form input[name=phone1]").on("focus", function(){
        var that = this;
        that.selectionStart = that.selectionEnd = 4;
    });
    var countryCodeChar = 1;
    $(".check-number-form input[name=phone1]").on("keyup input change", function(e) {
        var countryCode = $(this).val().charAt(countryCodeChar);
        if(countryCode != 7 && countryCode != 8 && countryCode != "_" && countryCode != " " && countryCode != "" && e.keyCode != 17 && e.keyCode != 86){
            var str = this.value + "";
            $(this).val(str.replace(countryCode,"+7"));
            var that = this;
            that.selectionStart = that.selectionEnd = 4;
        }

        if(window.mobileAndTabletcheck() == false){
            if(countryCode == 8){
                $(this).inputmask("9 (999) 999-99-99");
                countryCodeChar = 0;
            } else {
                $(this).inputmask("+9 (999) 999-99-99");
                countryCodeChar = 1;
            }
        }


        var thenum = $(this).val().match(/\d/g);
        var count = 0;
        if(thenum !== null){
            count = thenum.join("").length;
        }
        if(count >= 11){
            $(".check-number-form button").removeAttr("disabled");
        }else{
            $(".check-number-form button").attr("disabled", true);
        }
    });
    String.prototype.replaceAt=function(index, replacement) {
        return this.substr(0, index) + replacement+ this.substr(index + replacement.length);
    }
    $(".check-number-form input[name=phone1]").each(function(){
        this.onpaste = function(event) {
            var th = this;
            setTimeout(function(){
                var str = th.value + "";
                var ch = str.charAt(1).trim();
                var thenum = str.match(/\d/g);
                var count = 0;
                if(thenum !== null){
                    count = thenum.join("").length;
                }

                console.log(count);

                if(str.length >= 17){

                    th.value = str.replace("+8","+7");
                    if(ch != 7 && ch != 8){
                        th.value = str.replace("+","+7");
                    }
                }


                str = th.value + "";
                ch = str.charAt(1).trim();
                thenum = str.match(/\d/g);
                count = 0;
                if(thenum !== null){
                    count = thenum.join("").length;
                }
                if(count >= 11){
                    $(".check-number-form button").removeAttr("disabled");
                }else{
                    $(".check-number-form button").attr("disabled", true);
                }
            }, 200);

            return false;
        };
    });



    $(".cfn-repeat").on("click", function(e){
        e.preventDefault();
        $(".check-form-pre-result").show();
        $(".check-form-result").hide();
        $(".cfn-arr").hide();
        $(".cfn-operators p").text("");
        $(".check-number-form input.error").removeClass("error").val("");
        $(".check-number-form .allert").remove();
    });

})(jQuery)