<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html  xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title></title><link rel="stylesheet" type="text/css" href="/images/login/css/skill_bot.css" /><script src="/images/login/js/jquery-1.7.2.min.js"></script></head><body><div class="skill_nav"><a id="fold_button" href="javascript:void(0);" onfocus="this.blur()" class="fold_right"></a></div><script type="text/javascript">
//动作统计

$(function() {
	$("#fold_button").bind("click",function(){
			window.parent.frames['leftFrame'].webgameleft_sh(1);
			window.parent.frames['topFrame'].is_leftbar(2);
			window.parent.frames['rightFrame'].is_leftbar(2);
			$(window.parent.document).find("#bottomFrame").attr("cols","50,0,*");
	});
})

function fold_button_open() {
		window.parent.frames['leftFrame'].webgameleft_sh(2);
		window.parent.frames['topFrame'].is_leftbar(1);
		window.parent.frames['rightFrame'].is_leftbar(1);
		$(window.parent.document).find("#bottomFrame").attr("cols","110,10,*");
}

</script></body></html>