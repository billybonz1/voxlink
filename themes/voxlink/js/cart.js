(function($){

    var calculateTotal = function(){
        var total = 0;
        $(".cart_item").each(function() {
            var price = $(this).find(".product-price[data-title] > span").text().replace(" ", '');
            console.log(price);
            price = parseFloat(price);
            var q = parseInt($(this).find(".wac-quantity input").val());
            var subTotal = price * q;
            total += subTotal;
            $(this).find(".product-subtotal > span").html(subTotal.toLocaleString("ru") + " руб.");
        });
        $(".order-total .amount").html(total.toLocaleString("ru") + ' <span class="woocommerce-Price-currencySymbol">руб.</span>');
    };


    $(document).on("click", ".wac-qty-button", function(){
        var $this = $(this);
        var q = parseInt($this.siblings("input").val());
        if($this.hasClass("minus") && q > 1){
            q--;
        }else if($this.hasClass("plus")){
            q++;
        }
        var key = $this.parents(".cart_item").data("key");
        var id = $this.parents(".cart_item").data("id");
        $this.siblings("input").val(q);
        calculateTotal();
        $.ajax({
              url: "/",
              method: "POST",
              data: {
                  type: "updateCartItem",
                  q: q,
                  key: key,
                  id: id
              }
        }).done(function(data) {

        });
    });


    $(document).on("click", ".product-remove .remove", function(e){
        e.preventDefault();
        var cart_id = $(this).parents(".cart_item").data("id");
        $(this).parents(".cart_item").remove();
        var counter = 0;
        $(".cart_item").each(function(){
            counter++;
        });
        if(counter == 0){
            $(".main-content .woocommerce").html('<div class="korzina-content"><div class="korzina-p"><img src="/wp-content/themes/voxlink/img/korzinabig.png"><h2>Ваша корзина пуста</h2><a href="http://voxlink.ru/ip-pbx-hardware/" class="btn btn-orgkorzina">Вернуться назад</a></div></div>');
        }
        var currentCartCount = parseInt($(".btn-korz .orange-circle").text());
        currentCartCount--;
        $(".btn-korz .orange-circle").text(currentCartCount);
        if(currentCartCount == 0){
            $(".btn-korz .orange-circle").addClass("hide");
        }
        calculateTotal();
        $.ajax({
              url: "/",
              method: "POST",
              data: {
                  action: "removeFromCart",
                  id: cart_id
              }
        }).done(function(data) {
            console.log(data);
        });
    });

})(jQuery);