(function($){
    $(document).ready(function(){
        var currentStep = 1;

        $(document).on("click",".checkout-next", function(e){
            e.preventDefault();
            var error = 0;
            $("#step"+currentStep+" .tab.active input").validate();
            $("#step"+currentStep+" .tab.active .has-error").each(function(){
                error++;
            });

            if(error == 0){
                $(".my-checkout-step[data-step="+currentStep+"]").addClass("active");
                currentStep++;
                $("#step"+currentStep).addClass("active").siblings(".my-checkout-step-content").removeClass("active");
                $("html, body").animate({
                    scrollTop: $(".my-checkout").offset().top
                });
            }

            console.log(error);
        });


        $("#step2 input").change(function(){
            $(".delivery-text").removeClass("active").slideUp(500);
            $(this).parent().next().slideDown(500);
        });


        $("input[type=file]").change(function(){
            var file = $(this)[0].files[0]
            if(file){
                $(".file-block-btn .checkout-btn").text(file.name);
            }else{
                $(".file-block-btn .checkout-btn").text("Выбрать файл");
            }

            $(this).validate();
        });


        $(".submit-order").on("click", function(e){
            e.preventDefault();

            var data = $(".checkout-form").find("input,textarea");
            // $.each($('.file-block-btn input')[0].files, function(i, file) {
            //     data.append('file-'+i, file);
            // });

            $.ajax({
                url: '/',
                data: data,
                method: 'POST',
                success: function(data){
                    console.log(data);
                    location.href = "/thankyou/";
                }
            });
        });

    });
})(jQuery)