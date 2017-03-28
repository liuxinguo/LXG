<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>充值中心-<?php echo ($ai["title"]); ?>-<?php echo ($ai["sitename"]); ?></title><meta name="keywords" content="<?php echo ($ai["keywords"]); ?>,活动专区"><meta name="description" content="<?php echo ($ai["description"]); ?>"><link rel="stylesheet" href="/images/2016752g/css/bar.css"><link href="http://<?php echo ($ai["domain"]); ?>/css/style.css" rel="stylesheet" type="text/css" /><link rel="stylesheet" type="text/css" href="http://<?php echo ($ai["domain"]); ?>/css/pay.css" /><script type="text/javascript">var gmoney = 200;</script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/jquery.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/basic.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/pay_new.js"></script><script src="/images/2016752g/js/header.js"></script><style type="text/css">
body{
behavior:url(css/iehoverfix.htc);   /*文件路径为htc文件相对于该网页文件的路径*/
}
</style><!--[if IE 6]><script src="http://<?php echo ($ai["domain"]); ?>/js/DD_belatedPNG.js"></script><script>
  DD_belatedPNG.fix('.logo,.yx_box,.yx_box_1');
</script><![endif]--></head><body><!-- 导航栏 --><div id="header"><!-- 导航条顶部 --><div class="header"><div class="header-hd"><!-- 导航栏顶部左边 --><ul class="header-hd-left"><li><a href="http://<?php echo ($ai["domain"]); ?>/shortcut" class="to-desk">把<?php echo ($ai["title"]); ?>放在桌面桌面</a></li><li><a href="#" onclick="SetHome(this,'http://<?php echo ($ai["domain"]); ?>');" class="home-page">设为首页</a></li><li><a href="#" onclick="AddFavorite('http://<?php echo ($ai["domain"]); ?>','<?php echo ($ai["title"]); ?>');"  class="on-home">加入收藏</a></li></ul><!-- 导航栏顶部搜索框 --><!-- <form action="" method="post"><div class="header-hd-middle"><p>游戏</p><input type="text" placeholder="请输入搜索内容"><i></i></div></form> --><!-- 导航栏顶部右边 --><div class="header-hd-right"><!-- 登录前 --><ul class="register-prev" style="margin-left:40%;" id="reg"><li class="prev-denglu"><a href="javascript:;">登录</a>|</li><li><a href="http://reg.<?php echo ($ai["url"]); ?>" style="margin-left:5px;">注册</a></li></ul><!-- 登录后 --><ul class="register-next" id="loginok" style="display:none;"><li class="register-next-a"><a href="http://user.<?php echo ($ai["url"]); ?>" id="topname"></a><!-- 我的个人资料 --><!-- <ol class="game-platform" style="display:none"><li ><a class="active" href="#"><p>游戏平台hkjhkjkj</p><i></i></a></li><li class="game-platform-2"><a href="#"><span></span>账号安全</a></li><li class="game-platform-3"><a href="#"><span></span>VIP特权</a></li><li class="game-platform-4"><a href="#"><span></span>我的礼包</a></li><li class="game-platform-5"><a href="#"><span></span>我的积分</a></li><li class="game-platform-6"><a href="#"><span></span>退出登录</a></li></ol> --></li><li><a href="#"><span></span></a></li><li class="u-msg has-msg"><a href="http://user.<?php echo ($ai["url"]); ?>/user_message">消息 <span></span></a><!-- 消息内容 --><!--<div class="my-news" style="display:none;"><p>共有 <a>2条</a> 新消息</p><ul class="my-news-matter"><li class="news-matter-1"><div class="news-matter-nav">激情夏日,欧洲杯半决赛竞猜火热开启<a>2016-07-06 15:12:00</a></div><div class="news-matter-tit">猜半决赛比赛胜者，赢海量积分和阿迪耐克！...　<a href="register-xinxi.html">详细>></a></div></li></ul></div>--></li><li class="exit"><a href="javascript:void(0);" onclick="exit();return false;">[退出]</a></li></ul><!-- 所有游戏 --><div class="all-games"><span>所有游戏</span><i></i><div class="games-nav" style="display:none;"><ul style="margin-top:3px;"><?php if(is_array($loaddh_game)): $i = 0; $__LIST__ = $loaddh_game;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="http://<?php echo ($vo["tag"]); ?>.<?php echo ($ai["url"]); ?>"><label class="nav<?php echo ($i); ?>"><?php echo (mysubstr(0,4,$vo["gamename"])); ?></label><?php echo ($vo["gamename"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?><li><a href="http://gameplay.<?php echo ($ai["url"]); ?>/">更多>></a></li></ul></div></div></div></div></div><!-- 导航条 --><div class="header-nav"><!-- logo --><div class="logo"><img src="/images/2016752g/img/logo.png" alt=""></div><ul class="nav-navi"><li><a href="http://<?php echo ($ai["domain"]); ?>/">首页</a></li><?php if(empty($userinfo['uname'])): ?><li><a href="http://user.<?php echo ($ai["url"]); ?>/login">用户中心</a></li><?php else: ?><li><a href="http://user.<?php echo ($ai["url"]); ?>">用户中心</a></li><?php endif; ?><li><a href="http://daquan.<?php echo ($ai["url"]); ?>">游戏中心</a></li><li class="nav-active"><a href="http://pay.<?php echo ($ai["url"]); ?>/">充值中心</a></li><li><a href="#" onClick="return confirm('敬请期待！');">积分商城</a></li><li><a href="http://libao.<?php echo ($ai["url"]); ?>">礼包中心</a></li><li><a href="http://gm.<?php echo ($ai["url"]); ?>/">客服中心</a></li><li><a href="http://zixun.<?php echo ($ai["url"]); ?>">游戏资讯</a></li><li><a href="http://bbs.<?php echo ($ai["url"]); ?>">官方论坛</a></li><li><a href="http://<?php echo ($ai["domain"]); ?>/youxihe">游戏盒子</a></li></ul></div></div><div class="B_bg"><div class="pay_box"><div class="pay_l fl"><div class="pay_l_t"></div><ul><?php if(is_array($pay_type)): $i = 0; $__LIST__ = $pay_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pay_type): $mod = ($i % 2 );++$i;?><input type="hidden" id="pay_type_<?php echo ($pay_type["tag"]); ?>" value="<?php echo ($pay_type["tag"]); ?>"><input type="hidden" id="pay_rate_<?php echo ($pay_type["tag"]); ?>" value="<?php echo ($pay_type["rebate"]); ?>"><input type="hidden" id="pay_name_<?php echo ($pay_type["tag"]); ?>" value="<?php echo ($pay_type["payname"]); ?>"><input type="hidden" id="pay_desc_<?php echo ($pay_type["tag"]); ?>" value="只要您开通网上银行服务，足不出户即可实现快捷准确的帐号充值。请勿在此通道中使用其他方式充值。"><input type="hidden" id="pay_help_<?php echo ($pay_type["tag"]); ?>" value="#"><div  id="pay_help_desc_<?php echo ($pay_type["tag"]); ?>" style="display:none"><?php echo ($pay_type["content"]); ?></div><li id="p_<?php echo ($pay_type["tag"]); ?>" onclick="javascript:on_pay_type_change(this,'<?php echo ($pay_type["tag"]); ?>','<?php echo ($pay_type["rebate"]); ?>','<?php echo ($pay_type["payname"]); ?>)','只要您开通网上银行服务，足不出户即可实现快捷准确的帐号充值。请勿在此通道中使用其他方式充值。','#');"><span class="p_<?php echo ($pay_type["tag"]); ?> g"><?php echo ($pay_type["payname"]); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?><input type="hidden" id="pay_type_account" value="account"><input type="hidden" id="pay_rate_account" value="1.00"><input type="hidden" id="pay_name_account" value="平台币兑换"><input type="hidden" id="pay_desc_account" value="平台币可以充值<?php echo ($ai["title"]); ?>的任意一款游戏，可以通过推广返利和参加<?php echo ($ai["title"]); ?>举办的活动　<a href=return.html >推广返利详情>></a>"><input type="hidden" id="pay_help_account" value="/news_info_2617.html"><div  id="pay_help_desc_account" style="display:none"><!--1--></div><li id="p_account" onclick="javascript:on_pay_type_change(this,'account','1.00','平台币兑换','平台币可以充值<?php echo ($ai["title"]); ?>的任意一款游戏，可以通过推广返利和参加<?php echo ($ai["title"]); ?>举办的活动　<a href=return.html >推广返利详情>></a>','/news_info_2617.html');"><span class="p_coins g">平台币兑换</span></li><!--
			     <input type="hidden" id="pay_type_coins" value="coins"><input type="hidden" id="pay_rate_coins" value="1.00"><input type="hidden" id="pay_name_coins" value="赠宝兑换"><input type="hidden" id="pay_desc_coins" value=""><input type="hidden" id="pay_help_coins" value="/news_info_34943.html"><div  id="pay_help_desc_coins" style="display:none"></div><li id="p_coins" onclick="javascript:on_pay_type_change(this,'coins','1.00','赠宝兑换','','/news_info_34943.html');"><span class="p_coins g">赠宝兑换</span></li>   p_account           
			  
			   <input type="hidden" id="pay_type_rengong" value="rengong"><input type="hidden" id="pay_rate_rengong" value="10.00"><input type="hidden" id="pay_name_rengong" value="人工充值"><input type="hidden" id="pay_desc_rengong" value=""><input type="hidden" id="pay_help_rengong" value="/news_info_24778.html"><div  id="pay_help_desc_rengong" style="display:none"></div><li id="p_rengong" onclick="javascript:on_pay_type_change(this,'rengong','10.00','人工充值','','/news_info_24778.html');"><span class="p_rengong g">人工充值</span></li>			  --></ul></div><div class="pay_r fl"><div class="yx_box fl" id="pay_game_box"></div><div class="yx_box_1 fl" id="pay_server_box"></div><div class="pay_r_t" id="pay_r_t">您还没有登录：&nbsp;
			  <a style="color:#0f8dc4;" href="http://user.<?php echo ($ai["url"]); ?>/login?returl=http%3A%2F%2Fpay.<?php echo ($ai["url"]); ?>">[登录]</a>&nbsp;
			  <a href="http://reg.<?php echo ($ai["url"]); ?>?returl=http%3A%2F%2pay.<?php echo ($ai["url"]); ?>" style="color:#ff7429;">[注册]</a></div><ul><!--<form id="form1" name="form1" method="get" target="_blank"  action="http://<?php echo ($ai["domain"]); ?>/pay/confirm"> --><form id="form1" name="form1" method="post" target="_blank"  action="confirm"><li class="bb"><div class="pay_r_t1 fl">1.充值到哪里？</div><div class="pay_r_czfs fl"><ul><li id="trans_game" onclick="hide_select();">充值到游戏</li><li id="trans_platform" onclick="hide_select('platform');"><img src="/images/pay/jian.gif" width="15" height="14" align="absmiddle" />充值到平台</li><a href="/exchange.html"><li>平台币兑换</li></a></ul></div><div class="pay_r_box fl"><ul><li class="cc"><div class="pay_r_t1 fl" id="pay_type_desc">2.选择游戏</div><div id="change_platform_box" class="pay_r_xzyx fl yc"><?php echo ($ai["title"]); ?>平台币为所有游戏通用货币，您可以选择兑换到任何游戏及区服，没有时效等方面的诸多限制无疑是一大<br/><br/>便利之处，更让玩家节省了繁琐的充值步骤时间，直接充值平台币还能享受不定期返利优惠。<a style="color:#F00;">平台币比例为1:10</a></div><div id="change_game_box" class="pay_r_xzyx fl"><input id="game_id" name="game_id" value="0" type="hidden"><input id="server_id" name="server_id" value="0" type="hidden"><a href="javascript:void(0);" onclick="showGameList();" class="yx1" id="changeGame" style="color:#fff;">选择充值的游戏</a><a href="javascript:void(0);" id="changeServer" class="yx2" style="color:#fff;">选择游戏服务器</a></div><div id="tip" style="color:#F00;  width:100%;font-weight:900; display:none;"><p style="padding-left:80px">进行《神曲》充值的角色等级必须 6 级或以上，请确认后操作</p><br/></div><div class="pay_r_t1 fl">3.请输入您要充值的帐号</div><div class="pay_r_czzh fl"><label>需要充值账号：</label><input type="text" name="member_name" id="member_name"  class="pay_txt" ></div><div class="pay_r_czzh fl"><label>确认充值账号：</label><input type="text" name="re_member_name" id="re_member_name"  class="pay_txt" ></div><div class="pay_r_czzh fl" id="li_game_rname" style=" display: none"><label class="name">选择充值角色：</label><span class="zh"><select name="re_game_rid" style="z-index:2;" type="text" id="re_game_rid" class="select_game" onchange="on_rolechange(this);"></select></span><em>*</em><span><a href="javascript:void(0);" onclick="get_role(1);">刷新</a></span></div><div class="pay_r_czzh fl"><label>您的手机号码：</label><input name="user_phone" id="user_phone" type="text" onkeyup="this.value=this.value.replace(/\D/g,'');"  class="pay_txt" ><!--<span id="display_phone">&nbsp;&nbsp;<a href="http://user.<?php echo ($ai["url"]); ?>/user_renzheng_ph.html" target="_blank" style="color:#F00; padding-left:15px;">免费绑定手机(赠送20平台币)</a></span>--></div><div class="pay_r_t1 fl">4.选择充值金额</div><!-- 
                      <div class="fl" id="type_tip" style="margin:10px 0px 10px 55px; display:none;"><p style="text-align:left; color:#F00; margin-bottom:5px;">钻石充值 即时到账，月卡充值 按类型分期到账</p><br><input type="radio" name="return_type" id="return_type" value="1_1_" onclick="hide_option('no');" checked="checked"> 钻石充值
                          <input type="radio" name="return_type" id="return_type" value="0_1_1" onclick="hide_option('2');"> Vip月银卡
                          <input type="radio" name="return_type" id="return_type" value="0_2_1" onclick="hide_option('4');"> Vip月金卡
                      </div>--><div class="pay_r_czje fl"><input type="hidden" name="pay_amount" id="pay_amount" value="200"><ul id="pay_amount_all"><li><a href="javascript:;" >10</a></li><li><a href="javascript:;" >30</a></li><li><a href="javascript:;" >50</a></li><li><a href="javascript:;" >100</a></li><li><a href="javascript:;" class="li_je">200</a></li><li><a href="javascript:;" >300</a></li><li><a href="javascript:;" >500</a></li><li><a href="javascript:;" >1000</a></li><li><a href="javascript:;" >2000</a></li><li><input id="other_money" type="text" onblur="blur_other_money(this);" onfocus="focus_other_money(this);" onchange="change_other_money(this);" value="其他金额..." default_value="其他金额..." class="pay_r_czje_txt"></li><li><label>*单笔充值最少10元</label></li></ul><ul id="pay_amount_sms" style="display:none"><li><a href="javascript:;" >2</a></li><li><a href="javascript:;" class="li_je">5</a></li><li><a href="javascript:;" >8</a></li><li><a href="javascript:;" >25</a></li></ul></div><select name="pay_amount_35" id="pay_amount_35" onchange="on_amount_change(this);" class="select_game" style="display: none;"><option></option></select><select name="pay_amount_110" id="pay_amount_110" onchange="on_amount_change(this);" class="select_game" style="display: none;"><option></option></select><div class="pay_r_czje fl" style="_padding-top:15px; *padding-top:15px;"><p><span>对应元宝数量：</span><span style="color:#ff6c00; width:120px;"><b id="pay_amount_show">0</b></span><span style="color:#ff6c00;">*兑换比例1元=<a style="cursor:text;" id="parcen">10</a>元宝</span></p><br/><p><span>本次充值赠送：</span><span style="color:#ff6c00; width:120px;"><b id="pay_point_show">0</b></span><span style="color:#ff6c00;">平台积分</span></p></div><br/><br/><br/><div id="zyka_pay_bank"><div class="pay_r_t1 fl">5.支付卡信息：</div><div class="pay_r_czzh fl"><label>卡序列号：</label><input type="text" name="kh" id="kh"  class="pay_txt" ></div><div class="pay_r_czzh fl"><label>卡 密 码：</label><input type="text" name="km" id="km"  class="pay_txt" ></div></div><div id="show_pay_bank"><div class="pay_r_t1 fl">5.选择银行：</div><div class="pay_r_xzyh fl"><table width="573" cellspacing="3"><tbody><tr><td width="130" nowrap><input id="ICBC" name="pay_bank" value="ICBC" checked="" type="radio"><img src="/images/pay/ICBC_OUT.gif" onClick="checkedRaido('ICBC');" border="0"></td><td width="130" nowrap><input id="CMBCHINA" name="pay_bank" value="CMBCHINA" type="radio"><img src="/images/pay/CMB_OUT.gif" onClick="checkedRaido('CMBCHINA');" border="0"></td><td width="130" nowrap><input id="CCB" name="pay_bank" value="CCB" type="radio"><img src="/images/pay/CCB_OUT.gif" onClick="checkedRaido('CCB');" border="0"></td><td width="130" nowrap><input id="BOC" name="pay_bank" value="BOC" type="radio"><img src="/images/pay/BOC_OUT.gif" onClick="checkedRaido('BOC');" border="0"></td></tr><tr><td><input id="ABC" name="pay_bank" value="ABC" type="radio"><img src="/images/pay/ABC_OUT.gif" onClick="checkedRaido('ABC');" border="0"></td><td><input id="BOCO" name="pay_bank" value="BOCO" type="radio"><img src="/images/pay/COMM_OUT.gif" onClick="checkedRaido('BOCO');" border="0"></td><td><input id="SPDB" name="pay_bank" value="SPDB" type="radio"><img src="/images/pay/SPDB_OUT.gif" onClick="checkedRaido('SPDB');" border="0"></td><td><input id="GDB" name="pay_bank" value="GDB" type="radio"><img src="/images/pay/GDB_OUT.gif" onClick="checkedRaido('GDB');" border="0"></td></tr><tr><td><input id="CITIC" name="pay_bank" value="CITIC" type="radio"><img src="/images/pay/CITIC_OUT.gif" onClick="checkedRaido('CITIC');" border="0"></td><td><input id="CEBBANK" name="pay_bank" value="CEBBANK" type="radio"><img src="/images/pay/CEB_OUT.gif" onClick="checkedRaido('CEBBANK');" border="0"></td><td><input id="CIB" name="pay_bank" value="CIB" type="radio"><img src="/images/pay/CIB_OUT.gif" onClick="checkedRaido('CIB');" border="0"></td><td><input id="SDB" name="pay_bank" value="SDB" type="radio"><img src="/images/pay/SDB_OUT.gif" onClick="checkedRaido('SDB');" border="0"></td></tr><tr><td><input id="CMBC" name="pay_bank" value="CMBC" type="radio"><img src="/images/pay/CMBC_OUT.gif" onClick="checkedRaido('CMBC');" border="0"></td><td><input id="HZCBB2C" name="pay_bank" value="HZCBB2C" type="radio"><img src="/images/pay/HZCB_OUT.gif" onClick="checkedRaido('HZCBB2C');" border="0"></td><td><input id="SHBANK" name="pay_bank" value="SHBANK" type="radio"><img src="/images/pay/SHBANK_OUT.gif" onClick="checkedRaido('SHBANK');" border="0"></td><td><input id="NBBANK" name="pay_bank" value="NBBANK " type="radio"><img src="/images/pay/NBBANK_OUT.gif" onClick="checkedRaido('NBBANK');" border="0"></td></tr><tr><td><input id="SPABANK" name="pay_bank" value="SPABANK" type="radio"><img src="/images/pay/SPABANK_OUT.gif" onClick="checkedRaido('SPABANK');" border="0"></td><td><input id="BJBANK" name="pay_bank" value="BJBANK" type="radio"><img src="/images/pay/BJBANK_OUT.gif" onClick="checkedRaido('BJBANK');" border="0"></td><td><input id="BJRCB" name="pay_bank" value="BJRCB" type="radio"><img src="/images/pay/BJRCB_OUT.gif" onClick="checkedRaido('BJRCB');" border="0"></td><td><input id="PSBC-DEBIT" name="pay_bank" value="PSBC-DEBIT" type="radio"><img src="/images/pay/PSBC_OUT.gif" onClick="checkedRaido('PSBC-DEBIT');" border="0"></td></tr></tbody></table></div></div><input name="trans_line" type="hidden" id="trans_line"  value="" /><input name="game_rate" type="hidden" id="game_rate"  value="1" /><input name="pay_type" type="hidden" id="pay_type"  value="" /><input name="pay_rate" type="hidden" id="pay_rate"  value="1" /><input name="game_paytorole" type="hidden" id="game_paytorole"  value="0" /><input name="re_game_rname" type="hidden" id="re_game_rname"  value="0" /><input type="hidden" id="pay_tye" value="1"><input type="hidden" id="pay_m" value=""><input type="hidden" name="pay_platform" id="pay_platform"  value="" /><input name="pay_vdcode" type="hidden" id="pay_vdcode"  value="" /><div class="pay_r_btn fl"><input type="image" id="chksubmit" src="/images/pay/btn_cz.jpg"  onmouseover="this.src='/images/pay/btn_cz1.jpg'" onmouseout="this.src='/images/pay/btn_cz.jpg'"/></div><div class="pay_js fl"><p><b style="color:#ff6c00;">充值说明</b></p><p>1、必须持有开通网上功能银行卡；</p><p>2、如浏览器设置屏蔽弹窗功能请进行关闭，以免无法选择充值等情况；</p><p>3、如果您用信用卡支付，请确认该信用卡的网上交易限额大于等于您的充值金额；</p><p>温馨提示：请充值时务必确认好您的充值金额无误，避免输错金额导致的失误，如造成充值选择错误我们将一律不预处理此类退款申诉。</p></div></li></ul></div></li></form></ul></div></div></div><script type="text/javascript">
 var gid=0;

  $(document).ready(function(){
      if($_GET['pay_platform']=='platform'){
          hide_select('platform');
      }else{
          hide_select('game');
      }
           $.ajax({
               type: "get",
               async: true,
               url: api_url+"/checkPay",
               data:{'gid': $_GET['gid'],'sid': $_GET['sid'],'ssid': $_GET['ssid'],'scode': $_GET['scode'],'username': $_GET['username'],'user_id': $_GET['user_id'],'m': $_GET['m']},
               dataType: "jsonp",
               jsonp: "callback",
               jsonpCallback:"checkPay",
               success: function(data){
                   if(data.returl!=''){
                       window.location.href=data.returl;
                   }else{
                       var game_id = "0";
                       var server_id = "0";
                       var game_code = data.game_code;
                       var gid = data.gid;
                       var server_id = data.sid;
                       var bj = "0";
                       //$('#pay_platform').val('');
                       $('#pay_m').val(data.m);
                       $('#member_name').val(data.username);
                       $('#re_member_name').val(data.username);
                       $('#pay_vdcode').val(data.pay_validationcode);
                       if(data.username!=''){
                           $('#pay_r_t').html('您当前帐号为：&nbsp;<b style="color:#0f8dc4;">'+data.username+'</b>&nbsp;<a href="'+api_url+'/loginout?returl='+pay_url+'">[更换账号]</a>&nbsp;&nbsp;<a href="'+user_url+'/trans_record.html" style="color:#ff7429;">[查看充值记录]</a>');
                       }
                       if(gid>0){
                           $('#pay_tye').val('0');
                           $('#game_id').val(gid);
                           hide_select('game');
                           showServerList(gid,server_id);
                       }
                   }
               }
           });
           if($_GET['t']){
               var pay_type=$('#pay_type_'+$_GET['t']).val();
               var pay_rate=$('#pay_rate_'+$_GET['t']).val();
               var pay_name=$('#pay_name_'+$_GET['t']).val();
               var pay_desc=$('#pay_desc_'+$_GET['t']).val();
               var pay_help=$('#pay_help_'+$_GET['t']).val();
           }else{
               var pay_type=$('#pay_type_yeepay').val();
               var pay_rate=$('#pay_rate_yeepay').val();
               var pay_name=$('#pay_name_yeepay').val();
               var pay_desc=$('#pay_desc_yeepay').val();
               var pay_help=$('#pay_help_yeepay').val();
           }
           on_pay_type_change($('.p_'+pay_type),pay_type,pay_rate,pay_name,pay_desc,pay_help);

           $('#chksubmit').click(function(){
               if( $("#display_phone").is(":hidden")){
                   if($("#user_phone").val()=="" || parseInt($("#user_phone").val()) <= 13000000000){
                       alert('请填写手机号码');
                       return false;
                   }
               }
           });
       });


       var psms = "";
var pother = "";
var m = $('#pay_m').val();

var i_money = -1;
function on_pay_type_change(obj, pay_type, pay_rate, pay_type_name, pay_type_desc, pay_help) {
    var pay_help_desc=$('#pay_help_desc_'+pay_type).html();
    $('.pay_js').html(pay_help_desc);
    var gid = $_GET['gid'];
    var sid = $_GET['sid'];
    var username = $('#member_name').val();
    if (gid == undefined) {
        var gid = 0;
    }
    if (sid == undefined) {
        var sid = 0;
    }
    if (username == undefined) {
        var username = '';
    }
	//平台币增宝转换
    if (pay_type == 'account') {
        window.location.href = 'exchange.html';
        return;
   // } else if (pay_type == 'coins') {
   //     window.location.href = 'coins_change.html?gid=' + gid + '&sid=' + sid + '';
   //     return;
  //  } else if (pay_type == 'junnet') {
  //      window.location.href='pay_junnet.html?gid=&sid=&username=';
  //      return;
    } else if (pay_type == 'rengong') {
        window.location.href = 'pay_rengong.html?gid=' + gid + '&sid=' + sid + '&username=' + username;
        return;
    }
    i_money = -1;
    $('.pay_r_czje ul li a').attr('class', '');
  
        gmoney = gmoney<10 ? 200 : gmoney;
        $("#trans_game").show();
        $("#display_phone").show();
        $('#pay_amount').val(gmoney);   //默认充值金额
        $("#pay_amount_all").show();
        $("#pay_amount_sms").hide();
        /**@**/
        $('#pay_amount_all li a').each(function(i){
            if($('#pay_amount_all li a').eq(i).attr("class") == "" && $('#pay_amount_all li a').eq(i).html() == gmoney){
                i_money = i;
            }
        });
        if(i_money>-1){
            if($('#pay_amount_all li a').eq(i_money)) $('#pay_amount_all li a').eq(i_money).addClass("li_je");
        }else{
            $("#other_money").val(gmoney);
        }
    

    ////是否支付宝网银支付
    if (pay_type == 'yeepay') {
		document.getElementById('zyka_pay_bank').style.display = "none"; 
        document.getElementById('show_pay_bank').style.display = "block"; //显示银行列表选择
    } else if (pay_type == 'alipay') {
	    document.getElementById('zyka_pay_bank').style.display = "none"; 
        document.getElementById('show_pay_bank').style.display = "none";
    } else if (pay_type == 'weipay') {
	    document.getElementById('zyka_pay_bank').style.display = "none"; 
        document.getElementById('show_pay_bank').style.display = "none"; 
    } else {
        document.getElementById('zyka_pay_bank').style.display = "block"; //显示银行列表选择
        document.getElementById('show_pay_bank').style.display = "none"; //隐藏银行列表选择
    }

    $("#pay_type").val(pay_type);
    $("#pay_rate").val(pay_rate);

    $('.pay_l ul li').attr('class', '');
    $('#p_' + pay_type).addClass('li_h');
    $(".pay_l ul li").each(function(){
            var d = $(this).attr('id');
            $('#'+d+ ' span').removeClass(d+'_1');
            $('#'+d+ ' span').addClass(d);
    });
    $('#p_' + pay_type+ ' span').removeClass('p_'+pay_type);
    $('#p_' + pay_type+ ' span').addClass('p_'+pay_type+'_1');


        var pay_amt = document.getElementById('pay_amount');
        //pay_amt.options[14].selected = 'selected';
        $('#other_amount').show();
        on_rate_change();
   

}

var is_ajax_pay = 0;

function on_rate_change(id) {
    var gid = $("#game_id").val();
    var pay = parseInt($("#pays_amount").val());
    var ot_amount = $('#oth_amount').val();
    var pay_amount = $('#pay_amount').val();
    var pmoney = parseInt(($("#pays_amount").val()) * 60);
    var otmoney = parseInt(($('#oth_amount').val()) * 60);
    if (pay == 0) {
        $('#pay_points_show').html(otmoney);
        $('#pay_amounts_show').html(otmoney);
    } else {
        $('#pay_points_show').html(pmoney);
        $('#pay_amounts_show').html(pmoney);
    }


        var money = $('#pay_amount').val();

        var cur = Math.floor(money * parseFloat($('#pay_rate').val()));
        var game_cur = Math.floor(cur * parseFloat($('#game_rate').val()));
        var t = (parseFloat($('#pay_rate').val()) * parseFloat($('#game_rate').val()));
 
	//alert(t);
    $('#pay_amount_show').html(game_cur);

    $('#parcen').html(t);
    $('#parcens').html(60);
    $('#parcen_top').html($('#parcen').html());

    //$('#pay_point_show').html( Math.floor(cur * ) );

    /*var addition = Math.floor(cur * (parseFloat($('#level_rate').val()) / 100)  );
	$('#addition_money').html(addition);*/
    var ptb = $('#pay_amount_show').html();
    var pay_tye = $('#pay_tye').val();
    var pay_usname = $('#member_name').val();
    if (pay_amount == '0')
        pay_amount = $('#oth_amount').val();

    //限制次数.
    if (is_ajax_pay == 0) {
        is_ajax_pay = 1;
        $.getJSON(api_url + "/ajax_pay?rnd=" + Math.random() + "&rmb=" + pay_amount + "&ptb=" + ptb + "&pay_tye=" + pay_tye + "&pay_name=" + pay_usname + "&format=json&jsoncallback=?", function(json) {

            is_ajax_pay = 0;
            if (json.type == '1') {
                var shtml = '';
                if (json.zb != null && json.rank != null) {
                    $('#pay_msg').html(shtml);
                }
            }
            $('#pay_point_show').html(json.integral);
        });
    }
}

function hide_option(id) {
    on_rate_change();
}
       </script><!-- 尾部 --><div id="footer"><div class="ft-nav"><div class="rec-game tc"><label>推荐游戏:</label><?php if(is_array($loaddh_game)): $i = 0; $__LIST__ = array_slice($loaddh_game,0,10,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a target="_blank" href="http://<?php echo ($vo["tag"]); ?>.<?php echo ($ai["url"]); ?>" title="<?php echo ($vo["gamename"]); ?>" ><?php echo ($vo["gamename"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?></div><p class="ft-company tc"><a href='http://daquan.<?php echo ($ai["url"]); ?>' target='_blank'>游戏大厅</a>|
                        <a href='http://zixun.<?php echo ($ai["url"]); ?>/news/298' target='_blank'>联系我们</a>|
                        <a href='http://zixun.<?php echo ($ai["url"]); ?>/news/297' target='_blank'>公司简介</a></p><p class="ft_feiyang tc">Copyright &copy;2016 <?php echo ($ai["title"]); ?><a target="_blank" href="http://<?php echo ($ai["domain"]); ?>" ><?php echo ($ai["domain"]); ?></a><a href="/images/zizhi/icp.jpg" target="_blank">京ICP证120137号</a><a href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010702001414" target="_blank">京公网安备11010702001414号</a><a href="/images/zizhi/ww.jpg" target="_blank">京网文【2014】2008-258号</a><p class="ft-zquan tc">北京飞扬天下网络科技股份有限公司(证券代码：831302)<a href="http://www.miibeian.gov.cn/">京ICP备11049124-2号 </a></p><ul class="ft-wj"><li><a class="wj-01" href="http://www.bjeit.gov.cn/">公共信息安全网络检查</a></li><li><a class="wj-02" href="http://www.cyberpolice.cn/wfjb/html/index.shtml">不良信息举报中心</a></li><li><a class="wj-03" href="#">企业信用评级证书</a></li><li><a class="wj-04" href="/images/zizhi/ww.jpg">互联网文化经营单位</a></li><li><a class="wj-05" href="http://www.hd315.gov.cn/">北京市工商行政管理局</a></li><li><a class="wj-06" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010702001414">京公网安备 <br>11010702001414</a></li><li><a  key ="583eb069efbfb014cd56a0b7"  logo_size="124x47"  logo_type="business"  href="http://www.anquan.org" ><script src="//static.anquan.org/static/outer/js/aq_auth.js"></script></a></li><div style="display: none;"><script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1256269989'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1256269989%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script><!-- QiDianDA --><script>
(function(w, a, m){m='__qq_qidian_da';w[m]=a;w[a]=w[a]||function(){(w[a][m]=w[a][m]||[]).push(arguments);};})(window,'qidianDA');
qidianDA('create', '2852137359', 'a6654f76bf839e8dddbfc43a2bb45034', {
    mtaId: '500381538'
});
qidianDA('set', 't1', new Date());
</script><script async src="//bqq.gtimg.com/da/i.js"></script><!-- End QiDianDA --></div><!-- WPA start --><script src="//wp.qiye.qq.com/qidian/2852137359/c547bb4b7be187c45bfeba5e740fac6a" charset="utf-8"></script><!-- WPA end --></ul><p class="miaoshu tc">抵制不良网页游戏，拒绝盗版游戏。 注意自我保护，谨防受骗上当。 适度游戏益脑，沉迷游戏伤身。 合理安排时间，享受健康生活。</p></div></div><!-- 固定返回顶部按钮 --><div id="guding"><div class="erweima" title="微信二维码"><div class="weima" style=""><div class="weima-tu"><img src="/images/2016752g/img/bg-top-erwei.jpg" alt=""><i></i></div></div></div><div class="kefu" title="客服服务"><a href="http://gm.<?php echo ($ai["rul"]); ?>"></a></div><div style="margin-top:2px;" id="rtt"><img src="/images/2016752g/img/fhdb_off.jpg" title="返回顶部"></div></div><script src="/images/2016752g/js/login.js"></script></body></body></html>