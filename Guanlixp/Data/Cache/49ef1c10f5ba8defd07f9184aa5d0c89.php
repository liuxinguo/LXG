<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<script type="text/javascript" src="__ADMIN__/Admin/Js/jquery.js"></script>
<script type="text/javascript" src="__ADMIN__/Admin/Js/bootstrap.js"></script>
<script type="text/javascript" src="__ADMIN__/Admin/Js/jshack.js"></script>
<script type="text/javascript" charset="utf-8"  src="__ADMIN__/kindeditor/kindeditor.js"></script>
<script type="text/javascript" charset="utf-8"  src="__ADMIN__/kindeditor/lang/zh_CN.js"></script>
<link href="__ADMIN__/Admin/Css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="__ADMIN__/Admin/Css/style.css" rel="stylesheet" type="text/css" />
<title><?php echo (L("welcome")); ?></title>
</head>
<body>
<div class="content">
        <div class="page-header">
          <h3 class="fl"><?php echo ($act_title); ?></h3>  
          <div class="user_message fr"><i class="icon-wrench"></i><?php echo (L("configuring_site")); ?></div>
          <div class="cl"></div>
        </div>
<script  language="JavaScript">  
<!--  
function  chg(t,a,o,s,str){  
var  tt=document.getElementById(t)  
var  aa=document.getElementById(a)
tt.style[s]=o.checked?str:'none'
aa.style[s]=o.checked?'none':str
}

function check(){
    if(!trim($("#gamename").val())) {
        alert("请输入游戏名称！");
        $("#gamename").focus();
        return false;
    }
    if(!trim($("#bs").val())) {
        alert("请选择接口！");
        $("#bs").focus();
        return false;
    }
    if(!trim($("#tag").val())) {
        alert("请输入游戏TAG标签！");
        $("#tag").focus();
        return false;
    }
    if(!trim($("#unit").val())) {
        alert("请输入游戏单位！");
        $("#unit").focus();
        return false;
    }
    if(!trim($("#rate").val())) {
        alert("请输入充值比率！");
        $("#rate").focus();
        return false;
    }
    if(trim($("#category").val()) == ""  || trim($("#category").val())== 0) {
        alert("请选择游戏类型！");
        $("#category").focus();
        return false;
    }
    if(trim($("#statetype").val()) == "" || trim($("#statetype").val())== 0) {
        alert("请选择状态类型！");
        $("#statetype").focus();
        return false;
    }
}
var URL = '__URL__';
var APP	 =	 '__APP__';
var TPL = '__TPL____MANAGETPL__';

//初始化编辑
var editor;
KindEditor.ready(function(K) {
            editor = K.create('#content', {
            cssPath : '__ADMIN__/kindeditor/plugins/code/prettify.css',
			themeType : 'simple',
            uploadJson : '__ADMIN__/kindeditor/php/upload_json.php?dir=game',
            fileManagerJson : '__ADMIN__/kindeditor/php/file_manager_json.php',
            allowFileManager : true,
                items : ['source','bold','italic','underline','fontname','fontsize','forecolor','hilitecolor','plug-align','plug-order','plug-indent','link']
        });
        //同步编辑器内容
        K('#submit').click(function() {
            var html;
            // 取得HTML内容
            html = editor.html();
            // 同步数据后可以直接取得textarea的value
            editor.sync();
            html = K('#content').val(); // KindEditor Node API
            // 设置HTML内容
            editor.html(html);
        });

        //选择颜色
        var colorpicker;
        K('#colorpicker').bind('click', function(e) {
                e.stopPropagation();
                if (colorpicker) {
                        colorpicker.remove();
                        colorpicker = null;
                        return;
                }
                var colorpickerPos = K('#colorpicker').pos();
                colorpicker = K.colorpicker({
                        x : colorpickerPos.x,
                        y : colorpickerPos.y + K('#colorpicker').height(),
                        z : 19811214,
                        selectedColor : 'default',
                        noColor : '无颜色',
                        click : function(color) {
                                K('#color').val(color);
                                colorpicker.remove();
                                colorpicker = null;
                        }
                });
        });
        K(document).click(function() {
                if (colorpicker) {
                        colorpicker.remove();
                        colorpicker = null;
                }
        });
        //选择图片
        K('#imagegame').click(function() {
                editor.loadPlugin('image', function() {
                        editor.plugin.imageDialog({
                                imageUrl : K('#picgame').val(),
                                clickFn : function(url, title, width, height, border, align) {
                                        K('#picgame').val(url);
                                        editor.hideDialog();
                                }
                        });
                });
        });
        //选择图片
        K('#imagetop').click(function() {
                editor.loadPlugin('image', function() {
                        editor.plugin.imageDialog({
                                imageUrl : K('#pictop').val(),
                                clickFn : function(url, title, width, height, border, align) {
                                        K('#pictop').val(url);
                                        editor.hideDialog();
                                }
                        });
                });
        });
        //选择图片
        K('#imagebest').click(function() {
                editor.loadPlugin('image', function() {
                        editor.plugin.imageDialog({
                                imageUrl : K('#picbest').val(),
                                clickFn : function(url, title, width, height, border, align) {
                                        K('#picbest').val(url);
                                        editor.hideDialog();
                                }
                        });
                });
        });
        //选择图片
        K('#imageindex').click(function() {
                editor.loadPlugin('image', function() {
                        editor.plugin.imageDialog({
                                imageUrl : K('#picindex').val(),
                                clickFn : function(url, title, width, height, border, align) {
                                        K('#picindex').val(url);
                                        editor.hideDialog();
                                }
                        });
                });
        });
        //选择图片
        K('#imageispay').click(function() {
                editor.loadPlugin('image', function() {
                        editor.plugin.imageDialog({
                                imageUrl : K('#picispay').val(),
                                clickFn : function(url, title, width, height, border, align) {
                                        K('#picispay').val(url);
                                        editor.hideDialog();
                                }
                        });
                });
        });
        //选择图片
        K('#imagepay_ad').click(function() {
                editor.loadPlugin('image', function() {
                        editor.plugin.imageDialog({
                                imageUrl : K('#picpay_ad').val(),
                                clickFn : function(url, title, width, height, border, align) {
                                        K('#picpay_ad').val(url);
                                        editor.hideDialog();
                                }
                        });
                });
        });
        //选择图片
        K('#imageicon').click(function() {
                editor.loadPlugin('image', function() {
                        editor.plugin.imageDialog({
                                imageUrl : K('#picicon').val(),
                                clickFn : function(url, title, width, height, border, align) {
                                        K('#picicon').val(url);
                                        editor.hideDialog();
                                }
                        });
                });
        });

        //选择图片
        K('#imagehz_ico').click(function() {
                editor.loadPlugin('image', function() {
                        editor.plugin.imageDialog({
                                imageUrl : K('#pichz_ico').val(),
                                clickFn : function(url, title, width, height, border, align) {
                                        K('#pichz_ico').val(url);
                                        editor.hideDialog();
                                }
                        });
                });
        });
        //选择图片
        K('#imagehz_game').click(function() {
                editor.loadPlugin('image', function() {
                        editor.plugin.imageDialog({
                                imageUrl : K('#pichz_game').val(),
                                clickFn : function(url, title, width, height, border, align) {
                                        K('#pichz_game').val(url);
                                        editor.hideDialog();
                                }
                        });
                });
        });
        //选择图片
        K('#imagehz_index').click(function() {
                editor.loadPlugin('image', function() {
                        editor.plugin.imageDialog({
                                imageUrl : K('#pichz_index').val(),
                                clickFn : function(url, title, width, height, border, align) {
                                        K('#pichz_index').val(url);
                                        editor.hideDialog();
                                }
                        });
                });
        });
		
		
		
	$.each($('input.filltag'), function(i,val){
		$(val).attr('rel',$(val).val());
	});
});

function changetag(obj){
	var tag = obj.value;
	$.each($('input.filltag'), function(i,val){
		$(val).val($(val).attr('rel')+tag+'.jpg');
	});
}

//-->
</SCRIPT>
<table class="table set_table">

  <form action="__URL__/<?php echo ($act); ?>" method="post" name="Form1" onSubmit="return check()">
  <tr>
    <td width="12%" height="30" align="right" valign="middle">排序：</td>
    <td width="88%" valign="middle" class="huise_font"><input name="sort" type="text" id="sort" size="50" value="<?php echo ($vo["sort"]); ?>"  class="inputclass inputtitle"/></td>
  </tr>
  <tr>
    <td width="12%" height="30" align="right" valign="middle">游戏名称：</td>
    <td width="88%" valign="middle" class="huise_font"><input name="gamename" type="text" id="gamename" size="50" value="<?php echo ($vo["gamename"]); ?>"  class="inputclass inputtitle"/></td>
  </tr>
  <tr>
    <td width="12%" height="30" align="right" valign="middle">TAG标签：</td>
    <td width="88%" valign="middle" class="huise_font"><input name="tag" id="tag" type="text" class="inputclass" value="<?php echo ($vo["tag"]); ?>">（游戏名称拼音的第一个字母）</td>
  </tr>
    <tr>
    <td width="12%" height="30" align="right" valign="middle">混服接口：</td>
    <td width="88%" valign="middle" class="huise_font">
	<select name='bs' id="bs">
        <option value='0' <?php if($vo["bs"] == '0'): ?>selected='selected'<?php endif; ?>>请选择混服接口</option>
        <?php if(is_array($hun)): $i = 0; $__LIST__ = $hun;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hun): $mod = ($i % 2 );++$i;?><option value='<?php echo ($hun["bs"]); ?>' <?php if($hun["bs"] == $vo['bs']): ?>selected='selected'<?php endif; ?>><?php echo ($hun["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>		</td>
  </tr>
  <tr>
    <td width="12%" height="30" align="right" valign="middle">混服编号：</td>
    <td width="88%" valign="middle" class="huise_font"><input name="pic[gid]" id="picgid" type="text" class="inputclass" value="<?php echo ($vo["pic"]["gid"]); ?>">（游戏混服的ID，用于充值。）</td>
  </tr>
  <tr>
    <td width="12%" height="30" align="right" valign="middle">游戏单位：</td>
    <td width="88%" valign="middle" class="huise_font"><input name="unit" type="text" id="unit" size="50" value="<?php echo ($vo["unit"]); ?>" class="inputclass inputtitle"/> 如：元宝、金币</td>
  </tr>
  <tr>
    <td width="12%" height="30" align="right" valign="middle">充值比率：</td>
    <td width="88%" valign="middle" class="huise_font"><input name="rate" type="text" id="rate" size="50" value="<?php echo ($vo["rate"]); ?>" class="inputclass inputtitle"/> 如：10、100</td>
  </tr>
    <tr>
    <td width="12%" height="30" align="right" valign="middle">玩家数：</td>
    <td width="88%" valign="middle" class="huise_font"><input name="wanjas" type="text" id="wanjas" size="50" value="<?php echo ($vo["wanjas"]); ?>" class="inputclass inputtitle"/> 
    如：5000</td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">游戏类型：</td>
    <td valign="middle" class="huise_font">
        <select name='category' id="category">
        <option value='0' <?php if($vo["category"] == '0'): ?>selected='selected'<?php endif; ?>>请选择游戏类型</option>
        <option value='战争策略' <?php if($vo["category"] == '战争策略'): ?>selected='selected'<?php endif; ?>>─战争策略─</option>
        <option value='角色扮演' <?php if($vo["category"] == '角色扮演'): ?>selected='selected'<?php endif; ?>>─角色扮演─</option>
        <option value='模拟经营' <?php if($vo["category"] == '模拟经营'): ?>selected='selected'<?php endif; ?>>─模拟经营─</option>
        <option value='社区养成' <?php if($vo["category"] == '社区养成'): ?>selected='selected'<?php endif; ?>>─社区养成─</option>
        <option value='休闲竞技' <?php if($vo["category"] == '休闲竞技'): ?>selected='selected'<?php endif; ?>>─休闲竞技─</option>
        <option value='其他' <?php if($vo["category"] == '其他'): ?>selected='selected'<?php endif; ?>>─其他─</option>
        </select>
        &nbsp;&nbsp;状态类型：
        <select name='statetype' id="statetype">
        <option value='0' <?php if($vo["statetype"] == '0'): ?>selected='selected'<?php endif; ?>>请选择状态类型</option>
        <option value='封测' <?php if($vo["statetype"] == '封测'): ?>selected='selected'<?php endif; ?>>─封测─</option>
        <option value='内测' <?php if($vo["statetype"] == '内测'): ?>selected='selected'<?php endif; ?>>─内测─</option>
        <option value='公测' <?php if($vo["statetype"] == '公测'): ?>selected='selected'<?php endif; ?>>─公测─</option>
        <option value='运营' <?php if($vo["statetype"] == '运营'): ?>selected='selected'<?php endif; ?>>─运营─</option>
        </select>
          &nbsp;&nbsp;首字母：
   	 <select name="szm"  size="1" id="szm">
            <option value="1" <?php if($vo["szm"] == '1'): ?>selected='selected'<?php endif; ?>>ABC</option>
            <option value="2" <?php if($vo["szm"] == '2'): ?>selected='selected'<?php endif; ?>>DEF</option>
            <option value="3" <?php if($vo["szm"] == '3'): ?>selected='selected'<?php endif; ?>>GHI</option>
            <option value="4" <?php if($vo["szm"] == '4'): ?>selected='selected'<?php endif; ?>>JKL</option>
            <option value="5" <?php if($vo["szm"] == '5'): ?>selected='selected'<?php endif; ?>>MNO</option>
            <option value="6" <?php if($vo["szm"] == '6'): ?>selected='selected'<?php endif; ?>>PQR</option>	
            <option value="7" <?php if($vo["szm"] == '7'): ?>selected='selected'<?php endif; ?>>STU</option>
            <option value="8" <?php if($vo["szm"] == '8'): ?>selected='selected'<?php endif; ?>>VWXYZ</option>
	  </select>
          &nbsp;&nbsp;打开方式：
   	 <select name="target"  size="1" id="target">
            <option value="_blank" <?php if($vo["target"] == '_blank'): ?>selected='selected'<?php endif; ?>>_blank</option>
            <option value="_new" <?php if($vo["target"] == '_new'): ?>selected='selected'<?php endif; ?>>_new</option>
            <option value="_parent" <?php if($vo["target"] == '_parent'): ?>selected='selected'<?php endif; ?>>_parent</option>
            <option value="_self" <?php if($vo["target"] == '_self'): ?>selected='selected'<?php endif; ?>>_self</option>
            <option value="_top" <?php if($vo["target"] == '_top'): ?>selected='selected'<?php endif; ?>>_top</option>
	  </select>    </td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">推荐级别：</td>
    <td valign="middle" class="huise_font">
        <input class='np' type='checkbox' name='flags[]' id='flagst' value='t' <?php if($flag["t"] == 't'): ?>checked<?php endif; ?>>置顶[t]
        <input class='np' type='checkbox' name='flags[]' id='flagsc' value='c' <?php if($flag["c"] == 'c'): ?>checked<?php endif; ?>>推荐[c]
        <input class='np' type='checkbox' name='flags[]' id='flagsh' value='h' <?php if($flag["h"] == 'h'): ?>checked<?php endif; ?>>热门[h]
        <input class='np' type='checkbox' name='flags[]' id='flagss' value='s' <?php if($flag["s"] == 's'): ?>checked<?php endif; ?>>测试[s]
        <input class='np' type='checkbox' name='flags[]' id='flagsn' value='n' <?php if($flag["n"] == 'n'): ?>checked<?php endif; ?>>新游[n]
        <input class='np' type='checkbox' name='flags[]' id='flagsb' value='b' <?php if($flag["b"] == 'b'): ?>checked<?php endif; ?>>加粗[b]
        <input class='np' type='checkbox' name='flags[]' id='flagsr' value='r' <?php if($flag["r"] == 'r'): ?>checked<?php endif; ?>>维护[r]</td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">游戏图片：</td>
    <td valign="middle" class="huise_font"><input name="pic[game]" id="picgame" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($vo["pic"]["game"]); ?>"> &nbsp;<input type="button" id="imagegame" value="选择图片" />
	游戏中心(272x150)[game]</td>
  </tr>
   <tr>
    <td height="30" align="right" valign="middle">推荐图片：</td>
    <td valign="middle" class="huise_font"><input name="pic[best]" id="picbest" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($vo["pic"]["best"]); ?>"> &nbsp;<input type="button" id="imagebest" value="选择图片" />
	首页推荐(270x293)[best]</td>
  </tr>
  
   <tr>
    <td height="30" align="right" valign="middle">首页图片：</td>
    <td valign="middle" class="huise_font"><input name="pic[index]" id="picindex" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($vo["pic"]["index"]); ?>"> &nbsp;<input type="button" id="imageindex" value="选择图片" />
	首页游戏推荐,游戏大全图片(273x120)[index]</td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">置顶图片：</td>
    <td valign="middle" class="huise_font"><input name="pic[top]" id="pictop" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($vo["pic"]["top"]); ?>"> &nbsp;<input type="button" id="imagetop" value="选择图片" />
	游戏中心热门大图(1221x410)[top]</td>
  </tr>
  
  
  <tr>
    <td height="30" align="right" valign="middle">充值图片：</td>
    <td valign="middle" class="huise_font"><input name="pic[pay]" id="picispay" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($vo["pic"]["pay"]); ?>"> &nbsp;<input type="button" id="imageispay" value="选择图片" />
	[pay]	</td>
  </tr>
  
  <tr>
    <td height="30" align="right" valign="middle">充值广告：</td>
    <td valign="middle" class="huise_font"><input name="pic[pay_ad]" id="picpay_ad" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($vo["pic"]["pay_ad"]); ?>"> &nbsp;<input type="button" id="imagepay_ad" value="选择图片" />
	游戏礼包图片[pay_ad]	</td>
  </tr>
  
  <tr>
    <td height="30" align="right" valign="middle">小图标：</td>
    <td valign="middle" class="huise_font"><input name="pic[icon]" id="picicon" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($vo["pic"]["icon"]); ?>"> &nbsp;<input type="button" id="imageicon" value="选择图片" />
	游戏小图[icon]	</td>
  </tr>
  
  
  <tr>
    <td height="30" align="right" valign="middle">盒子推荐图：</td>
    <td valign="middle" class="huise_font"><input name="pic[hz_index]" id="pichz_index" type="text" size="50" class="inputclass inputtitle filltag" value="<?php echo ($vo["pic"]["hz_index"]); ?>"> &nbsp;<input type="button" id="imagehz_index" class="btn btn-inverse m1em_t" value="选择图片" />
	游戏盒子图片（144x201）[hz_index] 
	</td>
  </tr>
    <tr>
    <td height="30" align="right" valign="middle">盒子内图：</td>
    <td valign="middle" class="huise_font"><input name="pic[hz_game]" id="pichz_game" type="text" size="50" class="inputclass inputtitle filltag" value="<?php echo ($vo["pic"]["hz_game"]); ?>"> &nbsp;<input type="button" id="imagehz_game" class="btn btn-inverse m1em_t" value="选择图片" />
	游戏盒子图片（262x222）[hz_game]
	</td>
  </tr>
    <tr>
    <td height="30" align="right" valign="middle">盒子小图标：</td>
    <td valign="middle" class="huise_font"><input name="pic[hz_ico]" id="pichz_ico" type="text" size="50" class="inputclass inputtitle filltag" value="<?php echo ($vo["pic"]["hz_ico"]); ?>"> &nbsp;<input type="button" id="imagehz_ico" class="btn btn-inverse m1em_t" value="选择图片" />
	游戏盒子图片（70x63）[hz_ico]
	</td>
  </tr>
  
  
  <tr>
    <td height="30" align="right" valign="middle">官网地址：</td>
    <td valign="middle" class="huise_font"><input name="website" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($vo["website"]); ?>"></td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">论坛地址：</td>
    <td valign="middle" class="huise_font"><input name="bbs" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($vo["bbs"]); ?>"></td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">新手指南：</td>
    <td valign="middle" class="huise_font"><input name="guide" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($vo["guide"]); ?>"></td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">客服地址：</td>
    <td valign="middle" class="huise_font"><input name="kefu" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($vo["kefu"]); ?>"></td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">新手卡：</td>
    <td valign="middle" class="huise_font"><input name="card" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($vo["card"]); ?>"></td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">活动标题：</td>
    <td valign="middle" class="huise_font"><input name="extend[activitytitle]" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($vo["extend"]["activitytitle"]); ?>"></td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">活动地址：</td>
    <td valign="middle" class="huise_font"><input name="extend[activityurl]" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($vo["extend"]["activityurl"]); ?>"></td>
  </tr>
	<!-- 2013-04-23 18:24:36 st add -->
  <tr>
    <td height="30" align="right" valign="middle">微端地址：</td>
    <td valign="middle" class="huise_font"><input name="downurl" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($vo["downurl"]); ?>"></td>
  </tr>
  <!--tr>
    <td height="30" align="right" valign="middle">官网导航：</td>
    <td valign="middle" class="huise_font">
1：<input name="extend[gwurl1]" type="text" size="50" class="inputclass" value="<?php echo ($vo["extend"]["gwurl1"]); ?>">
2：<input name="extend[gwurl2]" type="text" size="50" class="inputclass" value="<?php echo ($vo["extend"]["gwurl2"]); ?>">
3：<input name="extend[gwurl3]" type="text" size="50" class="inputclass" value="<?php echo ($vo["extend"]["gwurl3"]); ?>">
4：<input name="extend[gwurl4]" type="text" size="50" class="inputclass" value="<?php echo ($vo["extend"]["gwurl4"]); ?>">
	</td>
  </tr-->

  <tr>
    <td height="30" align="right" valign="middle">游戏介绍：</td>
    <td valign="middle" class="huise_font"><textarea id="content" name="content"  style="width:350px;height:150px;visibility:hidden;"><?php echo ($vo["content"]); ?></textarea></td>
  </tr>
<tr>
    <td height="30" align="right" valign="middle">各类版号：</td>
    <td valign="middle" class="huise_font">
    <textarea name="icp" cols="120" rows="2"><?php echo ($vo["icp"]); ?></textarea>用&lt;em&gt;|&lt;/em&gt;来分割</td>
</tr>
<tr>
    <td height="30" align="right" valign="middle">工会首冲：</td>
    <td valign="middle" class="huise_font">
    <input name="sc" type="text" size="5" class="inputclass" value="<?php echo ($vo["sc"]); ?>">
    </td>
</tr>
  <tr>
    <td height="30" align="right" valign="middle">状态：</td>
    <td valign="middle" class="huise_font">充值 <input type="checkbox" name="ispay" value="1" <?php if($vo["ispay"] == 1): ?>checked<?php endif; ?>> 显示 <input type="checkbox" name="isdisplay" value="1" <?php if($vo["isdisplay"] == 1): ?>checked<?php endif; ?>> 审核 <input type="checkbox" name="status" value="1" <?php if($vo["status"] == 1): ?>checked<?php endif; ?>></td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">添加日期：</td>
    <td valign="middle" class="huise_font"><input name="addtime" type="text" id="addtime" size="20" value="<?php echo (date("Y-m-d H:i:s",$vo["addtime"])); ?>"  class="inputclass"/></td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">推广页X Y：</td>
    <td valign="middle" class="huise_font">X<input name="tuix" type="text" size="5" class="inputclass" value="<?php echo ($vo["tuix"]); ?>">Y<input name="tuiy" type="text" size="5" class="inputclass" value="<?php echo ($vo["tuiy"]); ?>"></td>
  </tr>
  <tr>
    <td height="50" colspan="2" align="center" valign="middle">
    <input name="id" type="hidden" id="id" size="20" value="<?php echo ($vo["id"]); ?>"/>
    <input type="submit" class="btn btn-primary btn-small" name="Submit" id="submit" value="确认提交">    </td>
  </tr>
  </form>
</table>

        

</div>
      <!--end Right Content-->  


<script type="text/javascript">
function formSubmit() {
	//alert(document.form1.action);
	document.form1.submit();
}

</script>
<script type="text/javascript">
    $(".copyright").load("<?php echo U('Index/copyright');?>");
</script>

</body>
</html>