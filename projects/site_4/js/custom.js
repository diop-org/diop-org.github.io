$(document).ready(function(){
    $("#top_content_right_coloumn a").append("<span></span>");
    $("#top_content_right_coloumn a").hover(function(){
        $(this).children("span").fadeIn(600);
    },function(){
        $(this).children("span").fadeOut(100);
    });
});

$(document).ready(function(){
    $("#bottom_content_left_coloumn_latest_projects a").append("<span></span>");
    $("#bottom_content_left_coloumn_latest_projects a").hover(function(){
        $(this).children("span").fadeIn(600);
    },function(){
        $(this).children("span").fadeOut(100);
    });
}); 

$(document).ready(function(){
    $("#top_content_portfolio a.zoom").append("<span></span>");
    $("#top_content_portfolio a.zoom").hover(function(){
        $(this).children("span").fadeIn(600);
    },function(){
        $(this).children("span").fadeOut(100);
    });
});