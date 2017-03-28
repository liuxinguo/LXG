<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>哥们网大战神登录器</title><link type="text/css" rel="stylesheet" href="http://www.game2.cn/special/dzs/client/css/global.css" /><link type="text/css" rel="stylesheet" href="http://www.game2.cn/special/dzs/client/css/ser.css" /><script type="text/javascript" src="http://www.game2.cn/special/common/js/jquery-1.7.2.min.js"></script><script type="text/javascript" src="http://www.game2.cn/special/common/js/J.Devel.js"></script><script type="text/javascript" src="http://www.game2.cn/special/dzs/client/js/jquery.scroll.js"></script><script type="text/javascript">
   $(document).ready(function(){
      
      
       $("#scroll").scrollBar({
            Dragelm:".bar",//拖动按钮
            direction:"top",//滚动方向
            contelm:".con",//滚动对象
            wheel:{nub:43},
            unBnt:{        //是否起用上下按钮 *可不填
               isBnt:true,
               Up:".barT",
               down:".barB"
            }
        })
   });
</script><!--[if IE 6]><script type="text/javascript" src="js/fixpng.js"></script><script>
    DD_belatedPNG.fix('*');
</script><![endif]--><style type="text/css">
html,body{overflow:hidden;background-color:#000000;border:none;}
</style></head><body oncontextmenu="return false;"><div class="wrap"><div class="logon"><p class="p1"><em><span>亲爱的</span><a href="javascript:void(0)" class="name" ><?php echo ($userinfo['uname']); ?></a>，欢迎您登录大战神！</em><a class="zhgl" href="#" target="_blank">账号管理</a><a class="exit" href="javascript:;" id="_out">退出</a></p></div><div class="newSer"><div><p><span class="t1">最近登录服务器</span></p><ul><?php if(is_array($gamelog)): $i = 0; $__LIST__ = $gamelog;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li ><a class="joinGameItem" href="http://gameplay.<?php echo ($ai["url"]); ?>/righ.html?gid=<?php echo ($gameid); ?>&ct=1&sid=<?php echo ($v["sid"]); ?>&server=S<?php echo ($v["sid"]); ?>" ><?php echo ($v["servername"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div><div id="serTab" class="serList"><div class="quick"><label>快速选服</label><input type="text" class="quicksid" value="1" name="server_num" id="sid" /><button class="jryx quickJoinGameBtn" href="javascript:;" name="serger_go" id="btnss" type="button">确定</button></div><div class="divTab"><a class="tabAreaItem on" href="javascript:void(0)">全部服务器</a></div><div style="display:none0" id="choose_pop"><div class="popup_container" id="scroll"><div class="conBox"><div class="con"><ul class="show clearfix"><?php if(is_array($server)): $i = 0; $__LIST__ = $server;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li class="s1"><a class="joinGameItem" href="http://gameplay.<?php echo ($ai["url"]); ?>/righ.html?gid=<?php echo ($gameid); ?>&ct=1&sid=<?php echo ($v["sid"]); ?>&server=S<?php echo ($v["sid"]); ?>" ><?php echo ($v["servername"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ul></div></div><div class="scrollBar"><div class="barT"></div><div class="barM"><a class="bar" href="javascript:void(0)"></a></div><div class="barB"></div></div></div></div></div></div><script>
$(function(){
    $('.divTab a').click(function(){
        var liindex = $('.divTab a').index(this);
        $(this).addClass('on').siblings().removeClass('on');
        $('.con ul').eq(liindex).fadeIn(150).siblings('ul').hide();
        return false;
    });
});

$(".newSer ul li:last").css("margin-right","0");
</script><script type="text/javascript">    $('#_out').bind('click', '', function(){
        $.get('/member/logout',{},function(){
            location.href="dlq";
        });
    });
	
			$('#btnss').click(function(){
				var _s=parseInt($('input#sid').val().replace(/[^\d]/g,' '));
				if(_s>0){
					var _u=$('#getusername').html(),_h='http://gameplay.<?php echo ($ai["url"]); ?>/righ.html?gid=<?php echo ($gameid); ?>&ct=1&sid='+_s;
					window.location.href=_h;   
				}
				return false;
			});

            $('#new_server a,#last_server a,.server_list a').live('click',function(){
				var _s=$(this).attr('data_server').replace('S',''),_n=$(this).attr('data_name'),_u=$('#getusername').html(),_h=$(this).attr('href');
				location.href=_h;
				return false;
			});
			
			$('.global_logout').click(function(){
				window.location.href="dlq"; 
		        return false;
		    });

	

</script></body></html>