/* 
* @Author: Marte
* @Date:   2017-01-11 09:48:36
* @Last Modified by:   Marte
* @Last Modified time: 2017-01-12 14:03:22
*/


$(function(){

    smallGround();
    gonggao();


});

    //小轮播图
var timer2,intervals = 3000,index ,o = 0;

function smallGround(){
    $(".kv-cnt li:not(:first-child)").hide();
    $(".kv-nav li").on("click",function(){
        index = $(this).index();
        o = index;
        $(this).addClass("cur").siblings().removeClass("cur");
        $(".kv-cnt li").filter(":visible").hide().parent().children().eq(index).show();
    })

    timer2 = setInterval(smallLunBo,intervals);

    $(".kv-cnt").hover(function(){
        clearInterval(timer2);
    },function(){
        timer2 = setInterval(smallLunBo,intervals);
    })
}

// // 小图背景轮播
function smallLunBo(){
    var count = $(".kv-nav li").length - 1;
    o = o >= count ? 0 : ++o;
    $(".kv-nav li").eq(o).trigger("click");
}
// 公告栏
function gonggao(){
    $(".news-tab li").mouseover(function(){
        $(this).addClass("current").siblings().removeClass("current");
        $(".news-list ul").eq($(this).index()).show().siblings().hide();

    })
}