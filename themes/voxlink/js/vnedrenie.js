(function($){
    $(document).ready(function () {
        $(".vncall-table-more").on("click", function(e){
            e.preventDefault();
            $(this).prev().addClass("active");
            $(this).remove();
        });
    });
})(window.jQuery)