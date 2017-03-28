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

    if(!trim($("#type").val()) || trim($("#type").val()) == 0) {
        alert("请选择链接类型！");
        $("#type").focus();
        return false;
    }
    if(!trim($("#webname").val())) {
        alert("请填写链接名称！");
        $("#webname").focus();
        return false;
    }
    if(!trim($("#website").val())) {
        alert("请填写链接地址！");
        $("#website").focus();
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
            uploadJson : '__ADMIN__/kindeditor/php/upload_json.php?dir=friendlink',
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
        
        //选择图片
        K('#image').click(function() {
                editor.loadPlugin('image', function() {
                        editor.plugin.imageDialog({
                                imageUrl : K('#pic').val(),
                                clickFn : function(url, title, width, height, border, align) {
                                        K('#pic').val(url);
                                        editor.hideDialog();
                                }
                        });
                });
        });
          
});
//-->
</SCRIPT>
  <table class="table set_table">
  <form action="__URL__/<?php echo ($act); ?>" method="post" name="Form1" onSubmit="return check()">
  <tr>
    <td width="12%" height="30" align="right" valign="middle">排序：</td>
    <td width="88%" valign="middle" class="huise_font"><input name="sort" type="text" id="gamename" size="50"  class="inputclass inputtitle" value="<?php echo ($vo["sort"]); ?>" /></td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">显示位置：</td>
    <td valign="middle" class="huise_font">
        <select name='flag' id="flag">
        <option value='1' <?php if($vo["flag"] == '1'): ?>selected='selected'<?php endif; ?>>游戏平台</option>
        <option value='2' <?php if($vo["flag"] == '2'): ?>selected='selected'<?php endif; ?>>游戏官网</option>
        </select>
        &nbsp;&nbsp;显示游戏：
        <select name='gid' id="gid">
        <option value='0'>游戏名称</option>
        <?php if(is_array($game)): $i = 0; $__LIST__ = $game;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$game): $mod = ($i % 2 );++$i;?><option value='<?php echo ($game["id"]); ?>'><?php echo ($game["gamename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
        &nbsp;&nbsp;链接类型：
        <select name='type' id="type">
        <option value='0' <?php if($vo["type"] == '0'): ?>selected='selected'<?php endif; ?>>链接类型</option>
        <option value='1' <?php if($vo["type"] == '1'): ?>selected='selected'<?php endif; ?>>文字链接</option>
        <option value='2' <?php if($vo["type"] == '2'): ?>selected='selected'<?php endif; ?>>LOGO链接</option>
        </select>
          &nbsp;&nbsp;打开方式：
   	 <select name="target"  size="1" id="target">
            <option value="_blank" <?php if($vo["target"] == '_blank'): ?>selected='selected'<?php endif; ?>>_blank</option>
            <option value="_new" <?php if($vo["target"] == '_new'): ?>selected='selected'<?php endif; ?>>_new</option>
            <option value="_parent" <?php if($vo["target"] == '_parent'): ?>selected='selected'<?php endif; ?>>_parent</option>
            <option value="_self" <?php if($vo["target"] == '_self'): ?>selected='selected'<?php endif; ?>>_self</option>
            <option value="_top" <?php if($vo["target"] == '_top'): ?>selected='selected'<?php endif; ?>>_top</option>
	  </select>
    </td>
  </tr>


  
  <tr>
    <td height="30" align="right" valign="middle">链接名称：</td>
    <td valign="middle" class="huise_font"><input name="webname" id="webname" type="text" size="50" class="inputclass inputtitle" value="" /></td>
  </tr>  
  
  <tr>
    <td height="30" align="right" valign="middle">链接地址：</td>
    <td valign="middle" class="huise_font"><input name="website" id="website" type="text" size="50" class="inputclass inputtitle" value="" /></td>
  </tr>
  
  <tr>
    <td height="30" align="right" valign="middle">LOGO图片：</td>
    <td valign="middle" class="huise_font"><input name="pic" id="pic" type="text" size="50" class="inputclass inputtitle" value="" /> &nbsp;<input type="button" id="image" class="btn btn-inverse m1em_t" value="选择图片" /> </td>
  </tr>

  <tr>
    <td height="30" align="right" valign="middle">联系QQ：</td>
    <td valign="middle" class="huise_font"><input name="qq" id="qq" type="text" size="50" class="inputclass inputtitle" value="" /></td>
  </tr>
  
  <tr>
    <td height="30" align="right" valign="middle">联系邮箱：</td>
    <td valign="middle" class="huise_font"><input name="email" id="email" type="text" size="50" class="inputclass inputtitle" value="" /></td>
  </tr>
  
  <tr>
    <td height="30" align="right" valign="middle">联系电话：</td>
    <td valign="middle" class="huise_font"><input name="tel" id="email" type="text" size="50" class="inputclass inputtitle" value="" /></td>
  </tr> 
  
  <tr>
    <td height="30" align="right" valign="middle">链接描述：</td>
    <td  valign="middle" class="huise_font"><textarea id="content" name="content"  style="width:350px;height:150px;visibility:hidden;"></textarea></td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">状态：</td>
    <td valign="middle" class="huise_font">
        显示 <input type="checkbox" name="isdisplay" value="1" checked> 
        审核 <input type="checkbox" name="status" value="1" checked></td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">添加日期：</td>
    <td valign="middle" class="huise_font"><input name="addtime" type="text" id="addtime" size="20" value="<?php echo date("Y-m-d H:i:s");?>"  class="inputclass"/></td>
  </tr>
  <tr>
    <td height="50" colspan="2" align="center" valign="middle">
        <input type="submit" class="btn btn-primary btn-small" name="Submit" id="submit" value="确认提交">
    </td>
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