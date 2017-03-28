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
    if(!trim($("#title").val())) {
        alert("请输入新闻标题！");
        $("#title").focus();
        return false;
    }
    if(!trim($("#cate").val())) {
        alert("请选择新闻类别！");
        $("#cate").focus();
        return false;
    }
	if(!trim($("#gam").val())) {
        alert("请选择游戏！");
        $("#gam").focus();
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
            uploadJson : '__ADMIN__/kindeditor/php/upload_json.php?dir=gamesitenew',
            fileManagerJson : '__ADMIN__/kindeditor/php/file_manager_json.php',
            allowFileManager : true,
			items: ['source', '|', 'undo', 'redo', '|', 'preview', 'print', 'template', 'code', 'cut', 'copy', 'paste', 'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright', 'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript', 'superscript', 'clearhtml', 'quickformat', 'selectall', '|', 'fullscreen',  'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image', 'multiimage', 'flash', 'media', 'insertfile', 'table', 'hr', 'emoticons', 'baidumap', 'pagebreak', 'anchor', 'link', 'unlink', '|', 'about']
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
  <form action="<?php echo U('gamepublishedit');?>" method="post" name="Form1" onSubmit="return check()">
  <input type="hidden" name="id" value="<?php echo ($title["id"]); ?>" />
  <tr>
    <td width="12%" height="30" align="right" valign="middle"> 新闻标题：</td>
    <td width="88%" valign="middle" class="huise_font"><input name="title" type="text" id="title" size="50" value="<?php echo ($title["title"]); ?>"  class="inputclass inputtitle"/> &nbsp;&nbsp;颜色：<input type="text" id="color" value="" name="color" /> <input class="btn m1em_t" type="button" id="colorpicker" value="选择颜色" /></td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">新闻类别：</td>
    <td valign="middle" class="huise_font">
   	 <select name="cate"  size="1" id="cate">
   	  <option value="">--选择类别--</option>
		<?php if(is_array($cate)): $k = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><option value="<?php echo ($k); ?>" <?php if($title["cate"] == $k): ?>selected="selected"<?php endif; ?>><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	  </select>
        
        &nbsp;&nbsp;所属游戏：
   	 <select name="game"  size="1" id="gam">
   	  <option value="">--选择类别--</option>
          <?php if(is_array($game)): $i = 0; $__LIST__ = $game;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$game): $mod = ($i % 2 );++$i;?><option value="<?php echo ($game["id"]); ?>" <?php if($title[gid] == $game[id]): ?>selected="selected"<?php endif; ?>><?php echo ($game["gamename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	  </select>
        
          &nbsp;&nbsp;打开方式：
   	 <select name="target"  size="1" id="target">
            <option value="_blank">_blank</option>
            <option value="_new">_new</option>
            <option value="_parent">_parent</option>
            <option value="_self">_self</option>
            <option value="_top">_top</option>
	  </select>	  </td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">文章作者：</td>
        <td valign="middle" class="huise_font"><input name="author" type="text" class="inputclass" value="<?php echo ($title["author"]); ?>"> </td>
  </tr>
    <tr>
    <td height="30" align="right" valign="middle">新闻图片：</td>
    <td valign="middle" class="huise_font"><input name="pic" id="pic" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($title["pic"]); ?>"> <input type="button" class="btn btn-inverse m1em_t" id="image" value="选择图片" /></td>
  </tr>
  <tr id="durl">
    <td height="30" align="right" valign="middle">跳转地址：</td>
    <td valign="middle"><input name="url" type="text" class="inputclass inputtitle" value="<?php echo ($title["redirect"]); ?>"></td>
  </tr>
    <tr>
    <td height="30" align="right" valign="middle">游戏介绍：</td>
    <td valign="middle" class="huise_font"><textarea name="ccontent"  cols="85" rows="3"><?php echo ($title["ccontent"]); ?></textarea></td>
  </tr>
  <tbody id="dcontent">
  <tr>
    <td height="30" align="right" valign="middle">详细内容：</td>
    <td  valign="middle" class="huise_font"><textarea id="content" name="content"  style="width:680px;height:300px;visibility:hidden;"><?php echo ($title["content"]); ?></textarea></td>
  </tr>
  </tbody>
  <tr>
    <td height="30" align="right" valign="middle">浏览次数：</td>
    <td valign="middle" class="huise_font"><input name="clicknum" type="text" size="30" class="inputclass" value="<?php echo ($title["click_num"]); ?>"></td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">状态：</td>
    <td valign="middle" class="huise_font">
	<select name="status">
		<option value="1" <?php if($title[status] == 1): ?>selected="selected"<?php endif; ?>>显示</option>
		<option value="0" <?php if($title[status] == 0): ?>selected="selected"<?php endif; ?>>审核</option>
	</select>
	</td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">添加日期：</td>
    <td valign="middle" class="huise_font"><input name="addtime" type="text" id="addtime" size="20" value="<?php echo date("Y-m-d H:i:s");?>"  class="inputclass"/></td>
  </tr>
  <tr>
    <td height="50" colspan="2" align="center" valign="middle"><input type="submit" class="btn btn-primary btn-small" name="Submit" id="submit" value="确认提交"></td>
  </tr>
  </form>
</table>


 <div class="copyright"></div>
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