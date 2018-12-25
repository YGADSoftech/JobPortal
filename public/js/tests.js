

$(document).ready(function(){

    DimLinks();
    $('li > a').click(function() {

        $('li').removeClass();
        $(this).parent().addClass('active');

        var list  = $(".navbar > div > div > #navbar > ul").children();
        if(!$(list[1]).hasClass("signin"))
        {
            $(list[1]).addClass('signin');
        }
    });


    $("li > a").hover(function(){
        $(this).animate({opacity: '1'},500);
    }, function(){
        if($(this).parent().hasClass('active'))
        {
            $(this).animate({opacity: '1'},1000);
            // DimLinks();
        }
        else {
            $(this).animate({opacity: '0.3'}, 1000);
        }
    });



var tid = setInterval(DimLinks, 2000);

});


$(window).on('load', function () {
        var div = $(".navbar> div > div > .navbar-header>a>img");
        div.effect("shake",{distance:5,time:0},500);


});



function DimLinks() {
    console.log("dj");
    var list  = $(".navbar > div > div > #navbar > ul").children();

    for (i = 0; i < list.length; i++) {
        if(!$(list[i]).hasClass("active"))
        {
            $(list[i].childNodes).animate({opacity: '0.3'}, 1000);
            if($(list[i]).hasClass("signin"))
            {
                $(list[i].childNodes).animate({opacity: '1'}, 1000);   
            }         
        }
        else
        {
            $(list[i].childNodes).animate({opacity: '1'}, 1000);  
        }
    }

}