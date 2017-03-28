<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=8" />
<title>充值中心 _<?php echo ($ai["title"]); ?></title>
<meta name="keywords" content="<?php echo ($ai["sitename"]); ?>">
<meta name="description" content="<?php echo ($ai["description"]); ?>">

<link href="/favicon.ico" rel="shortcut icon">
<style type="text/css">
.main{ width: 500px; float: content; overflow:hidden; background:#FFFFFF;}
.main_t{ overflow:hidden}
.pay_con_wrap{ background:#fff; border:1px solid #cacacc; padding:15px 15px 50px 15px; overflow:hidden}
.pay_con_wrap .pay_tips{ border:1px solid #d5d6cd; background:#ffffe1; width:500px; padding:10px; font-weight:bold; font-size:14px}
.pay_con_wrap .pay_tips span{ color:#ff4c00;}
.pay_con_wrap .pay_tips em{ color:green;margin-left:8px;font-size:11px;}
.input-text    { width:144px; height:20px; border:1px solid #b0b0b0; padding:0 2px; line-height:20px}
.pay-ul li.tips{ margin-top:0}
.c-red         { color:#a72b34}
.c-error       { color:#f20} 
.banks         { margin-top:5px}
.banks span    { float:left;width:145px; padding-left:5px;height:32px;border:1px solid #fff;margin:12px 20px 0 0;overflow:hidden; display:inline}
.banks .selected{ border:1px solid #579F00;}
.banks input   { width:14px; height:14px; display:inline-block}
.banks input,.banks img { vertical-align:middle}
.more-banks { background:url("../../images/morebank.gif") no-repeat;height:43px;width:452px;border:none;display:block;margin:15px auto 0;cursor:pointer}
body, h1, h2, h3, h4, h5, h6, hr, p, blockquote, dl, dt, dd, ul, ol, li, pre, form, fieldset, legend, button, input, textarea, th, td {
	margin:0;
	padding:0;
}
body, button, input, textarea {
	font:12px/20px "Microsoft YaHei", tahoma, arial;
	color:#333;
}
body{
    padding-top:42px;
}
h1, h2, h3, h4, h5, h6 { font-size:100%;}
address, cite, dfn, em, var {	font-style:normal;}
ul, ol, li { list-style:none;}
a img {	border:none;}
a { text-decoration:none;	color:#333;}
a:hover {	color:#ff4c00;}
.clear{ clear:both; font-size:1px; height:0px; overflow:hidden; z-index:1;}
</style>

</head><body style="padding-top:42px;">
<div id="wrapper">
<!-- 导航栏 -->

<div class="content con_wrapper fix">

<div class="main">


<div class="pay_con_wrap"><div class="pay-module"><div class="pay_tips"><span><?php if(($payorder['process']) == "1,1,1"): ?>充值成功<br/>充值物品将在5分钟内充入游戏，如未收到请请刷新游戏页面查看。<?php else: ?>充值失败<?php endif; ?></span><br/>
					</div><table class="pay-tables"><tbody><tr><th width="260px">充值方式：</th>
					<td><?php echo ($payorder["payname"]); ?><input type="hidden" value="<?php echo ($payorder["pid"]); ?>" name="paywayid" id="paywayid"></td></tr>
					<tr><th>充值游戏：</th><td><em class="c-red"><?php echo ($payorder["gamename"]); ?><input type="hidden" value="<?php echo ($payorder["gamename"]); ?>" name="proname" id="proname"><input type="hidden" value="<?php echo ($payorder["gid"]); ?>" name="proid" id="proid"></em></td></tr>
					<tr><th>充值区服：</th><td><?php echo ($payorder["servername"]); ?>-<?php echo ($payorder["line"]); echo ($payorder["sid"]); ?>服<input type="hidden" value="<?php echo ($payorder["sid"]); ?>" name="protype" id="protype"></td></tr><tr><th>订单编号：</th><td><?php echo ($payorder["paysn"]); ?><input type="hidden" value="<?php echo ($payorder["paysn"]); ?>" name="orderid" id="orderid"></td></tr>
					<tr><th>充值帐号：</th><td><em><?php echo ($payorder["uname"]); ?><input type="hidden" value="<?php echo ($payorder["uname"]); ?>" name="username" id="username"></em></td></tr><tr><th>充值金额：</th><td><?php echo ($payorder["payamount"]); ?>&nbsp;元人民币<input type="hidden" id="money" name="money" value="<?php echo ($payorder["payamount"]); ?>"></td></tr>
					<tr><th>获得数量：</th><td><?php echo ($payorder["money"]); ?>&nbsp;<?php echo ($payorder["unit"]); ?></td></tr><tr><th>充值状态：</th><td><?php if(($payorder['process']) == "1,1,1"): ?>充值成功<?php else: ?>充值失败<?php endif; ?></td></tr></tbody></table>
					

					
					</div>
					
					
					</div><!-- 充值的游戏 结束 --></div><!-- main结束 --></div>
					
	
		

					</div></div>
					
	
</body>
</html>