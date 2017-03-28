var account = $('#account').val();
var gid = $('#gid').val();
var sid = $('#sid').val();
var thedefault_width = $('#default_width').val();
var thedefault_height = $('#default_height').val();
var load_xz_js=0,load_jf_js=0;

//设置Tips是否显示
function setBaituStatus(x){
	var show = window.parent.frames["leftFrame"].$("#val").val();	
	if(x=="block" && show==parseInt(1) ){
		$('.video').css('display',x);
		$(".video").html('<iframe id="video_box_ff" scrolling="no" frameborder="no" border="0"  src="/webgameright/tips" ></iframe>');
        setTimeout(function(){CloseBaituTip();},10000);
	}
} 	

//判断页面是否加载完成
function judgeOnload(){
	if (document.readyState=="complete"){
		return 1;  //已加载完成
    }else{
		return 0;  //还未加载完
	}
} 


function setVideoWH(x,y){
	$('.video').css('width',x);
	$('.video').css('height',y);
	$('#video_box_ff').css('width',x);
	$('#video_box_ff').css('height',y); 
}  

function CloseBaituTip(){
	$('#video').html("").hide();
	window.parent.frames["leftFrame"].SetCookie('setvideoCookie','VideoCookie');
}   




function flashHTML(){
    var that = this;
    var flashUI = [];
    var server_flash ='http://static.51img1.com/v5/webim/server_new.swf?v='+Math.random();
    var client_flash ='http://static.51img1.com/v5/webim/client_new.swf?v='+Math.random();
    var flash33 ='http://static.51img1.com/v5/webim/flex33.swf?v='+Math.random();
    if ($.browser.msie){
        flashUI.push('<object id="sock" width="1" height="1" type="application/x-shockwave-flash" align="middle" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"><param value="'+flash33+'" name="movie" /><param value="high" name="quality" /><param value="transparent" name="wmode" /><param value="all" name="allowNetworking" /><param value="false" name="allowFullScreen" /><param value="true" name="menu" /><param value="always" name="allowScriptAccess" /></object>');
        flashUI.push('<object id="client_local" width="1" height="1" type="application/x-shockwave-flash" align="middle" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"><param value="'+client_flash+'" name="movie" /><param value="high" name="quality" /><param value="transparent" name="wmode" /><param value="all" name="allowNetworking" /><param value="false" name="allowFullScreen" /><param value="true" name="menu" /><param value="always" name="allowScriptAccess" /></object>');
        flashUI.push('<object id="server_local" width="1" height="1" type="application/x-shockwave-flash" align="middle" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"><param value="'+server_flash+'" name="movie" /><param value="high" name="quality" /><param value="transparent" name="wmode" /><param value="all" name="allowNetworking" /><param value="false" name="allowFullScreen" /><param value="true" name="menu" /><param value="always" name="allowScriptAccess" /></object>');
    } else {
        flashUI.push('<embed id="sock" src="'+flash33+'" allowNetworking="all" wmode="transparent" quality="high" type="application/x-shockwave-flash" width="1" height="1" menu="true" allowFullScreen="false" allowScriptAccess="always" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash"></embed>');
        flashUI.push('<embed id="client_local" src="'+client_flash+'" allowNetworking="all" wmode="transparent" quality="high" type="application/x-shockwave-flash" width="1" height="1" menu="true" allowFullScreen="false" allowScriptAccess="always" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash"></embed>');
        flashUI.push('<embed id="server_local" src="'+server_flash+'" allowNetworking="all" wmode="transparent" quality="high" type="application/x-shockwave-flash" width="1" height="1" menu="true" allowFullScreen="false" allowScriptAccess="always" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash"></embed>');
    }
    return flashUI.join('');
}

/**
 * 发送统计数据
 */
function stat_func(stat_key){
    if(stat_key != ""){
        var rand_dom = Math.random();
        $.get('http://game.51.com/act/pv_stat', {
            p_k: stat_key,
            r:rand_dom
        }, function(response){});
    }
}

function wt_stat()
{
    var wt_script = $('#wt_script').val();
    if (wt_script)
    {
        stat_func(wt_script);
    }
}


//控制 游戏滚动条是否显示
function show_scroll(default_width,default_height)
{
    var thewidth,theheight;
    thewidth = document.documentElement.clientWidth;
    theheight = document.documentElement.clientHeight;
    if (parseInt(default_height)==0 && parseInt(default_width)>800)
    {
        $('#gameFrame').css({
            "overflow-x":"auto",
            "overflow-y":"hidden"
        });
    }
    if (parseInt(default_width)>800)
    {
        if (parseInt(thewidth)>default_width)
        {
            $('#gamein').css({
                "width":"100%"
            });
        }
        else
        {
            $('#gamein').css({
                "width":default_width+'px'
            });
        }
    }
    if (parseInt(default_height)>500)
    {
        if (parseInt(theheight)>default_height)
        {
            $('#gamein').css({
                "height":"100%"
            });
        }
        else
        {
            $('#gamein').css({
                "height":default_height+'px'
            });
        }
    }
}

function get_cookie(c_name){
    if (document.cookie.length>0) {
        var c_start=document.cookie.indexOf(c_name + "=");
        if (c_start!=-1) { 
            c_start=c_start + c_name.length+1; 
            var c_end=document.cookie.indexOf(";",c_start);
            if (c_end==-1) c_end=document.cookie.length;
            return unescape(document.cookie.substring(c_start,c_end));
        } 
    }
    return "";
}

function set_cookie(name,value,expires,path){
    var expDays = expires*24*60*60*1000;
    var expDate = new Date();
    expDate.setTime(expDate.getTime()+expDays);
    var expString = ((expires==null) ? "" : (";expires="+expDate.toGMTString()));
    var pathString = ((path==null) ? "" : (";path="+path));
    document.cookie = escape(name) + "=" + escape(value) + expString + pathString;
}

//弹签到弹层
function show_sign_layer()
{
    //游戏是否有首充礼包标示，1有，0没有
    var shouchong_flag = $('#shouchong_flag').val();
    var show_flag = get_cookie('sign_layer1_'+account);
    if (1 != parseInt(show_flag))
    {
        if(1 == parseInt(shouchong_flag))
        {
            var sign_str = '<div class="skill_navSignBox" id="sign_layer" style="background-color:#fff;"><span id="qiandao_flash" alt="http://static.51img1.com/v3/op/gamenew.51.com/platform/webgame/drawer/images/shouchong.swf"></span></div>'
        }
        else
        {
            var sign_str = '<div class="skill_navSignBox" id="sign_layer" style="background-color:#fff;"><span id="qiandao_flash" alt="http://static.51img1.com/v3/op/gamenew.51.com/platform/webgame/drawer/images/hongbao.swf"></span></div>'
        }
      
		
        swfobject.embedSWF($("#qiandao_flash").attr("alt"), "qiandao_flash",160, 102, "9.0.0", false, {}, {
            quality : "high",
            wmode : "transparent",
            allowScriptAccess : "always"
        }, {}); 
        set_cookie('sign_layer1_'+account,"1",1,'/');
        var theimg = new Image();
        theimg.src = 'http://gameapi.51.com/statistics/dss_port?key_name=签到弹层展示次数&c2=玩游戏页&c3=签到引导&v='+Math.random();
        $("#sign_layer").parent().animate({left: 40, top: 90}, (1*1000));
    }
}


function sign_close_statistics()
{
    $("#sign_layer").parent().animate({left: -165, top: 90}, (1*1000));
    var theimg = new Image();
    theimg.src = 'http://gameapi.51.com/statistics/dss_port?key_name=签到弹层关闭次数&c2=玩游戏页&c3=签到引导&v='+Math.random();
}

function sign_click_statistics()
{
    window.open("http://my.51.com/?sign=1");
    window.parent.frames["leftFrame"].stop_run(2);
    $("#sign_layer").parent().animate({left: -165, top: 90}, (1*1000));
    var theimg = new Image();
    theimg.src = 'http://gameapi.51.com/statistics/dss_port?key_name=签到弹层点击次数&c2=玩游戏页&c3=签到引导&v='+Math.random();
}

$(function(){
    get_layer(gid,sid);
    
    setInterval(function(){
        get_timer(gid,sid,account);
    }, 900000);
    
    //如果以前没弹过，五分钟显示签到弹层
    setTimeout(function(){show_sign_layer()},60000);
    
    //贵宾QQ绑定，后台主动设置
    setTimeout(function (){
        $.getJSON("/qqim/todo?callback=?&gid="+$("#gid").val(), function(data){
            if (data.str)
            {
                $("body").append(data.str);
                qq_check.init_by_hand();
            }
        });
    }, 300 * 1000);
        

    if (parseInt(thedefault_width)>800 || parseInt(thedefault_height)>500)
    {
        show_scroll(thedefault_width,thedefault_height);
        
        $(window).bind("resize", function() {
            show_scroll(thedefault_width,thedefault_height);
        });
    }
    
    //外投退弹
    if(getQueryString("from_ly") == 'wd_jjsg'){
    }else {
	    var poup_c = get_cookie('poup_c');
	    if('-1' == poup_c){
				$.getScript("http://static.51img1.com/v3/op/gamenew.51.com/platform/act/51wt/js/window_poup_webgame.js?v=1", function(){
					window_poup.init("http://game.51.com/newserver/go_to/?url_id=game_play_poup"); 
					var image = new Image();
					image.src="http://game.51.com/tools/dss_stat/?url_id=game_play_poup&stat_type=poup_pre&r="+Math.random();
					setTimeout(function(){window_poup.set_poup(false);var image1 = new Image();
					image1.src="http://game.51.com/tools/dss_stat/?url_id=game_play_poup&stat_type=poup_cancel&r="+Math.random();},3600000);			
					poup_c ++;
					set_cookie('poup_c',poup_c,1,"/");
				});
	    }
    }
})

function getQueryString(name) {
	var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
	var r = window.location.search.substr(1).match(reg);
	if (r != null) return unescape(r[2]);return null;
}

function show_xz_flash()
{
    if (load_xz_js < 1)
    {
        $.getScript("http://static.51img1.com/v3/op/gamenew.51.com/platform/webgame/js/webgame_xz.js?v=20140120001", function() {
            load_xz_js = 1;
            show_xz_flash_go();
        })
    }
    else
    {
        show_xz_flash_go();
    }
}

function show_jf_flash()
{
    if (load_jf_js < 1)
    {
        $.getScript("http://static.51img1.com/v3/op/gamenew.51.com/platform/webgame/js/webgame_jf.js?v=20140120001", function() {
            load_jf_js = 1;
            show_jf_flash_go();
        })
    }
    else
    {
        show_jf_flash_go();
    }
}

//动作统计
function click_stat(key, c2, c3){
	var c = 'game_platform';
	(new Image()).src = 'http://game.51.com/dss_stat/stat2?a='+key+'&c='+c+'&c2='+c2+'&c3='+c3+'&v='+Math.random();
	return true;
}
