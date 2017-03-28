$(function(){
	gamesPhoto();
})


// 游戏截图
function gamesPhoto(){
    var list = $('.jt-scroll');
    var prev = $('.prev');
    var next = $('.next');
    var index = 1;
    var len = 4;
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
                list.css('left', -353 * len);
            }
            if(left < (-353 * len)) {
                list.css('left', -353);
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
        animate(-353);
        
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
        animate(353);
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

    list.hover(stop,play);
    list.hover(function(){
        prev.show();
        next.show();
        $('.prev,.next').hover(function(){
            prev.show();
            next.show();
        },function(){
            prev.hide();
            next.hide();
        })
    },function(){ 
        prev.hide();
        next.hide();
    })
    
}