


// 主页的 js

$(document).ready(function(){
    // 精品游戏
	$(".ul-title > li").hover(function(){
		$(".boutique-title").eq($(this).index()).css('bottom',"10px");
	},function(){
		$(".boutique-title").eq($(this).index()).css('bottom',"-39px");
	})


	// 最新游戏

	$(".cont-new-nr > li").hover(function(){
		$(".cont-new-by").eq($(this).index()).css('bottom',"0");
		
	},function(){
		$(".cont-new-by").eq($(this).index()).css('bottom',"-27px");
		
	})



    // 轮播图
    $("#bigpicarea div:not(:first-child)").hide();

    count = $("#thumbs li").length;

    $("#thumbs li").click(function(){
        var  i = $(this).index();
        n = i;
        $("#bigpicarea div").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000);
        $(this).find("a").addClass("current").end().siblings().find("a").removeClass("current");
    })

    t = setInterval(autoPlay,offset);

    $("#bigpicarea").hover(function(){
        clearInterval(t);
    },function(){
        t = setInterval(autoPlay,offset);
    })


})

    var t = n =0,count, offset = 4000;
    function autoPlay(){
        n = n >= (count - 1) ? 0 : ++n;
        $("#thumbs li").eq(n).trigger('click');
    }

    //去除游戏礼包右边的边框
    function gamesGift(){
        var len = $(".git-detauils li").length;
        for(var i=0;i<len;i++){
            $(".git-detauils li").eq(i*3+2).css("border","none"); 
        } 
    }
    gamesGift();






