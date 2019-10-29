(function($){
    
    
    var a = 0;
    var current,menu = [
        {
            name: 'Редактировать CSS',
            fun: function (e) {
                console.log(current);
            }
        },
        {
            name: 'Редактировать HTML',
            fun: function (e) {
                console.log(current);
            }
        }
    ];
    $(document).on("mousemove","*",function(e){
        e.preventDefault();
        e.stopPropagation();
        if (a == 0 && !$(this).parent().hasClass("iw-contextMenu")){
            current = $(this);
            current.addClass("kaliniart").css({
                "box-shadow": "0 0 10px 1px rgba(0,0,0,0.27)",
                "cursor": "pointer"
            });
        }
    });
    
    $("body").contextMenu(menu, {
        triggerOn: "click"
    });
    
    
    $(document).on("mouseleave mouseout","*",function(e){
        e.preventDefault();
        e.stopPropagation();
        if (a == 0){
            $(this).removeClass("kaliniart").css({
                "box-shadow": "",
                "cursor": ""
            }); 
        } 
    });
    
   
    
    $(document).on("click", "*", function(e) {
        e.preventDefault();
        e.stopPropagation();
    });
    
    
    
})(jQuery);

