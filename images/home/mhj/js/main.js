//调用flash
var weblink="/server_list"
innerSWF("startdiv","/images/home/mhj/swf/start.swf", "mydiv0", "223", "116", "9","weblink="+weblink) 
innerSWF("headerbg","/images/home/mhj/swf/headbg.swf", "mydiv2", "100%", "900", "9") 
innerSWF("logodiv","/images/home/mhj/swf/logo.swf", "mydiv1", "330", "185", "9") 
innerSWF("regdiv","/images/home/mhj/swf/reg.swf", "mydiv1", "223", "53", "9") 



   

    //切换
    function newshow(a, b, c) {
        $('.newstop').show()
        $(a + ' ul').find('li').removeClass('current')
        $(a + ' ul').find('li').eq(c).addClass('current')
        $(b).find('ul').hide()
        $(b).find('ul').eq(c).show()
    }

$(".bodybgdiv").height($(document).height());
//变换
function zlshow(t){
	//$('.gamezlpic').hide();
	$(t).show();
	$(t).stop().animate({top:0})
}
function zlhide(t){
	//$('.gamezlpic').show();
	$(t).stop().animate({top:190},function(){$(t).hide()})
}

//视频
$(document).ready(function(e) {
    $('.mediabox').click(function(){
		meiashow()
		$('.tipsbox').show();
		$('.bodybgdiv').show();
	})
	$('.mediaclose').click(function(){
		$('.tipsbox').hide();
		$('.bodybgdiv').hide();
	})
});

//视频播放
function meiashow(){
var so = new SWFObject("http://image.ledu.com/mhj_new/swf/CuPlayerMiniV4.swf","CuPlayerV4","650","380","9","#000000"); 
	so.addParam("allowfullscreen","true"); 
	so.addParam("allowscriptaccess","always"); 
	so.addParam("wmode","opaque"); 
	so.addParam("quality","high"); 
	so.addParam("salign","lt"); 
	so.addVariable("CuPlayerSetFile","http://image.ledu.com/mhj_new/swf/CuPlayerSetFile.xml"); //播放器配置文件地址,例 SetFile.xml、SetFile.asp、SetFile.php、SetFile.aspx 
	so.write("CuPlayer"); 
}


