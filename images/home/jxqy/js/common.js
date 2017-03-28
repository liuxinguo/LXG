
$(function(){
	gamesPhoto();
})


// 游戏截图
function gamesPhoto(){
    var list = $('.picture');
    var prev = $('.but-game-pic-prev');
    var next = $('.but-game-pic-next');
    var index = 1;
    var len = 3;
    var interval = 3000;
    var timer;
    function animate (offset) {
        var left = parseInt(list.css('left')) + offset;
        if (offset>0) {
            offset = '+=' + offset;
        }else {
            offset = '-=' + Math.abs(offset);
        }
        list.animate({'left': offset}, 300, function () {
            if(left > -100){
                list.css('left', -294 * len);
            }
            if(left < (-294 * len)) {
                list.css('left', -294);
            }
        });
    }

    next.bind('click', function () {
        if (list.is(':animated')) {
            return;
        }
        if (index == 4) {
            index = 1;
        }else {
            index += 1;
        }
        animate(-294);
        
    });

    prev.bind('click', function () {
        if (list.is(':animated')) {
            return;
        }
        if (index == 1) {
            index = 4;
        }else {
            index -= 1;
        }
        animate(294);
    });

    function play() {
        timer = setTimeout(function () {
            next.trigger('click');
            play();
        }, interval);
    }
    play();
    function stop() {
        clearTimeout(timer);
    }

    $('.picture li').hover(stop,play);
    
}
