(function($){
    $(document).ready(function(){
        $(".bookmark-remove").on("click", function(){
            var id = $(this).prev().data("id") + "";
            var bookmarksString = Cookies.get('bookmarks');
            var bookmarksArray = bookmarksString.split(",");
            var index = bookmarksArray.indexOf(id);

            bookmarksArray.splice(index, 1);
            if(bookmarksArray.length == 0){
                Cookies.remove('bookmarks');
                $(".filterBlock").replaceWith('<div class="col-md-12 bookmarks-not-found">В закладках пока нет ни одного товара :(</div>');
            }else{
                bookmarksString = bookmarksArray.join(",");
                Cookies.set('bookmarks', bookmarksString);
            }

            $(this).parents(".col-md-4").remove();
        });
    });
})(jQuery)