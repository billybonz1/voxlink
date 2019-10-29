var products = [];
(function($){

    var canLoad = 1;
    var page = 1;

    var startSlider;
    function filterSlider(){
      startSlider = document.querySelector(".price-filter-slider");
      if(startSlider){
        var min = parseInt(startSlider.getAttribute("data-min"));
        var max = parseInt(startSlider.getAttribute("data-max"));
        var currentMin = parseInt(startSlider.getAttribute("data-current-min"));
        var currentMax = parseInt(startSlider.getAttribute("data-current-max"));
        var currentCatSlug = startSlider.getAttribute("data-current-cat-slug");

        noUiSlider.create(startSlider, {
            step: 1,
            start: [currentMin,currentMax],
            range: {
                'min': [min],
                'max': [max]
            },
            connect: true
        });

        startSlider.noUiSlider.on("update", function(values){
            $(".price-filter-min").text(parseInt(values[0]).toLocaleString('ru'));
            $(".price-filter-max").text(parseInt(values[1]).toLocaleString('ru'));
        });
      }

      if(startSlider){
        startSlider.noUiSlider.on("set", function(values){
          var offsetBlock = $(startSlider).siblings("h3");
          var top = offsetBlock.offset().top;
          var left = offsetBlock.offset().left;
          queryCounts(top,left);
        });
      }
    }

    filterSlider();
    function filterVariables(){
      var filterVars = [];
      if(startSlider){
        var values = startSlider.noUiSlider.get();
        filterVars = [
            "min_price=" + values[0],
            "max_price=" + values[1],
        ]
      }
      var orderby = $("[name=orderby]").val();
      if(orderby){
        filterVars.push("orderby="+orderby);
      }

      $(".sidebar-filter-block input:checked").each(function(){
          var name = $(this).attr("name");
          var value = $(this).data("value");
          filterVars.push(name+"="+value);
      });


      return filterVars.join("&");
    }

    function returnTheParentNode(htmlStr){
        var myCont = document.createElement('DIV'); // create a div element
        myCont.innerHTML = htmlStr; // create its children with the string
        return myCont;  // return the parent div
    }


    function filterQuery(url){
      canLoad = 0;
      page = 1;
      $(".finding-products").hide();
      $('.all-sidebar-filters').removeClass('active');
      var ajaxUrl = url;
      if(!url){
        var pathname = location.pathname;
        if(pathname.indexOf("page") > 0){
          var pathnameArr = pathname.split("/");
          var splice = pathnameArr.length - 3;
          pathnameArr.splice(splice, 2);
          pathname = pathnameArr.join("/");
        }
        ajaxUrl = pathname + "?" + filterVariables();
      }
      var historyUrl = ajaxUrl;

      if(ajaxUrl.indexOf("?") > 0){
        ajaxUrl += "&ajax=1";
      } else {
        ajaxUrl += "?ajax=1";
      }




      var scrollTop = $(".filterBlock").offset().top;
      $("html, body").animate({scrollTop: scrollTop}, 400);
      $(".filterBlock").addClass("loading");

      $.ajax({
        url: ajaxUrl
      }).done(function(data){
          var dataHTML = returnTheParentNode(data);
          var filterBlockHTML = $(dataHTML).find(".filterBlock").html();
          var title = $("title").text();
          window.history.pushState({"html":data,"pageTitle":title},"", historyUrl);
          $(".filterBlock").html(filterBlockHTML).removeClass("loading");
          canLoad = 1;
      });
    }


    function queryCounts(top,left){
      $(".finding-products").hide();
      var ajaxUrl = "/api.php?" + filterVariables();
      var term_id = $(".filterBlock").data("current-termid");
      if(ajaxUrl.indexOf("?") > 0){
        ajaxUrl += "&term_id=" + term_id;
      } else {
        ajaxUrl += "?term_id=" + term_id;
      }
      $.ajax({
        url: ajaxUrl
      }).done(function(postsCounts){
          $(".finding-products").css({
            "top": top + "px",
            "left": left + "px",
            "display": "block"
          });
          $(".finding-products span").text(postsCounts);
      });
    }


    $(document).on("change", '[name="orderby"]' , function(){
      filterQuery();
    });

    $(document).on("change", '.sidebar-filter-block input' , function(){
      var offsetBlock = $(this).parents(".sidebar-filter-block").find("h3");
      var top = offsetBlock.offset().top;
      var left = offsetBlock.offset().left;
      queryCounts(top,left);
    });

    $(document).on("click",".page-numbers",function(e){
      e.preventDefault();
      var url = $(this).attr("href");
      filterQuery(url);
    });

    $(".finding-products a").click(function(e){
      e.preventDefault();
      filterQuery();
    });


    $(".mobile-filter-open").on("click", function(e){
      e.preventDefault();
      $(this).toggleClass("active");
      $(".all-sidebar-filters").toggleClass("active");
    });
    $(".close-filter").on("click", function(e){
      e.preventDefault();
      $(".mobile-filter-open").removeClass("active");
      $('.all-sidebar-filters').removeClass('active');
      $(".finding-products").hide();
    });

    $(document).on("click",function(event){
  		if( $(event.target).closest(".all-sidebar-filters,.mobile-filter-open").length )return;
  		$('.all-sidebar-filters').removeClass('active');
  		event.stopPropagation();
  	});




    function pageQuery(page){
      canLoad = 0;

      var currentProducts = 0;
      var totalProducts = $(".woocommerce-result-count").data("total");
      $(".filterBlock .prouduct-item").each(function(){
          currentProducts++;
      });

      if(currentProducts < totalProducts){
        console.log("loading other products");
        $(".products-end").addClass("loading");
        var pathname = location.pathname;
        var ajaxUrl = pathname + "page/"+page+"/?" + filterVariables() + "&ajax=1";
        $.ajax({
          url: ajaxUrl
        }).done(function(data){
            var dataHTML = returnTheParentNode(data);
            var productsHTML = $(dataHTML).find(".products").html();
            $(".filterBlock .products").append(productsHTML);
            $(".products-end").removeClass("loading");
            currentProducts = 0;
            $(".filterBlock .prouduct-item").each(function(){
                currentProducts++;
            });
            $(".wrc-last").text(currentProducts);
            canLoad = 1;
        });
      }

    }



  	$(window).on("scroll", function(){
  	    //Зафиксировать полосу с фильтром на мобильных, когда до нее докручивают
  	    var scrollTop = $("html,body").scrollTop();


  	    var sortingBlockOffsetTop = $(".filterBlock").offset().top;
  	    if(scrollTop >= sortingBlockOffsetTop){
  	      $(".products-sorting").addClass("fixed");
  	    }else{
  	      $(".products-sorting").removeClass("fixed");
  	    }


  	    //Подтянуть следующие товары, когда докрутят до конца страницы
        if($(".products-end").length){
          var pEnd = $(".products-end").offset().top - 700;
          if(scrollTop >= pEnd){
            if(canLoad == 1){
                page++;
                pageQuery(page);

            }

          }
        }



  	});


})(jQuery);