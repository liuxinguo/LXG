<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><title>网页游戏第一平台</title><link rel="stylesheet" type="text/css" href="/images/login/css/skill_nav.css" /><script src="/images/login/js/jquery-1.7.2.min.js"></script><script src="/images/login/js/swfobject.js"></script></head><body><div class="skill_nav" id="webgameleft_1"><div class="skill_nav_wrap"><ul class="nav_list"><li><a target="_blank" href="http://pay.752g.com/">充值中心</a></li><li><a target="_blank" href="http://gm.752g.com/">客服中心</a></li><li><a target="_blank" href="http://libao.752g.com/">专属礼包</a></li><li class="zhounian"><a target="_blank" href="http://www.752g.com/zhounian">今日推荐</a></li><li class="fanli"><a target="_blank" href="http://zixun.752g.com/news/375">充值返利</a></li></ul></div></div><!-- 小图版本 --><div class="skill_nav skill_nav_small" id="webgameleft_2" style="display:none;"><div class="skill_nav_wrap"><ul class="s_nav_list"><input type="hidden" id="is_topbar" value="1"><input type="hidden" name="weiduan" id="weiduan" value=""><input type="hidden" name="tag" id="tag" value="sd"><li><a class="sn_9" href="http://sd.752g.com/" target="_blank">官网</a></li><li><a id="wtsc_li2_a" class="sn_12" href="http://fuli.752g.com/fuli/sd/#sc" target="_blank">免费首充</a></li><li style="float:none;clear:both;font-size:0;line-height:0;padding:0;"></li><li><a class="sn_5" href="http://fuli.752g.com/fuli/sd/#lb" target="_blank">新手卡</a></li><li><a class="sn_6" href="http://sd.752g.com/gonglve" target="_blank">攻略</a></li><li><a class="sn_7" href="http://sd.752g.com/huodong" target="_blank">活动</a></li><li><a class="sn_8" href="http://pay.752g.com/index.html?t=yeepay&amp;gid=122&amp;sid=0&amp;type=0" target="_blank">充值</a></li><li><a class="sn_10" href="javascript:void(0);" id="webgameleft_screenshots2">游戏截屏</a></li><li><a class="sn_11" href="http://gm.752g.com/" target="_blank">联系客服</a></li><li><a class="fold_left" href="javascript:void(0);" onclick="window.parent.frames['middleFrame'].fold_button_open();">展开</a></li></ul></div></div><script type="text/javascript">function webgameleft_sh(i) {
	if(i == 1) {
		if($('#is_topbar').val() == 1) {
			$('#webgameleft_logo2').hide();
		}else {
			$('#webgameleft_logo2').show();
		}
		$('#webgameleft_2').show();
		$('#webgameleft_1').hide();
	}else if(i == 2) {
		$('#webgameleft_1').show();
		$('#webgameleft_2').hide();
	}
}
function is_topbar(i) {
	$('#is_topbar').val(i);
}
function is_webgameleft_log(i) {
	if(i == 1) {
		$('#webgameleft_logo2').show()
	}else {
		$('#webgameleft_logo2').hide()
	}
}
</script><!--小图标end --><script src="/images/login/js/webgameleft.js?v=20140121005"></script></body></html>