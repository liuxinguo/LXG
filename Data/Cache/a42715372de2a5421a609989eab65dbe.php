<?php if (!defined('THINK_PATH')) exit();?>var nav ="";
nav += '<link href="http://<?php echo ($ai["domain"]); ?>/images/top/top.css?20130606" rel="stylesheet" type="text/css" />';
nav += '<link href="http://<?php echo ($ai["domain"]); ?>/images/top/foot.css" rel="stylesheet" type="text/css" />';
//nav += '<script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/jquery.js"></script>';
nav += '<script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/images/top/heziend.js"></script>';
nav += '<div class="nav_header">';
nav += '<div class="nav_dh1 zz_nav">';
nav += '<div class="fl"><a href="http://<?php echo ($ai["domain"]); ?>/"><img src="/images/top/logo.png" height="35"/></a></div>';
nav += '<div class="nav_dh11 fl"><span class="nav_zhs_col1"><strong>推荐游戏：</strong></span>';
<?php if(is_array($game_tj)): $i = 0; $__LIST__ = array_slice($game_tj,0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$game_tj): $mod = ($i % 2 );++$i;?>nav += '<a href="http://<?php echo ($game_tj["tag"]); ?>.<?php echo ($ai["url"]); ?>/" target="_blank"><?php echo ($game_tj["gamename"]); ?></a>&nbsp;|&nbsp;';<?php endforeach; endif; else: echo "" ;endif; ?>
nav += '<a href="http://www.<?php echo ($ai["url"]); ?>/youxihe" target="_blank"><span class="nav_zhs_col1">游戏盒子</span></a>';
nav += '</div>';
nav += '<div class="nav_dh12 fr">';
nav += '<p style="width:270px;height:30px"></p>';
nav += '<p class="nav_zhs_col1"><a href="http://reg.<?php echo ($ai["url"]); ?>" class="green" target="_blank">注册</a>&nbsp;&nbsp;&nbsp;</p>';
nav += '<p class="nav_zhs_col1"><a href="http://user.<?php echo ($ai["url"]); ?>" class="green" target="_blank">登陆</a>&nbsp;&nbsp;&nbsp;</p>';
nav += '<p class="nav_zhs_col1"><a href="http://pay.<?php echo ($ai["url"]); ?>" target="_blank">账号充值</a>&nbsp;&nbsp;&nbsp;</p>';
nav += '<a onmouseover="showAllGame();" onmouseout="hiddenAllGame();" style="text-decoration:none !important;"><div class="nav_yx_2918 fl cur" style="color:#000000 !important;">所有游戏 </div></a>';
nav += '</div>';
nav += '</div>';
nav += '</div>';

nav += '<div id="topWX"></div>';

nav += '<div class="allgame_91wan" style="width:980px; margin:0 auto; z-index:100000000;  position:relative; " onmouseover="showAllGame();" onmouseout="hiddenAllGame();">';
nav += '<div class="nav_yer_1">';
nav += '<div class="nav_navBox" style="display:none;" id="all_game">';
nav += '<div class="nav_nav">';
nav += '<h2>欢迎来到<?php echo ($ai["title"]); ?>，现在就开始您的游戏之旅吧!</h2>';
nav += '<div class="nav_lst nav_clear">';
<?php if(is_array($loaddh_game)): $i = 0; $__LIST__ = $loaddh_game;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>nav += '<a target="_blank" class="nav_lnk nav_apic" href="http://<?php echo ($vo["tag"]); ?>.<?php echo ($ai["url"]); ?>/" <?php if(($i) == "1"): ?>style="color:red;"<?php else: endif; ?>><?php echo ($vo["gamename"]); ?></a>';<?php endforeach; endif; else: echo "" ;endif; ?>nav += '<a target="_blank" class="nav_lnk nav_apic" href="http://daquan.<?php echo ($ai["url"]); ?>">更多</a>';

nav += '</div>';
nav += '</div>';
nav += '<div class="cl"></div>';
nav += '</div>';
nav += '</div>';
nav += '</div>';
nav += '<div id="fixdivTop"><div class="fdivTop pred"><div class="fcenterdiv pred"><a href="http://<?php echo ($ai["domain"]); ?>/dlq/setup.exe" class="xiazai_a paed db"></a></div><a href="javascript:;" class="gbbtn_a paed db"></a></div></div>';

document.writeln(nav);

_footer = '<div id="f2e-gw-footer"><div class="footer_div"><div class="footerLogo3"><a href="http://<?php echo ($ai["domain"]); ?>" target="_blank"><img src="/images/top_logo.png"></a></div><div class="footer_content"><div><a href="http://www.752g.com">关于我们</a><em>|</em><a href="http://www.752g.com/jzjh/">家长监护</a><em>|</em><a href="http://zixun.752g.com/news/249">服务条款</a><em>|</em><a href="http://pay.752g.com">在线支付</a><em>|</em><a target="_blank" href="http://gm.752g.com">客服中心</a></div><div>北京飞扬天下网络科技股份有限公司(证券代码:831302) 版权所有 © 2013–2016 <a href="http://<?php echo ($ai["domain"]); ?>/" target="_top"><?php echo ($ai["url"]); ?></a> 飞扬游戏</div><div><a href="http://www.miitbeian.gov.cn" target="_blank"> 京ICP备11049124-2号</a><em>|</em><a href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010702001414" target="_blank">京公网安备11010702001414号</a><em>|</em><a>京网文【2014】2008-258号</a></div><div><?php echo ($game["icp"]); ?></div><div>抵制不良游戏 拒绝盗版游戏 注意自我保护 谨防受骗上当 适度游戏益脑 沉迷游戏伤身 合理安排时间 享受健康生活</div><div>本游戏适合18岁以上用户，不含有暴力、恐怖、残酷、色情等妨害未成年人身心健康的内容，属于绿色健康产品。</div></div></div></div>';



window.onload = function(){
$(_footer).appendTo('body');
}

function showAllGame(){
	var allgame=document.getElementById("all_game");
	allgame.style.display='block';
}
function hiddenAllGame(){
	var allgame=document.getElementById("all_game");
	allgame.style.display='none';
}