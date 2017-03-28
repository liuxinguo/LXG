<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<script type="text/javascript" src="__ADMIN__/Admin/Js/jquery.js"></script>
<script type="text/javascript" src="__ADMIN__/Admin/Js/bootstrap.js"></script>
<script type="text/javascript" src="__ADMIN__/Admin/Js/jshack.js"></script>
<link href="__ADMIN__/Admin/Css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="__ADMIN__/Admin/Css/style.css" rel="stylesheet" type="text/css" />
<title><?php echo (L("welcome")); ?></title>
<script type="text/javascript" charset="utf-8"  src="__ADMIN__/kindeditor/kindeditor.js"></script>
<script type="text/javascript" charset="utf-8"  src="__ADMIN__/kindeditor/lang/zh_CN.js"></script>
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
    if(!trim($("#cid").val())) {
        alert("请选择新闻类别！");
        $("#cid").focus();
        return false;
    }
}


//初始化编辑
var editor;
KindEditor.ready(function(K) {
        editor = K.create('#content', {
            cssPath : '__ADMIN__/kindeditor/plugins/code/prettify.css',
			themeType : 'simple',
            uploadJson : '__ADMIN__/kindeditor/php/upload_json.php?dir=article',
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

        K('#imagebest').click(function() {
                editor.loadPlugin('image', function() {
                        editor.plugin.imageDialog({
                                imageUrl : K('#thumbpic').val(),
                                clickFn : function(url, title, width, height, border, align) {
                                        K('#thumbpic').val(url);
                                        editor.hideDialog();
                                }
                        });
                });
        });
          
});
//-->
</SCRIPT>
</head>
<body>
<div class="content">
        <div class="page-header">
          <h3 class="fl"><?php echo ($act_title); ?></h3>  
          <div class="user_message fr"><i class="icon-wrench"></i><?php echo (L("configuring_site")); ?></div>
          <div class="cl"></div>
        </div>
        <table class="table set_table">

  <tr>
    <td height="32" colspan="2" align="center" valign="middle"  class="tit_bg"><b><?php echo ($act_title); ?></b></td>
   </tr>
  <form action="__URL__/<?php echo ($act); ?>" method="post" name="Form1" onSubmit="return check()">
  <tr>
    <td width="12%" height="30" align="right" valign="middle"> 新闻标题：</td>
    <td width="88%" valign="middle" class="huise_font"><input name="title" type="text" id="title" size="50"  class="inputclass inputtitle" value="<?php echo ($vo["title"]); ?>"/> &nbsp;&nbsp;颜色：<input type="text" id="color" value="<?php echo ($vo["color"]); ?>" name="color" /> <input class="btn m1em_t" type="button" id="colorpicker" value="选择颜色" /></td>
  </tr>
  <tr>
    <td width="12%" height="30" align="right" valign="middle"> 自定义属性：</td>
    <td width="88%" valign="middle" class="huise_font">
        <input class='np' type='checkbox' name='flags[]' id='flagsh' value='h' <?php if($flag["h"] == 'h'): ?>checked<?php endif; ?>>&nbsp;&nbsp;头条[h]&nbsp;&nbsp;
        <input class='np' type='checkbox' name='flags[]' id='flagsc' value='c' <?php if($flag["c"] == 'c'): ?>checked<?php endif; ?>>&nbsp;&nbsp;推荐[c]&nbsp;&nbsp;
        <input class='np' type='checkbox' name='flags[]' id='flagsf' value='f' <?php if($flag["f"] == 'f'): ?>checked<?php endif; ?>>&nbsp;&nbsp;幻灯[f]&nbsp;&nbsp;
        <input class='np' type='checkbox' name='flags[]' id='flagsa' value='a' <?php if($flag["a"] == 'a'): ?>checked<?php endif; ?>>&nbsp;&nbsp;特荐[a]&nbsp;&nbsp;
        <input class='np' type='checkbox' name='flags[]' id='flagss' value='s' <?php if($flag["s"] == 's'): ?>checked<?php endif; ?>>&nbsp;&nbsp;滚动[s]&nbsp;&nbsp;
        <input class='np' type='checkbox' name='flags[]' id='flagsb' value='b' <?php if($flag["b"] == 'b'): ?>checked<?php endif; ?>>&nbsp;&nbsp;加粗[b]&nbsp;&nbsp;
        <input class='np' type='checkbox' name='flags[]' id='flagsp' value='p' <?php if($flag["p"] == 'p'): ?>checked<?php endif; ?>>&nbsp;&nbsp;图片[p]&nbsp;&nbsp;
        <input name="flags[]" id='flagss' type="checkbox" value="j" onClick="chg('durl','dcontent',this,'display','')" <?php if($flag["j"] == 'j'): ?>checked<?php endif; ?>>跳转[j]</td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">新闻类别：</td>
    <td valign="middle" class="huise_font">
   	 <select name="cid"  size="1" id="cid">
            <option value="">--选择类别--</option>
            <option value="1" <?php if($vo["cid"] == '1'): ?>selected='selected'<?php endif; ?>>新闻公告</option>
            <option value="2" <?php if($vo["cid"] == '2'): ?>selected='selected'<?php endif; ?>>游戏公告</option>
            <option value="3" <?php if($vo["cid"] == '3'): ?>selected='selected'<?php endif; ?>>活动资讯</option>
            <option value="4" <?php if($vo["cid"] == '4'): ?>selected='selected'<?php endif; ?>>综合新闻</option>
            <option value="5" <?php if($vo["cid"] == '5'): ?>selected='selected'<?php endif; ?>>充值问题</option>
            <option value="6" <?php if($vo["cid"] == '6'): ?>selected='selected'<?php endif; ?>>游戏问题</option>
			<option value="7" <?php if($vo["cid"] == '7'): ?>selected='selected'<?php endif; ?>>账号问题</option>
            <option value="8" <?php if($vo["cid"] == '8'): ?>selected='selected'<?php endif; ?>>热门活动专题</option>
            <option value="9" <?php if($vo["cid"] == '9'): ?>selected='selected'<?php endif; ?>>游戏盒子专区</option>
            <option value="10" <?php if($vo["cid"] == '10'): ?>selected='selected'<?php endif; ?>>安全问题</option>
	  </select>
        &nbsp;&nbsp;所属游戏：
   	 <select name="mid"  size="1" id="mid">
   	  <option value="">--选择类别--</option>
          <?php if(is_array($game)): $i = 0; $__LIST__ = $game;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$game): $mod = ($i % 2 );++$i;?><option value="<?php echo ($game["id"]); ?>" <?php if($game["id"] == $vo['mid']): ?>selected='selected'<?php endif; ?>><?php echo ($game["gamename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
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
    <td height="30" align="right" valign="middle">文章作者：</td>
        <td valign="middle" class="huise_font"><input name="author" type="text" class="inputclass" value="<?php echo ($vo["author"]); ?>"> Tag标签：<input name="tag" type="text" class="inputclass" value="<?php echo ($vo["tag"]); ?>">（多个关键词请用英文逗号,分隔）</td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">新闻图片：</td>
    <td valign="middle" class="huise_font"><input name="pic" id="pic" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($vo["pic"]); ?>"> <input type="button" class="btn btn-inverse m1em_t" id="image" value="选择图片" /></td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">新闻小图片：</td>
    <td valign="middle" class="huise_font"><input name="thumbpic" id="thumbpic" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($vo["thumbpic"]); ?>"> <input type="button" class="btn btn-inverse m1em_t" id="imagebest" value="选择图片" /></td>
  </tr>
  <tr id="durl" style="<?php if($flag["j"] == 'j'): ?>display:black;<?php else: ?>display:none;<?php endif; ?>">
    <td height="30" align="right" valign="middle">连接地址：</td>
    <td valign="middle"><input name="url" type="text" class="inputclass inputtitle" value="<?php echo ($vo["url"]); ?>"></td>
  </tr>
  <tbody id="dcontent" style="<?php if($flag["j"] == 'j'): ?>display:none;<?php else: ?>display:black;<?php endif; ?>">
  <tr>
    <td height="30" align="right" valign="middle">详细内容：</td>
    <td  valign="middle" class="huise_font"><textarea id="content" name="content"  style="width:680px;height:300px;visibility:hidden;"><?php echo ($vo["content"]); ?></textarea></td>

  </tr>
  <tr>
    <td height="40" align="right" valign="middle">文章选项：</td>
    <td valign="middle" style="color:#585858" class="huise_font"><!--<input name="gimg" type="checkbox" id="gimg" value="1"  /> 保存远程图片&nbsp;&nbsp;&nbsp;<input name="alink" type="checkbox" id="alink" value="1" />去除连接&nbsp;&nbsp;&nbsp;-->截取内容
      <input type="text"  name="length" class="inputclass"  style="width:35px"  value="150"/> 字符做为简介<!--&nbsp;&nbsp;&nbsp;设置内容第
      <input type="text"  name="spic" class="inputclass"  style="width:35px" /> 张图片做为为展示图--></td>

  </tr>
  <tr>
    <td height="30" align="right" valign="middle">内容简介：</td>
    <td valign="middle" class="huise_font"><textarea name="introduction"  cols="85" rows="3"><?php echo ($vo["introduction"]); ?></textarea></td>
  </tr>
  </tbody>
  <tr>
    <td height="30" align="right" valign="middle">浏览次数：</td>
    <td valign="middle" class="huise_font"><input name="clicknum" type="text" size="30" class="inputclass" value="<?php echo ($vo["clicknum"]); ?>"></td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">状态：</td>
    <td valign="middle" class="huise_font">显示 <input type="checkbox" name="isdisplay" value="1" <?php if($vo["isdisplay"] == 1): ?>checked<?php endif; ?>> 审核 <input type="checkbox" name="status" value="1" <?php if($vo["status"] == 1): ?>checked<?php endif; ?>></td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">添加日期：</td>
    <td valign="middle" class="huise_font"><input name="addtime" type="text" id="addtime" size="20" value="<?php echo (date("Y-m-d H:i:s",$vo["addtime"])); ?>"  class="inputclass"/></td>
  </tr>
  <tr>
    <td height="50" colspan="2" align="center" valign="middle">
        <input name="id" type="hidden" id="id" value="<?php echo ($vo["id"]); ?>"/>  
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
</html>