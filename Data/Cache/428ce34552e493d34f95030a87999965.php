<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" /><title><?php echo ($game["gamename"]); ?>-<?php echo ($game["sid"]); ?>服[<?php echo ($game["servername"]); ?>]</title><!--webim弹层css缺少--><script src="/images/login/js/jquery-1.7.2.min.js"></script><script src="/images/login/js/swfobject.js"></script><style>
html,body,#gameFrame{height:100%;width:100%;padding:0px;margin:0px;background-color:#000;}
#imbox{ position:absolute; top:-1px; left:1px;width:1px; height:1px; background-color:#000;z-index:-1;}
.point_mall_popup{font-family:"5b8b4f53";}
.point_mall_popup .g_pop_reg_head{background:url("http://pic.51img1.com/v5/point_mall/images/pop_head_bg.gif") repeat-x;height:45px;line-height:45px;color:#fff;font-size:18px;padding:0 0 0 20px;font-family:"5fae8f6f96c59ed1";position:relative;}
.point_mall_popup .btn_c_g{display:block;background:url("http://pic.51img1.com/v5/point_mall/images/pic_0402.gif") no-repeat;text-indent:-10000px;width:104px;height:33px;overflow:hidden;margin-top:20px;}
.point_mall_popup .btn_c_g:hover{background-position:0 -42px;}

</style></head><body scroll="no"><div id="gameFrame"><iframe id="gamein" src="<?php echo ($loginurl); ?>" style="width:100%;height:100%;" frameborder="0" scrolling= "auto"></iframe></div><div id="imbox"></div><div id="poup"><object id="_pp_cnxadzoneid_01" width="0" height="0" classid="CLSID:6BF52A52-394A-11D3-B153-00C04F79FAA6"></object><object id="_pp_cnxadzoneid_02" style="position:absolute;left:1px;top:1px;width:1px;height:1px;" classid="clsid:2D360201-FFF5-11d1-8D03-00A0C959BC0A"></object></div><!--end--><script src="/images/login/js/rightop.js"></script><link rel="stylesheet" type="text/css" charset="gbk" href="/images/login/css/tools_top.css" /><div class="tools_top_xiala" id="sh_myinfo_d" onMouseOver="sh_myinfo_d_mouseover();" onMouseOut="sh_myinfo_d_mouseout();" style="width: 122px; position: absolute; z-index: 5001; left: 163.5px; top: 74.4px;display:none;"><div style="backgound-color:red;width: 100%; height: 100%; position: relative; z-index: 2; display: block;"><ol class="clear"><li><a href="http://user.<?php echo ($ai["url"]); ?>/" target="_blank">用户中心</a></li><li><a href="http://user.<?php echo ($ai["url"]); ?>/user_renzheng_psd.html" target="_blank">修改密码</a></li></ol></div><iframe scrolling="no" frameborder="0" style="position:absolute;z-index:1;left:0px;top:0px;width:100%;height:100%;" src="about:blank" class="hidden_iframe"></iframe></div><div class="tools_top_xiala" id="sh_gameinfo_d" onMouseOver="sh_gameinfo_d_mouseover();" onMouseOut="sh_gameinfo_d_mouseout();" style="width: 122px; height: 99px; position: absolute; z-index: 5001; left: 163.5px; top: 74.4px;display:none;"><div style="width: 100%; height: 100%; position: relative; z-index: 2; display: block;"><ol class="clear"><li><a href="http://<?php echo ($game["tag"]); ?>.<?php echo ($ai["url"]); ?>/" target="_blank">游戏官网</a></li><li><a href="http://<?php echo ($game["tag"]); ?>.<?php echo ($ai["url"]); ?>/gonglve" target="_blank">游戏攻略</a></li><li><a href="http://<?php echo ($game["tag"]); ?>.<?php echo ($ai["url"]); ?>/news" target="_blank">游戏新闻</a></li><li><a href="http://<?php echo ($game["tag"]); ?>.<?php echo ($ai["url"]); ?>/news" target="_blank">活动中心</a></li></ol></div><iframe scrolling="no" frameborder="0" style="position:absolute;z-index:1;left:0px;top:0px;width:100%;height:100%;" src="about:blank" class="hidden_iframe"></iframe></div><script src="/images/login/js/righbop.js"></script></body></html>