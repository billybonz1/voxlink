(function($){
    $(document).ready(function(){
        function compareCarousels(){
            $(".compare-slider").trigger('refresh.owl.carousel');
            $(".compare-slider").owlCarousel({
                items: 1,
                nav:true,
                responsive: {
                    1084: {
                        items: 3
                    },
                    832: {
                        items: 2
                    }
                }
            });
        }

        compareCarousels();

        // Одинаковая высота у ячеек
        function equalCellsHeight(){
            $(".compare-left .compare-cat-block.active").each(function(){
                var compareRight = $(this).parents(".compare-left").next();
                $(this).find(".compare-option").each(function(i){
                    var slug = $(this).data("slug");

                    var heights = [];

                    $(".compare-cat-block.active .compare-option[data-slug="+slug+"]").each(function(){
                        heights.push($(this).height());
                    });

                    var height = Math.max.apply(null, heights);
                    $(".compare-cat-block.active .compare-option[data-slug="+slug+"]").height(height);
                });

            });
        }

        equalCellsHeight();


        //Отобразить
        $("[name*=show-options]").on("change", function(){
            var value = $(this).val();
            if(value == "different"){
                var differentArr = [];
                $(".compare-left .active .compare-option").each(function(){
                    var slug = $(this).data("slug");
                    var differentNow = [];
                    var isDifferent = 0;
                    $(".compare-right .active .compare-option[data-slug="+slug+"]").each(function(){
                        differentNow.push($(this).text().replace(/\s/g, ''));
                    });


                    var lastItem;
                    differentNow.forEach(function(item){
                       if(isDifferent == 0){
                           if(lastItem){
                               if(lastItem == item){
                                    lastItem = item;
                               }else{
                                    isDifferent = 1;
                               }
                           }else{
                               lastItem = item
                           }
                       }

                    });

                    if(isDifferent === 0){
                        differentArr.push(slug);
                    }

                });

                differentArr.forEach(function(item){
                    $(".compare-cat-block.active .compare-option[data-slug="+item+"]").hide();
                });

            } else {
                $(".compare-cat-block.active .compare-option").show();
            }
        });

        // Изменить категорию
        var currentSlug = $("[name=compare-cats]").val();
        $("[name=compare-cats]").on("change", function(){
            currentSlug = $(this).val();
            $(".compare-cat-block").removeClass("active");
            $(".compare-cat-block[data-slug="+currentSlug+"]").addClass("active");
            setTimeout(function(){
                equalCellsHeight();
            }, 500);
        });


        //Удалить из сравнения
        $(".compare-del").on("click", function(){
            var id = $(this).data("id") + "";
            var compareString = Cookies.get('compare');
            var compareArray = compareString.split(",");
            var index = compareArray.indexOf(id);

            compareArray.splice(index, 1);
            console.log(id,index,compareArray);
            if(compareArray.length == 0){
                Cookies.remove('compare');
                $(".compare-container").replaceWith('<div class="korzina-content"><div class="korzina-p"><img style="max-width: 300px;" src="/wp-content/themes/voxlink/img/scales.svg"><h2>В сравнении пока нет ни одного товара :(</h2><a href="/ip-pbx-hardware/" class="btn btn-orgkorzina">Вернуться назад</a></div></div>');
            }else{
                compareString = compareArray.join(",");
                Cookies.set('compare', compareString);
                $(this).parents(".owl-item").remove();
                var count = parseInt($(".compare-cat-block.active .compare-clear-count").text());
                count--;

                if(count == 0){
                    $("[data-slug="+currentSlug+"],option[value="+currentSlug+"]").remove();
                    $("[name=compare-cats] option:first-child").attr("selected", true);
                    $(".compare-cat-block:first-child").addClass("active");
                    setTimeout(function(){
                        equalCellsHeight();
                    }, 500);
                } else {
                    $(".compare-cat-block.active .compare-clear-count").text(count);
                    $('#partial').trigger('destroy.owl.carousel');
                    compareCarousels();
                }
            }

        });


        $(".compare-clear").on("click", function(e){
            e.preventDefault();
            $(".compare-cat-block.active .compare-product").each(function(){
                $(this).find(".compare-del").click();
            });
        });

    });
})(jQuery);