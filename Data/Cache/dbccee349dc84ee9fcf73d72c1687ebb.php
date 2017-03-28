<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=7" /><title>游戏盒子新服_游戏盒子最新服|新区_49you游戏盒子开服表-49you游戏盒子官网</title><meta name="keywords" content=""><meta name="description" content="49you游戏盒子开服表大全为您提供最全最新的游戏盒子开服表，游戏盒子新服，游戏盒子新区，让您随时了解游戏盒子最新开服信息。"><link href="http://<?php echo ($ai["domain"]); ?>/images/hezi/css/style.css" rel="stylesheet" type="text/css" /><link rel="stylesheet" type="text/css" href="http://<?php echo ($ai["domain"]); ?>/images/hezi/zhuanpan/css/home.css"/><script type="text/javascript" src="http://gamebox.49you.com/js/jquery-1.7.2.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/images/hezi/zhuanpan/js/ajax.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/images/hezi/zhuanpan/js/fast_register.js"></script><script language="javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script></head><body><div class="wrap_div"><div class="wrap1_div"><div class="wrap_left fl"><div class="serverlist_div"><div class="container"><div class="content"><div class="event2"><div class="event2_pan"><span id="lottery_style"  class="sp"></span><!--  点击--><a href="#" onclick="lottery_info();" class="sp3"></a><div class="denglu"><!--登录前--><div class="denglu_nei" id="denglu_nei"><h1>账  号  登  陆</h1><input id="usname" type="text" value="请输入账号"  onblur="if (value ==''){value='请输入账号';}" onclick="if(this.value=='请输入账号'){this.value='';}" /><input id="uspsd" type="password" /><div class="reg_img"><a href="http://reg.49you.com/" target="_blank"><img src="http://<?php echo ($ai["domain"]); ?>/images/hezi/zhuanpan/images/pan_reg_icon.jpg" width="78" height="27" /></a></a></div><div class="login_img"><a href="javascript:;" id="doLogin" onclick="javascript:memberLogin(1);"><img src="http://<?php echo ($ai["domain"]); ?>/images/hezi/zhuanpan/images/pan_login_icon.jpg" width="78" height="27" /></a></a></div></div><!--登录后--><div class="denglu_nei_hou" id="denglu_nei_hou"  style="display:none;"><input type="hidden" id="login_name"><p>您好，<br/>
                                       亲爱的<span id="user_name"></span>，<br/>
 您已成功登陆，现在直接按<br/>
照步骤参与活动即可。</p><p>赠宝:<span id="user_coins"></span> &nbsp;积分:<span id="user_points"></span></p></div></div></div><a  name="qd"></a></div><a  name="lq"></a></div></div><!--登陆弹出框--><div  class="rule_up" id="bingPhone"><p class="up_close"></p><p class="up_top"></p><div class="up_content"><div class="login_tit">  您好，需要通过绑定手机才能参与！</div><input id="type" name="do" type="hidden" value="login" /><p><a class="login_btns"  value="立即绑定" href="http://www.49you.com/phone.html" target="_blank" id="login_btn" style=" background:#59b7ff;" ><span class="reg_btn"  onclick="$popup('#reg_btn','.up_close ')" >30秒快速绑定手机</span></a></p></div><p class=" up_bottom"></p></div><!--登陆弹出框结束--></div></div><div class="wrap_right fl"><!--yxph_div start--><div class="yxph_div"><div id="tab-title"><span class="selected">游戏周排行榜</span><span>最新游戏行榜</span></div><div id="tab-content"><div><div class="star" id="weeklist"></div></div><div class="hide "><div class="star" id="monthlist"></div></div></div></div><!--yxph_div end--><script type="text/javascript">
	//周排行
	var show_king_id = 1;
	function show_king_list(e,k)
	{
		if(show_king_id == k) return true;
			o = document.getElementById("a"+show_king_id);
			o.className = "bg bor";
			//o.style.borderBottom = "1px solid #bbc1c4";
			
		e.className = " ";
		
		show_king_id = k;
	}
	
	function show_king_list2(e,k)
	{
		if(show_king_id == k) return true;
			o = document.getElementById("b"+show_king_id);
			o.className = "bg bor";
			//o.style.borderBottom = "1px solid #bbc1c4";
			
		e.className = " ";
		
		show_king_id = k;
	}
  function logingame(url){
    if(typeof(window.external.logingame) == 'undefined' ){
      window.location.href=url;
    }else{
      window.external.logingame(url);
    }
  }
   $.ajax({
        type: "get",
        async: true,
        url: api_hezi+"/weekandmonth",
        data:{},
        dataType: "jsonp",
        jsonp: "callback",
        jsonpCallback:"_apilist",
        success: function(json) {
           var weeklist = json.week; 
           var monthlist = json.month;
           for(x in weeklist){
              x = parseInt(x);
              var gameurl = "server_list.html?gid="+weeklist[x].game_id;
              var weekdl = '<dl id=a'+(1+x)+' '+ (x==0 ? 'style=" overflow:hidden;"' : " class=bg") +' onmouseover=show_king_list(this,'+(1+x)+');><dt class="sl01" style="'+(x==0?'background:#e41313':(x==1?'background:#f66d1a':(x==2?'background:#ffc600':'')))+';">'+(1+x)+'</dt><dt class="sl02"><a href="'+gameurl+'"><img src="'+image_url+weeklist[x].ico+'" width="30" height="30" /></a></dt><dt class="sl03"><a href="'+gameurl+'" ><img src="'+image_url+weeklist[x].ico+'" width="20" height="20" /></a></dt><dd class="sl04"><a href="'+gameurl+'">'+weeklist[x].game_name+'</a><br />'+weeklist[x].game_pay_num+'人在线</dd><dd class="sl05"><a href="'+gameurl+'">'+weeklist[x].game_name+'</a>&nbsp;&nbsp;<img src="http://gamebox.49you.com/images/hicon.jpg" alt="" /></dd><dd class="sl06"><a href="'+gameurl+'"><img src="http://gamebox.49you.com/images/startyxbtn.jpg" alt="" /></a></dd><dd class="sl07">'+ weeklist[x].game_class +'></dd></dl>';
                            
              $('#weeklist').append(weekdl);
           }
           for(y in monthlist){
              y = parseInt(y);
              var gameurl = "server_list.html?gid="+monthlist[y].game_id;
              var monthdl = '<dl id=b'+(1+y)+' '+ (y==0 ? 'style=" overflow:hidden;"' : " class=bg") +' onmouseover=show_king_list2(this,'+(1+y)+');><dt class="sl01" style="'+(y==0?'background:#e41313':(y==1?'background:#f66d1a':(y==2?'background:#ffc600':'')))+';">'+(1+y)+'</dt><dt class="sl02"><a href="'+gameurl+'"><img src="'+image_url+monthlist[y].ico+'" width="30" height="30"  /></a></dt><dt class="sl03"><a href="'+gameurl+'"><img src="'+image_url+monthlist[y].ico+'" width="20" height="20" /></a></dt><dd class="sl04"><a href="'+gameurl+'">'+monthlist[y].game_name+'</a><br />'+monthlist[y].game_pay_num+'人在线</dd><dd class="sl05"><a href="'+gameurl+'">'+monthlist[y].game_name+'</a>&nbsp;&nbsp;<img src="http://gamebox.49you.com/images/hicon.jpg" alt="" /></dd><dd class="sl06"><a href="'+gameurl+'"><img src="http://gamebox.49you.com/images/startyxbtn.jpg" alt="" /></a></dd><dd class="sl07">'+ monthlist[y].game_class +'></dd></dl>';
                            
              $('#monthlist').append(monthdl);
           }
 
        },
        error: function() {}
    });      
  </script></div></div></div><script language="javascript">
$(document).ready(function(){
  $('#tab-title span').hover(function(){
    $(this).addClass("selected").siblings().removeClass();//removeClass就是删除当前其他类；只有当前对象有addClass("selected")；siblings()意思就是当前对象的同级元素，removeClass就是删除；
    $("#tab-content > div").hide().eq($('#tab-title span').index(this)).show();
  });

  $('#newstab-title span').hover(function(){
    $(this).addClass("selected").siblings().removeClass();//removeClass就是删除当前其他类；只有当前对象有addClass("selected")；siblings()意思就是当前对象的同级元素，removeClass就是删除；
    $("#newstab-content > div").hide().eq($('#newstab-title span').index(this)).show();
  });
  
  $('#servertab-title span').live("hover",function(){
    $(this).addClass("selected").siblings().removeClass();//removeClass就是删除当前其他类；只有当前对象有addClass("selected")；siblings()意思就是当前对象的同级元素，removeClass就是删除；
    $("#servertab-content > div").hide().eq($('#servertab-title span').index(this)).show();
  });
  
  $('.zxsp_ul li').hover(function(){
    $(this).find('a').fadeIn(100);
  });
  $('.zxsp_ul li').mouseleave(function(){
    $(this).find('a').fadeOut(100);
  });
  
  $('.glmj_ul li').hover(function(){
    $(this).find('a.arrowdiv0').fadeIn(100);
  });
  $('.glmj_ul li').mouseleave(function(){
    $(this).find('a.arrowdiv0').fadeOut(100);
  });
});
</script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/images/hezi/zhuanpan/js/jquery1.8.3.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/images/hezi/zhuanpan/js/zt.js"></script></body></html>