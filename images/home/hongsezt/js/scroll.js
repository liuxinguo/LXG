(function($){
    $.showHide = function(options){
        var defaults={
            show_num:8,     //显示多少个
            interval:3000,  //间隔秒数
            speed:600       //隐藏显示速度
        }
        var options=$.extend(defaults,options);
        var obj = options.obj;
        var show_num = options.show_num;
        var interval = options.interval;
        var speed = options.speed;
        var total_num = $(obj).size();//获取总数
        var page = Math.ceil(total_num/show_num);//总页数
        if(page>1){ //1页以上才滚动
            var p = 1;//当前显示页数
            var rotation = function(){
                if(p == page) p = 0;
                var hide_start = (p-1)*show_num;
                var hide_end = p*show_num;
                var show_start = hide_end;
                var show_end = show_start + show_num;
                if(show_end>total_num){ //最后一页没满页，将其补足
                    //有点问题，搞了好几下，没搞成，不想搞了。
                    show_end = total_num;
                    show_start = show_end - show_num;
                    hide_end = show_start;
                    hide_start = hide_end - show_num;
                }
                if(hide_start<0){//显示第一页时，隐藏的是最后一页
                    hide_end = total_num;
                    hide_start = total_num - show_num;
                }
                $(obj).slice(hide_start,hide_end).slideUp(speed);
                $(obj).slice(show_start,show_end).slideDown(speed);
                p++;
            }
            $(obj).hide().slice((p-1)*show_num,p*show_num).show();//初始化
            setInterval(rotation,interval);
        }
    }
})(jQuery);

$(document).ready(function(){
    $.showHide({obj:'#div_scroll ul li'});
});