
$(function(){
	gamesPhoto();
})


// 游戏截图
function gamesPhoto(){
    var list = $('.game-pic-scroll ul');
    var prev = $('.but-game-pic-prev');
    var next = $('.but-game-pic-next');
    var index = 1;
    var len = 3;
    var interval = 3000;
    var timer;
    
    function animate(offset){
        var left = parseInt(list.css("left")) + offset;
        if(offset > 0){
            offset = "+=" + offset;
        }else{
            offset = "-=" + Math.abs(offset);
        }

        list.animate({"left":offset},300,function(){
            if(left >-225){
                list.css("left",-225*len);
            }
            if(left < (-225 * len)){
                list.css("left",-225);
            }
        })
    }

    next.bind("click",function(){
        if(list.is(":animated")){
            return;
        }
        if(index == 3){
            index = 1;
        }else{
            index +=1;
        }
        animate(-225);
    })

    prev.bind("click",function(){
        if(list.is(":animated")){
            return;
        }
        if(index == 1){
            index =3;
        }else{
            index -=1;
        }
        animate(225);
    })

    function play(){
        timer = setTimeout(function(){
            next.trigger("click");
            play();
        },interval)
    }
    play();

    function stop(){
        clearTimeout(timer);
    }

    $('.game-pic-scroll ul li').hover(stop,play);
}
