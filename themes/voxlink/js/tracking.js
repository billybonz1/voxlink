//Код отслеживания

    var rowDate;
    var updateSeconds = function(){
        $.ajax({
            method: "POST",
            url: "/",
            data: {
                action: "updateSecond",
                row: rowNumber,
                seconds: secondsOnSite,
                actionName: "Посещение страницы сайта",
                date: rowDate,
                url: location.href
            }
        }).done(function(data){
            console.log("Seconds updated");
        });
    }


    var rowNumber = 0;

    var secondsOnSite = 0;
    setInterval(function(){
        secondsOnSite++;
        if(secondsOnSite%30 == 0){
            updateSeconds();
        }
    },1000);


    var historyData = {
        action: "addHistory",
        actionName: "Посещение страницы сайта",
        url: location.href,
        title: $("title").html()
    }

    var pageID = $("body").data("page-id");
    if(pageID != ""){
        historyData.id = pageID;
    }
    $.ajax({
        method: "POST",
        url: "/",
        data: historyData
    }).done(function(data){
        var arr = data.split(",");
        $(".current-user").html(arr[0]);
        rowNumber = arr[1];
        rowDate = arr[2];
        console.log(data);
    });


    $("a").on("click", function(){
        updateSeconds();
    });
