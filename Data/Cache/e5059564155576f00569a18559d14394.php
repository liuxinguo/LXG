<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title><?php echo ($ai["title"]); ?>极速游戏盒-国内最贴心游戏盒-<?php echo ($ai["title"]); ?>_<?php echo ($ai["sitename"]); ?></title><link rel="stylesheet" type="text/css" href="http://<?php echo ($ai["domain"]); ?>/images/youxihe/css/home.css"/><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/tab.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/jquery.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/index_v1.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/jquery.easing.1.3.js"></script></head><body><div class="container"><div class="header_wai"><div class="header"><div class="logo"><a href="http://<?php echo ($ai["domain"]); ?>/"><img src="/images/youxihe/images/logo.jpg" width="615" height="59" /></a></div><div class="nav"><ul><li class="sp"><a href="http://<?php echo ($ai["domain"]); ?>/">首  页</a></li><li><a href="http://daquan.<?php echo ($ai["url"]); ?>/" target="_blank">游戏大全</a></li><li><a href="http://user.<?php echo ($ai["url"]); ?>/" target="_blank">用户中心</a></li><li><a href="http://kaifu.<?php echo ($ai["url"]); ?>/" target="_blank">开服表</a></li></ul></div></div><div class="clear"></div></div><div class="bannar_wai"><div class="bannar"><a href="http://<?php echo ($ai["domain"]); ?>/dlq/setup.exe" class="sp"></a></div></div><div class="intrBox cr"><div class="intrContentBox clearfix"><span class="btnPicPage btn_pre"></span><span class="btnPicPage btn_next"></span><div class="intrPic"><ul><li><img src="/images/youxihe/images/intrPic1.jpg" width="793" height="727" /></li><li><img src="/images/youxihe/images/intrPic2.jpg" width="793" height="727" /></li><li><img src="/images/youxihe/images/intrPic3.jpg" width="793" height="727" /></li></ul></div><!-- <ul class="numBar"><li class="current"></li><li></li><li></li></ul>--></div></div><div class="part"><div class="part1"><img src="/images/youxihe/images/part1.jpg" width="1000" height="424" /></div><div class="part2"><img src="/images/youxihe/images/part2.jpg" width="1000" height="463" /></div><div class="part3"><img src="/images/youxihe/images/part3.jpg" width="1000" height="488" /></div></div><div class="ending"></div><div class="footer_wai"><!-- 页脚信息 --><!-- 页脚信息end --></div></div><script type="text/javascript" src="http://youxihe.49you.com/js/jquery-1.8.2.min.js"></script><script type="text/javascript">
	$(document).ready(function(e) {
		
		//图片切左右换动画
		$(".btnPicPage").bind("click",function(){
			var Imgs=$(".intrPic ul li"); //返回切换元素数组
			var ImgWidth=$(".intrPic ul li").width(); //返回每个切换元素的宽度
			var ThisIndex=(parseInt($(".intrPic ul").css("margin-left")))/ImgWidth; //当前索引值
			var NextIndex=$(this).index()==0?ThisIndex+1:ThisIndex-1; //下一索引值
			if(NextIndex>0) NextIndex=-Imgs.length+1;//判断尽头
			if(NextIndex<-Imgs.length+1) NextIndex=0;//判断尽头
			$(".intrPic ul").animate({marginLeft:ImgWidth*NextIndex},300); //图片转动
			//导航示图
			var Navs=$(".numBar li");
			Navs.removeClass("current");
			Navs.eq(-NextIndex).addClass("current");
		})
      });	
</script></body></html>