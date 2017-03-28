<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>平台币兑换_充值中心_<?php echo ($ai["title"]); ?>-<?php echo ($ai["sitename"]); ?></title><meta name="keywords" content="<?php echo ($ai["keywords"]); ?>,活动专区"><meta name="description" content="<?php echo ($ai["description"]); ?>"><link href="http://<?php echo ($ai["domain"]); ?>/css/style.css" rel="stylesheet" type="text/css" /><link rel="stylesheet" type="text/css" href="http://<?php echo ($ai["domain"]); ?>/css/pay.css" /><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/domain.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/jquery.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/basic.js"></script><script type="text/javascript" src="http://<?php echo ($ai["domain"]); ?>/js/pay_new.js"></script><style type="text/css">
body{
behavior:url(css/iehoverfix.htc);   /*文件路径为htc文件相对于该网页文件的路径*/
}
</style><!--[if IE 6]><script src="http://<?php echo ($ai["domain"]); ?>/js/DD_belatedPNG.js"></script><script>
  DD_belatedPNG.fix('.logo,.yx_box,.yx_box_1');
</script><![endif]--></head><body class="bg"><div class="B_bg"><div class="head"><a href="http://<?php echo ($ai["domain"]); ?>" class="logo" style="padding:0;"><img src="/images/logo_1.jpg" width="250" height="80" alt="<?php echo ($ai["title"]); ?>" /></a><b><img src="/images/pay/pay_top.jpg" width="111" height="80" /></b><ul class="nav"><a href="http://www.<?php echo ($ai["url"]); ?>">首&nbsp;页</a><a href="http://daquan.<?php echo ($ai["url"]); ?>">游戏大全</a><a href="http://user.<?php echo ($ai["url"]); ?>">用户中心</a><a href="http://pay.<?php echo ($ai["url"]); ?>">充值中心</a><a href="http://zixun.<?php echo ($ai["url"]); ?>">游戏资讯</a><a href="http://libao.<?php echo ($ai["url"]); ?>">新手卡</a><a href="#">交流论坛</a></ul></div><div class="pay_box"><div class="pay_l fl"><div class="pay_l_t"></div><ul><?php if(is_array($pay_type)): $i = 0; $__LIST__ = $pay_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pay_type): $mod = ($i % 2 );++$i;?><input type="hidden" id="pay_type_<?php echo ($pay_type["tag"]); ?>" value="<?php echo ($pay_type["tag"]); ?>"><input type="hidden" id="pay_rate_<?php echo ($pay_type["tag"]); ?>" value="<?php echo ($pay_type["rebate"]); ?>"><input type="hidden" id="pay_name_<?php echo ($pay_type["tag"]); ?>" value="<?php echo ($pay_type["payname"]); ?>"><input type="hidden" id="pay_desc_<?php echo ($pay_type["tag"]); ?>" value="只要您开通网上银行服务，足不出户即可实现快捷准确的帐号充值。请勿在此通道中使用其他方式充值。"><input type="hidden" id="pay_help_<?php echo ($pay_type["tag"]); ?>" value="#"><div  id="pay_help_desc_<?php echo ($pay_type["tag"]); ?>" style="display:none"><?php echo ($pay_type["content"]); ?></div><li id="p_<?php echo ($pay_type["tag"]); ?>" onclick="javascript:on_pay_type_change(this,'<?php echo ($pay_type["tag"]); ?>','<?php echo ($pay_type["rebate"]); ?>','<?php echo ($pay_type["payname"]); ?>)','只要您开通网上银行服务，足不出户即可实现快捷准确的帐号充值。请勿在此通道中使用其他方式充值。','#');"><span class="p_<?php echo ($pay_type["tag"]); ?> g"><?php echo ($pay_type["payname"]); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?><li id="p_account"  class="li_h"><span class="p_coins g">平台币兑换</span></li><!-- 
              <li id="p_coins" onclick="javascript:on_pay_type_change(this,'coins','1.00','赠宝兑换','','http://zixun.49you.com/cjwt/czwt/11524.html');"><span class="p_coins g">赠宝兑换</span></li>p_account
              <li id="p_rengong" onclick="javascript:on_pay_type_change(this,'rengong','10.00','人工充值','','http://www.49you.com/news_info_24778.html');"><span class="p_rengong g">人工充值</span></li>			--></ul></div><div class="pay_r fl"><div class="yx_box fl" id="pay_game_box"></div><div class="yx_box_1 fl" id="pay_server_box"></div><div class="pay_r_t" id="pay_r_t">您还没有登录：&nbsp;
			  <a style="color:#0f8dc4;" href="http://login.<?php echo ($ai["url"]); ?>?returl=http://pay.<?php echo ($ai["url"]); ?>">[登录]</a>&nbsp;
			  <a href="http://reg.<?php echo ($ai["url"]); ?>?returl=http://pay.<?php echo ($ai["url"]); ?>" style="color:#ff7429;">[注册]</a></div><ul><form id="form1" name="form1" method="post" target="_blank"  action="/topay" onsubmit="return check_form();"><li class="bb"><div class="pay_r_t1 fl">1.充值到哪里？</div><div class="pay_r_czfs fl"><ul><a href="index.html?pay_platform=game"><li>充值到游戏</li><a href="index.html?pay_platform=platform"><li><img src="/images/pay/jian.gif" width="15" height="14" align="absmiddle" />充值到平台</li><a href="/exchange.html" ><li class="li_s">平台币兑换</li></a></ul></div><div class="pay_r_box fl"><ul><li class="cc"><div class="pay_r_t1 fl" id="pay_type_desc">2.选择游戏</div><div id="change_game_box" class="pay_r_xzyx fl"><input id="game_id" name="game_id" value="0" type="hidden"><input id="server_id" name="server_id" value="0" type="hidden"><a href="javascript:void(0);" onclick="showGameList();" class="yx1" id="changeGame" style="color:#fff;">选择充值的游戏</a><a href="javascript:void(0);" id="changeServer" class="yx2" style="color:#fff;">选择游戏服务器</a></div><div id="tip" style="color:#F00;  width:100%;text-align:left; font-weight:900; display:none;">进行《神曲》充值的角色等级必须 6 级或以上，请确认后操作</div><div class="pay_r_t1 fl">3.确认账号信息</div><div class="pay_r_czzh fl"><label>充值账号：</label><label class="tip" id="exchange_member_name"></label></div><div class="pay_r_czzh fl"><label>您剩余的平台币：</label><label class="tip" id="exchange_money"></label></div><div class="pay_r_czzh fl" id="li_game_rname" style=" display: none"><label class="name">选择充值角色：</label><span class="zh"><select name="re_game_rid" style="width:152px;z-index:2;" type="text" id="re_game_rid" class="select_game pay_txt" onchange="on_rolechange(this);"></select></span><em>*</em><span><a href="javascript:void(0);" onclick="get_role(1);">刷新</a></span></div><div class="pay_r_t1 fl">4.请选择兑换额</div><div class="fl" id="type_tip" style="margin:10px 0px 10px 55px; display:none;"><p style="text-align:left; color:#F00; margin-bottom:5px;">钻石充值 即时到账，月卡充值 按类型分期到账</p><br><input type="radio" name="return_type" id="return_type_1" value="1_1_" onclick="hide_option('no');" checked="checked"> 钻石充值
                          <input type="radio" name="return_type" id="return_type_2" value="0_1_1" onclick="hide_option('2');"> Vip月银卡
                          <input type="radio" name="return_type" id="return_type_3" value="0_2_1" onclick="hide_option('4');"> Vip月金卡
                      </div><div id="chang_menoy_0" class="pay_r_czje fl" style="_padding-top:15px; *padding-top:15px;display:none;"><span class="name">aaa</span><span class="zh"></span></div><div id="chang_menoy_1" class="pay_r_czje fl" style="_padding-top:15px; *padding-top:15px;"><span class="name">您要兑换的平台币：</span><span class="zh"><input id="pay_amount" class="zhanghao" type="text" value="100" onblur="on_oth_amount_blur(this);" name="pay_amount"></span><span>  输入兑换数量（10的整数倍）</span></div><div id="chang_menoy_2" class="pay_r_czje fl" style="_padding-top:15px; *padding-top:15px;display:none;" ><span class="name">您要兑换的平台币：</span><span id="chang_menoy_3" class="zh"></span></div><div id="chang_menoy_4" class="pay_r_czje fl" style="_padding-top:15px; *padding-top:15px;display:none;" ><span class="name">您要兑换的平台币：</span><span id="chang_menoy_5" class="zh"></span></div><div class="pay_r_czje fl" style="_padding-top:15px; *padding-top:15px;padding-top:15px;"><span class="name">获得游戏货币：</span><span id="pay_amount_show" class="count">请先选择充值套餐</span></div><div class="clear"></div><input id="game_rate" type="hidden" value="1" name="game_rate"><input id="pay_type" type="hidden" value="" name="pay_type"><input name="typefs" type="hidden" id="typefs"  value="0" /><input id="pay_rate" type="hidden" value="10" name="pay_rate"><input id="game_paytorole" type="hidden" value="0" name="game_paytorole"><input id="re_game_rname" type="hidden" value="0" name="re_game_rname"><input id="member_name" type="hidden" value=""><div class="pay_r_btn fl"><input type="image" src="http://www.49you.com/images/pay/btn_cz.jpg"  onmouseover="this.src='http://www.49you.com/images/pay/btn_cz1.jpg'" onmouseout="this.src='http://www.49you.com/images/pay/btn_cz.jpg'"/></div><div class="pay_js fl"><p class="p0"><span style="font-size:10.0000pt;font-family:'宋体';">兑换说明：</span><span style="color:#515151;font-size:10.0000pt;font-family:'宋体';"><br /></span><span style="color:#515151;font-size:10.0000pt;font-family:'宋体';">1、每次兑换最低金额为50个平台币；</span><span style="color:#515151;font-size:10.0000pt;font-family:'宋体';"><br /></span><span style="color:#515151;font-size:10.0000pt;font-family:'宋体';">2、如浏览器设置屏蔽弹窗功能请进行关闭，以免无法选择兑换等情况；</span><span style="color:#515151;font-size:10.0000pt;font-family:'宋体';"></span></p><p class="p0"><span style="color:#515151;font-size:10.0000pt;font-family:'宋体';">3、如有兑换异常情况请联系[</span><span><a href="http://gm.<?php echo ($ai["url"]); ?>/"><span class="15" style="color:#0000FF;text-decoration:none;font-size:10.0000pt;font-family:'宋体';">在线客服</span></a></span><span style="color:#515151;font-size:10.0000pt;font-family:'宋体';">]<span style="color:#515151;font-size:10.0000pt;font-family:'宋体';">[<a target="_blank" href="http://zixun.<?php echo ($ai["url"]); ?>">更多充值帮助</a></span><a target="_blank" href="http://zixun.49you.com"><span><a><span class="15" style="color:#0000FF;text-decoration:none;font-size:10.0000pt;font-family:'宋体';"></span></a></span></a><span style="color:#515151;font-size:10.0000pt;font-family:'宋体';">]</span></span><span style="color:#515151;font-size:10.0000pt;font-family:'宋体';"></span></p><p class="p0"><span style="color:#FF0000;font-size:10.0000pt;font-family:'宋体';">温馨提示：请兑换时务必确认好您的兑换金额无误，避免输错兑换金额导致的失误，如造成兑换选择错误我们将一律不予处理此类退款申诉。</span><span style="color:#FF0000;font-size:10.0000pt;font-family:'宋体';"></span></p></div></li></ul></div></li></form></ul></div></div></div><script type="text/javascript">
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
	if(parseInt(obj.value) < 10 ){
		alert("兑换额必须为10的倍数");
		obj.value = 10;
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
</script><!-- 页脚信息 --><!-- 页脚信息end --></body></html>