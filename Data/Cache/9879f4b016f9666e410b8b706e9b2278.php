<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>平台币兑换_充值中心_<?php echo ($ai["title"]); ?>-<?php echo ($ai["sitename"]); ?></title><meta name="keywords" content="<?php echo ($ai["keywords"]); ?>,活动专区"><meta name="description" content="<?php echo ($ai["description"]); ?>"><link rel="stylesheet" href="/images/2016752g/css/bar.css"><link href="http://<?php echo ($ai["domain"]); ?>/css/style.css" rel="stylesheet" type="text/css" /><link rel="stylesheet" type="text/css" href="http://<?php echo ($ai["domain"]); ?>/css/pay.css" /><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/jquery.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/basic.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/pay_new.js"></script><script src="/images/2016752g/js/header.js"></script><style type="text/css">
body{
behavior:url(css/iehoverfix.htc);   /*文件路径为htc文件相对于该网页文件的路径*/
}
</style><!--[if IE 6]><script src="http://<?php echo ($ai["domain"]); ?>/js/DD_belatedPNG.js"></script><script>
  DD_belatedPNG.fix('.logo,.yx_box,.yx_box_1');
</script><![endif]--></head><body><!-- 导航栏 --><div id="header"><!-- 导航条顶部 --><div class="header"><div class="header-hd"><!-- 导航栏顶部左边 --><ul class="header-hd-left"><li><a href="http://<?php echo ($ai["domain"]); ?>/shortcut" class="to-desk">把<?php echo ($ai["title"]); ?>放在桌面桌面</a></li><li><a href="#" onclick="SetHome(this,'http://<?php echo ($ai["domain"]); ?>');" class="home-page">设为首页</a></li><li><a href="#" onclick="AddFavorite('http://<?php echo ($ai["domain"]); ?>','<?php echo ($ai["title"]); ?>');"  class="on-home">加入收藏</a></li></ul><!-- 导航栏顶部搜索框 --><!-- <form action="" method="post"><div class="header-hd-middle"><p>游戏</p><input type="text" placeholder="请输入搜索内容"><i></i></div></form> --><!-- 导航栏顶部右边 --><div class="header-hd-right"><!-- 登录前 --><ul class="register-prev" style="margin-left:40%;" id="reg"><li class="prev-denglu"><a href="javascript:;">登录</a>|</li><li><a href="http://reg.<?php echo ($ai["url"]); ?>" style="margin-left:5px;">注册</a></li></ul><!-- 登录后 --><ul class="register-next" id="loginok" style="display:none;"><li class="register-next-a"><a href="http://user.<?php echo ($ai["url"]); ?>" id="topname"></a><!-- 我的个人资料 --><!-- <ol class="game-platform" style="display:none"><li ><a class="active" href="#"><p>游戏平台hkjhkjkj</p><i></i></a></li><li class="game-platform-2"><a href="#"><span></span>账号安全</a></li><li class="game-platform-3"><a href="#"><span></span>VIP特权</a></li><li class="game-platform-4"><a href="#"><span></span>我的礼包</a></li><li class="game-platform-5"><a href="#"><span></span>我的积分</a></li><li class="game-platform-6"><a href="#"><span></span>退出登录</a></li></ol> --></li><li><a href="#"><span></span></a></li><li class="u-msg has-msg"><a href="http://user.<?php echo ($ai["url"]); ?>/user_message">消息 <span></span></a><!-- 消息内容 --><!--<div class="my-news" style="display:none;"><p>共有 <a>2条</a> 新消息</p><ul class="my-news-matter"><li class="news-matter-1"><div class="news-matter-nav">激情夏日,欧洲杯半决赛竞猜火热开启<a>2016-07-06 15:12:00</a></div><div class="news-matter-tit">猜半决赛比赛胜者，赢海量积分和阿迪耐克！...　<a href="register-xinxi.html">详细>></a></div></li></ul></div>--></li><li class="exit"><a href="javascript:void(0);" onclick="exit();return false;">[退出]</a></li></ul><!-- 所有游戏 --><div class="all-games"><span>所有游戏</span><i></i><div class="games-nav" style="display:none;"><ul style="margin-top:3px;"><?php if(is_array($loaddh_game)): $i = 0; $__LIST__ = $loaddh_game;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="http://<?php echo ($vo["tag"]); ?>.<?php echo ($ai["url"]); ?>"><label class="nav<?php echo ($i); ?>"><?php echo (mysubstr(0,4,$vo["gamename"])); ?></label><?php echo ($vo["gamename"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?><li><a href="http://gameplay.<?php echo ($ai["url"]); ?>/">更多>></a></li></ul></div></div></div></div></div><!-- 导航条 --><div class="header-nav"><!-- logo --><div class="logo"><img src="/images/2016752g/img/logo.png" alt=""></div><ul class="nav-navi"><li><a href="http://<?php echo ($ai["domain"]); ?>/">首页</a></li><?php if(empty($userinfo['uname'])): ?><li><a href="http://user.<?php echo ($ai["url"]); ?>/login">用户中心</a></li><?php else: ?><li><a href="http://user.<?php echo ($ai["url"]); ?>">用户中心</a></li><?php endif; ?><li><a href="http://daquan.<?php echo ($ai["url"]); ?>">游戏中心</a></li><li class="nav-active"><a href="http://pay.<?php echo ($ai["url"]); ?>/">充值中心</a></li><li><a href="#" onClick="return confirm('敬请期待！');">积分商城</a></li><li><a href="http://libao.<?php echo ($ai["url"]); ?>">礼包中心</a></li><li><a href="http://gm.<?php echo ($ai["url"]); ?>/">客服中心</a></li><li><a href="http://zixun.<?php echo ($ai["url"]); ?>">游戏资讯</a></li><li><a href="http://bbs.<?php echo ($ai["url"]); ?>">官方论坛</a></li><li><a href="http://<?php echo ($ai["domain"]); ?>/youxihe">游戏盒子</a></li></ul></div></div><div class="B_bg"><div class="pay_box"><div class="pay_l fl"><div class="pay_l_t"></div><ul><?php if(is_array($pay_type)): $i = 0; $__LIST__ = $pay_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pay_type): $mod = ($i % 2 );++$i;?><input type="hidden" id="pay_type_<?php echo ($pay_type["tag"]); ?>" value="<?php echo ($pay_type["tag"]); ?>"><input type="hidden" id="pay_rate_<?php echo ($pay_type["tag"]); ?>" value="<?php echo ($pay_type["rebate"]); ?>"><input type="hidden" id="pay_name_<?php echo ($pay_type["tag"]); ?>" value="<?php echo ($pay_type["payname"]); ?>"><input type="hidden" id="pay_desc_<?php echo ($pay_type["tag"]); ?>" value="只要您开通网上银行服务，足不出户即可实现快捷准确的帐号充值。请勿在此通道中使用其他方式充值。"><input type="hidden" id="pay_help_<?php echo ($pay_type["tag"]); ?>" value="#"><div  id="pay_help_desc_<?php echo ($pay_type["tag"]); ?>" style="display:none"><?php echo ($pay_type["content"]); ?></div><li id="p_<?php echo ($pay_type["tag"]); ?>" onclick="javascript:on_pay_type_change(this,'<?php echo ($pay_type["tag"]); ?>','<?php echo ($pay_type["rebate"]); ?>','<?php echo ($pay_type["payname"]); ?>)','只要您开通网上银行服务，足不出户即可实现快捷准确的帐号充值。请勿在此通道中使用其他方式充值。','#');"><span class="p_<?php echo ($pay_type["tag"]); ?> g"><?php echo ($pay_type["payname"]); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?><li id="p_account"  class="li_h"><span class="p_coins g">平台币兑换</span></li><!-- 
              <li id="p_coins" onclick="javascript:on_pay_type_change(this,'coins','1.00','赠宝兑换','','http://zixun.49you.com/cjwt/czwt/11524.html');"><span class="p_coins g">赠宝兑换</span></li>p_account
              <li id="p_rengong" onclick="javascript:on_pay_type_change(this,'rengong','10.00','人工充值','','http://www.49you.com/news_info_24778.html');"><span class="p_rengong g">人工充值</span></li>			--></ul></div><div class="pay_r fl"><div class="yx_box fl" id="pay_game_box"></div><div class="yx_box_1 fl" id="pay_server_box"></div><div class="pay_r_t" id="pay_r_t">您还没有登录：&nbsp;
			  <a style="color:#0f8dc4;" href="http://login.<?php echo ($ai["url"]); ?>?returl=http://pay.<?php echo ($ai["url"]); ?>">[登录]</a>&nbsp;
			  <a href="http://reg.<?php echo ($ai["url"]); ?>?returl=http://pay.<?php echo ($ai["url"]); ?>" style="color:#ff7429;">[注册]</a></div><ul><form id="form1" name="form1" method="post" target="_blank"  action="/topay" onsubmit="return check_form();"><li class="bb"><div class="pay_r_t1 fl">1.充值到哪里？</div><div class="pay_r_czfs fl"><ul><a href="index.html?pay_platform=game"><li>充值到游戏</li><a href="index.html?pay_platform=platform"><li><img src="/images/pay/jian.gif" width="15" height="14" align="absmiddle" />充值到平台</li><a href="/exchange.html" ><li class="li_s">平台币兑换</li></a></ul></div><div class="pay_r_box fl"><ul><li class="cc"><div class="pay_r_t1 fl" id="pay_type_desc">2.选择游戏</div><div id="change_game_box" class="pay_r_xzyx fl"><input id="game_id" name="game_id" value="0" type="hidden"><input id="server_id" name="server_id" value="0" type="hidden"><a href="javascript:void(0);" onclick="showGameList();" class="yx1" id="changeGame" style="color:#fff;">选择充值的游戏</a><a href="javascript:void(0);" id="changeServer" class="yx2" style="color:#fff;">选择游戏服务器</a></div><div id="tip" style="color:#F00;  width:100%;text-align:left; font-weight:900; display:none;">进行《神曲》充值的角色等级必须 6 级或以上，请确认后操作</div><div class="pay_r_t1 fl">3.确认账号信息</div><div class="pay_r_czzh fl"><label>充值账号：</label><label class="tip" id="exchange_member_name"></label></div><div class="pay_r_czzh fl"><label>您剩余的平台币：</label><label class="tip" id="exchange_money"></label></div><div class="pay_r_czzh fl" id="li_game_rname" style=" display: none"><label class="name">选择充值角色：</label><span class="zh"><select name="re_game_rid" style="width:152px;z-index:2;" type="text" id="re_game_rid" class="select_game pay_txt" onchange="on_rolechange(this);"></select></span><em>*</em><span><a href="javascript:void(0);" onclick="get_role(1);">刷新</a></span></div><div class="pay_r_t1 fl">4.请选择兑换额</div><div class="fl" id="type_tip" style="margin:10px 0px 10px 55px; display:none;"><p style="text-align:left; color:#F00; margin-bottom:5px;">钻石充值 即时到账，月卡充值 按类型分期到账</p><br><input type="radio" name="return_type" id="return_type_1" value="1_1_" onclick="hide_option('no');" checked="checked"> 钻石充值
                          <input type="radio" name="return_type" id="return_type_2" value="0_1_1" onclick="hide_option('2');"> Vip月银卡
                          <input type="radio" name="return_type" id="return_type_3" value="0_2_1" onclick="hide_option('4');"> Vip月金卡
                      </div><div id="chang_menoy_0" class="pay_r_czje fl" style="_padding-top:15px; *padding-top:15px;display:none;"><span class="name">aaa</span><span class="zh"></span></div><div id="chang_menoy_1" class="pay_r_czje fl" style="_padding-top:15px; *padding-top:15px;"><span class="name">您要兑换的平台币：</span><span class="zh"><input id="pay_amount" class="zhanghao" type="text" value="100" onblur="on_oth_amount_blur(this);" name="pay_amount"></span><span>  输入兑换数量（10的整数倍）</span></div><div id="chang_menoy_2" class="pay_r_czje fl" style="_padding-top:15px; *padding-top:15px;display:none;" ><span class="name">您要兑换的平台币：</span><span id="chang_menoy_3" class="zh"></span></div><div id="chang_menoy_4" class="pay_r_czje fl" style="_padding-top:15px; *padding-top:15px;display:none;" ><span class="name">您要兑换的平台币：</span><span id="chang_menoy_5" class="zh"></span></div><div class="pay_r_czje fl" style="_padding-top:15px; *padding-top:15px;padding-top:15px;"><span class="name">获得游戏货币：</span><span id="pay_amount_show" class="count">请先选择充值套餐</span></div><div class="clear"></div><input id="game_rate" type="hidden" value="1" name="game_rate"><input id="pay_type" type="hidden" value="" name="pay_type"><input name="typefs" type="hidden" id="typefs"  value="0" /><input id="pay_rate" type="hidden" value="10" name="pay_rate"><input id="game_paytorole" type="hidden" value="0" name="game_paytorole"><input id="re_game_rname" type="hidden" value="0" name="re_game_rname"><input id="member_name" type="hidden" value=""><div class="pay_r_btn fl"><input type="image" src="http://www.49you.com/images/pay/btn_cz.jpg"  onmouseover="this.src='http://www.49you.com/images/pay/btn_cz1.jpg'" onmouseout="this.src='http://www.49you.com/images/pay/btn_cz.jpg'"/></div><div class="pay_js fl"><p class="p0"><span style="font-size:10.0000pt;font-family:'宋体';">兑换说明：</span><span style="color:#515151;font-size:10.0000pt;font-family:'宋体';"><br /></span><span style="color:#515151;font-size:10.0000pt;font-family:'宋体';">1、每次兑换最低金额为50个平台币；</span><span style="color:#515151;font-size:10.0000pt;font-family:'宋体';"><br /></span><span style="color:#515151;font-size:10.0000pt;font-family:'宋体';">2、如浏览器设置屏蔽弹窗功能请进行关闭，以免无法选择兑换等情况；</span><span style="color:#515151;font-size:10.0000pt;font-family:'宋体';"></span></p><p class="p0"><span style="color:#515151;font-size:10.0000pt;font-family:'宋体';">3、如有兑换异常情况请联系[</span><span><a href="http://gm.<?php echo ($ai["url"]); ?>/"><span class="15" style="color:#0000FF;text-decoration:none;font-size:10.0000pt;font-family:'宋体';">在线客服</span></a></span><span style="color:#515151;font-size:10.0000pt;font-family:'宋体';">]<span style="color:#515151;font-size:10.0000pt;font-family:'宋体';">[<a target="_blank" href="http://zixun.<?php echo ($ai["url"]); ?>">更多充值帮助</a></span><a target="_blank" href="http://zixun.49you.com"><span><a><span class="15" style="color:#0000FF;text-decoration:none;font-size:10.0000pt;font-family:'宋体';"></span></a></span></a><span style="color:#515151;font-size:10.0000pt;font-family:'宋体';">]</span></span><span style="color:#515151;font-size:10.0000pt;font-family:'宋体';"></span></p><p class="p0"><span style="color:#FF0000;font-size:10.0000pt;font-family:'宋体';">温馨提示：请兑换时务必确认好您的兑换金额无误，避免输错兑换金额导致的失误，如造成兑换选择错误我们将一律不予处理此类退款申诉。</span><span style="color:#FF0000;font-size:10.0000pt;font-family:'宋体';"></span></p></div></li></ul></div></li></form></ul></div></div></div><script type="text/javascript">
    var gid=0;
    var game_id = "0";
    var type=0;
    var login_url ='http://login.49you.com';
    $(document).ready(function(){
           var typefs = getRequest('type');
           if(typefs=='1')
           {
                $('#typefs').val(typefs);
                type = 1;
           }     
           $.ajax({
               type: "get",
               async: true,
               url: api_url+"/checkPay",
               data:{'gid': $_GET['gid'],'sid': $_GET['sid']},
               dataType: "jsonp",
               jsonp: "callback",
               jsonpCallback:"checkPay",
               success: function(data){
                   if(data==''){
                       window.location.href=login_url+'?returl='+window.location.href;
                   }else{
                       var game_id = "0";
                       var server_id = "0";
                       var game_code = data.game_code;
                       var gid = data.gid;
                       var server_id = data.sid;
                       var bj = "0";
                       if(data.username!=''){
                           $('#pay_r_t').html('您当前帐号为：&nbsp;<b style="color:#0f8dc4;">'+data.username+'</b>&nbsp;<a href="'+api_url+'/loginout?returl='+pay_url+'/exchange.html?gid=0&sid=0">[更换账号]</a>&nbsp;&nbsp;<a href="'+user_url+'/trans_record.html" style="color:#ff7429;">[查看充值记录]</a>');
                       }
                       $('#member_name').val(data.username);
                       $('#exchange_member_name').html(data.username);
                       $('#exchange_money').html(data.money);
                       if(game_code!=''){
                          showServerList(gid,server_id);
                       }
                   }
               }
           });
           //默认支付方式
          
       });

function on_pay_type_change(obj,pay_type, pay_rate,pay_type_name,pay_type_desc,pay_help){
        var pay_help_desc=$('#pay_help_desc_'+pay_type).html();
        $('.pay_js').html(pay_help_desc);
        $('.pay_l ul li').attr('class', '');
        $('#p_' + pay_type).addClass('li_h');
        $(".pay_l ul li").each(function(){
            var d = $(this).attr('id');
            $('#'+d+ ' span').removeClass(d+'_1');
            $('#'+d+ ' span').addClass(d);
        });
        $('#p_' + pay_type+ ' span').removeClass('p_'+pay_type);
        $('#p_' + pay_type+ ' span').addClass('p_'+pay_type+'_1');
        var gid=$_GET['gid'];
        var sid=$_GET['sid'];
        var username = $('#member_name').val();
        if(gid==undefined){
            var gid=0;
        }
        if(sid==undefined){
            var sid=0;
        }
    if(pay_type=='account'){
		return ;
	//}else if(pay_type=='coins'){
	//	window.location.href='coins_change.html?gid='+gid+'&sid='+sid+'&type='+type;
	//	return;
	//}else if (pay_type == 'rengong') {
    //           window.location.href = 'pay_rengong.html?gid=' + gid + '&sid=' + sid + '&username=' + username + '&type='+type;
    //          return;
        }else{
		window.location.href='index.html?t='+pay_type+'&gid='+gid+'&sid='+sid+'&type='+type;
	}

}


function on_oth_amount_blur(obj){
	obj.value = Math.floor( parseInt(obj.value) / 10 ) * 10;
	if(parseInt(obj.value) > parseInt($('#total_cur').html()) ){
		obj.value = Math.floor( parseInt($('#total_cur').html()) / 10 ) * 10;
	}
	if(parseInt(obj.value) < 100 ){
		alert("兑换额必须为50的倍数");
		obj.value = 100;
	}



	var v = parseInt(obj.value);

	obj.value = ( isNaN(v) ? 0 : v );
	on_rate_change();
}

function on_rate_change(){
	var money = $('#pay_amount').val();
	if(money=='0'){
		money = parseInt($('#oth_amount').val());
	}
	var cur = money;
	var game_cur = Math.floor(cur * parseFloat($('#game_rate').val()));
    var hundred = [1000];
    function in_array(v,arr){for(var i=0,k=arr.length;i<k;i++){if(v==arr[i]){return true;}}return false;}
	$('#pay_amount_show').html( game_cur );//数据库里是10 = 1.00 所以这里*10
}

       
function hide_option(id) {


		$('#chang_menoy_0').hide();
		$('#chang_menoy_1').show();
		$('#chang_menoy_2').hide();
		$('#chang_menoy_4').hide();
		$('#pay_amount').val('1000');
	on_rate_change();
}
function check_form()
{
	if(document.form1.game_id.value== 0)
	{
		alert('请选择游戏！');
		document.form1.game_id.focus();
		return false;
	}
	return true;
}
function getRequest(strName){
    var strHref = window.location.href;
    var intPos = strHref.indexOf("?");
    var strRight = strHref.substr(intPos + 1);
    var arrTmp = strRight.split("&");
    for(var i = 0; i < arrTmp.length; i++ ) {
    var arrTemp = arrTmp[i].split("=");
    if(arrTemp[0].toUpperCase() == strName.toUpperCase()) return arrTemp[1];
    }
    return 0;
} 
</script><!-- 尾部 --><div id="footer"><div class="ft-nav"><div class="rec-game tc"><label>推荐游戏:</label><?php if(is_array($loaddh_game)): $i = 0; $__LIST__ = array_slice($loaddh_game,0,10,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a target="_blank" href="http://<?php echo ($vo["tag"]); ?>.<?php echo ($ai["url"]); ?>" title="<?php echo ($vo["gamename"]); ?>" ><?php echo ($vo["gamename"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></div><p class="ft-company tc"><a href='http://daquan.<?php echo ($ai["url"]); ?>' target='_blank'>游戏大厅</a>|
                        <a href='http://zixun.<?php echo ($ai["url"]); ?>/news/298' target='_blank'>联系我们</a>|
                        <a href='http://zixun.<?php echo ($ai["url"]); ?>/news/297' target='_blank'>公司简介</a></p><p class="ft_feiyang tc">Copyright &copy;2016 <?php echo ($ai["title"]); ?><a target="_blank" href="http://<?php echo ($ai["domain"]); ?>" ><?php echo ($ai["domain"]); ?></a><a href="/images/zizhi/icp.jpg" target="_blank">京ICP证120137号</a><a href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010702001414" target="_blank">京公网安备11010702001414号</a><a href="/images/zizhi/ww.jpg" target="_blank">京网文【2014】2008-258号</a><p class="ft-zquan tc">北京飞扬天下网络科技股份有限公司(证券代码：831302)<a href="http://www.miibeian.gov.cn/">京ICP备11049124-2号 </a></p><ul class="ft-wj"><li><a class="wj-01" href="http://www.bjeit.gov.cn/">公共信息安全网络检查</a></li><li><a class="wj-02" href="http://www.cyberpolice.cn/wfjb/html/index.shtml">不良信息举报中心</a></li><li><a class="wj-03" href="#">企业信用评级证书</a></li><li><a class="wj-04" href="/images/zizhi/ww.jpg">互联网文化经营单位</a></li><li><a class="wj-05" href="http://www.hd315.gov.cn/">北京市工商行政管理局</a></li><li><a class="wj-06" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010702001414">京公网安备 <br>11010702001414</a></li><li><a  key ="583eb069efbfb014cd56a0b7"  logo_size="124x47"  logo_type="business"  href="http://www.anquan.org" ><script src="//static.anquan.org/static/outer/js/aq_auth.js"></script></a></li><div style="display: none;"><script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1256269989'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1256269989%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script><!-- QiDianDA --><script>
(function(w, a, m){m='__qq_qidian_da';w[m]=a;w[a]=w[a]||function(){(w[a][m]=w[a][m]||[]).push(arguments);};})(window,'qidianDA');
qidianDA('create', '2852137359', 'a6654f76bf839e8dddbfc43a2bb45034', {
    mtaId: '500381538'
});
qidianDA('set', 't1', new Date());
</script><script async src="//bqq.gtimg.com/da/i.js"></script><!-- End QiDianDA --></div><!-- WPA start --><script src="//wp.qiye.qq.com/qidian/2852137359/c547bb4b7be187c45bfeba5e740fac6a" charset="utf-8"></script><!-- WPA end --></ul><p class="miaoshu tc">抵制不良网页游戏，拒绝盗版游戏。 注意自我保护，谨防受骗上当。 适度游戏益脑，沉迷游戏伤身。 合理安排时间，享受健康生活。</p></div></div><!-- 固定返回顶部按钮 --><div id="guding"><div class="erweima" title="微信二维码"><div class="weima" style=""><div class="weima-tu"><img src="/images/2016752g/img/bg-top-erwei.jpg" alt=""><i></i></div></div></div><div class="kefu" title="客服服务"><a href="http://gm.<?php echo ($ai["rul"]); ?>"></a></div><div style="margin-top:2px;" id="rtt"><img src="/images/2016752g/img/fhdb_off.jpg" title="返回顶部"></div></div><script src="/images/2016752g/js/login.js"></script></body></html>