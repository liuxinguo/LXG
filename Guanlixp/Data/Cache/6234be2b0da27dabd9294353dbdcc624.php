<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo (L("welcome")); ?></title>
<script type="text/javascript" src="__ADMIN__/Admin/Js/jquery.js"></script>
<script type="text/javascript" src="__ADMIN__/Admin/Js/bootstrap.js"></script>
<script type="text/javascript" src="__ADMIN__/Admin/Js/jshack.js"></script>
<script type="text/javascript" charset="utf-8"  src="__ADMIN__/kindeditor/kindeditor.js"></script>
<script type="text/javascript" charset="utf-8"  src="__ADMIN__/kindeditor/lang/zh_CN.js"></script>
<link href="__ADMIN__/Admin/Css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="__ADMIN__/Admin/Css/style.css" rel="stylesheet" type="text/css" />
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
            uploadJson : '__ADMIN__/kindeditor/php/upload_json.php?dir=cinfig',
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
        K('#image').click(function() {
                editor.loadPlugin('image', function() {
                        editor.plugin.imageDialog({
                                imageUrl : K('#logo').val(),
                                clickFn : function(url, title, width, height, border, align) {
                                        K('#logo').val(url);
                                        editor.hideDialog();
                                }
                        });
                });
        });
        K('#imagebg').click(function() {
                editor.loadPlugin('image', function() {
                        editor.plugin.imageDialog({
                                imageUrl : K('#bg').val(),
                                clickFn : function(url, title, width, height, border, align) {
                                        K('#bg').val(url);
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

<form name="form1" id="form1" action="__SELF__" method="post">
<input type="hidden" name="item" value="<?php echo ($item); ?>">
<div class="content">
        <div class="page-header">
          <h3 class="fl"><?php echo (L("basic_configuration")); ?></h3>  
          <div class="user_message fr"><i class="icon-wrench"></i><?php echo (L("configuring_site")); ?></div>
          <div class="cl"></div>
        </div>
        <table class="table set_table">
          <thead>
           <tr>
      <td width="12%" height="30" align="right"> 网站名称： </td>
      <td width="88%"  class="huise_font"><input name="ai[sitename]" type="text" class="inputclass inputtitle" value="<?php echo ($ai["sitename"]); ?>"></td>
    </tr>
     <tr>
      <td width="12%" height="30" align="right"> 网站TITLE： </td>
      <td width="88%"  class="huise_font"><input name="ai[title]" type="text" class="inputclass inputtitle" value="<?php echo ($ai["title"]); ?>"></td>
    </tr>
            <tr>
              <td height="30" align="right" > 网站关键字： </td>
              <td  class="huise_font"><input name="ai[keywords]" type="text" class="inputclass inputtitle" value="<?php echo ($ai["keywords"]); ?>"></td>
            </tr>
			
            <tr>
              <td height="30" align="right" > 网站描述： </td>
              <td class="huise_font"><textarea class="input-xlarge " name="ai[description]" cols="60" rows="8"><?php echo ($ai["description"]); ?></textarea></td>
            </tr>
            <tr class="">
              <td height="30" align="right"> 网站LOGO： </td>
              <td class="huise_font"><input name="logo" id="logo" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($ai["logo"]); ?>"> <input class="btn btn-inverse m1em_t" type="button" id="image" value="选择图片" />
			  <P style="display:none;"><textarea id="content" name="content"  style="width:680px;height:300px;visibility:hidden;"></textarea></P></td>
            </tr>
            <tr class="">
              <td height="30" align="right"> 网站背景： </td>
              <td class="huise_font"><input name="bg" id="bg" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($ai["bg"]); ?>"> <input class="btn btn-inverse m1em_t" type="button" id="imagebg" value="选择图片" />
 链接 <input name="ai[bgurl]" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($ai["bgurl"]); ?>">
  	</td>
            </tr>
            <tr class="">
              <td height="30" align="right"> 网站网址： </td>
              <td class="huise_font"><input name="ai[domain]" type="text" class="inputclass inputtitle" value="<?php echo ($ai["domain"]); ?>"></td>
            </tr>
            <tr class="">
              <td height="30" align="right"> 网站论坛： </td>
              <td class="huise_font"><input name="ai[bbs]" type="text" class="inputclass inputtitle" value="<?php echo ($ai["bbs"]); ?>"></td>
            </tr>
            <tr class="">
              <td height="30" align="right"> 子站调试地址： </td>
              <td class="huise_font"><input name="ai[url]" type="text" class="inputclass inputtitle" value="<?php echo ($ai["url"]); ?>">
              *无WWW，地址前加一个 点 如：.9iy.com </td>
            </tr>
            <tr class="">
              <td height="30" align="right"> 客服QQ： </td>
              <td class="huise_font"><input name="ai[qq]" type="text" class="inputclass inputtitle" value="<?php echo ($ai["qq"]); ?>"></td>
            </tr>
            <tr class="">
              <td height="30" align="right"> 客服电话： </td>
              <td class="huise_font"><input name="ai[tel]" type="text" class="inputclass inputtitle" value="<?php echo ($ai["tel"]); ?>"></td>
            </tr>
            <tr>
              <td height="30" align="right" > 网站版权： </td>
              <td class="huise_font"><input name="ai[siteright]" type="text" class="inputclass inputtitle" value="<?php echo ($ai["siteright"]); ?>"></td>
            </tr>
            <tr >
              <td height="30" align="right"> 网站ICP： </td>
              <td class="huise_font"><input name="ai[icp]" type="text" class="inputclass inputtitle" value="<?php echo ($ai["icp"]); ?>"></td>
            </tr>
            <tr  >
              <td height="30" align="right"> 管理员邮箱： </td>
              <td class="huise_font"><input name="ai[mail]" type="text" class="inputclass inputtitle" value="<?php echo ($ai["mail"]); ?>"></td>
            </tr>
            <tr class="">
              <td><?php echo (L("world_time")); ?></td>
              <td><select class="span5" name="ai[timezone]">
               <option value = '-8' <?php if(($ai["timezone"]) == "-8"): ?>selected="selected"<?php endif; ?> >伦敦</option>
              <option value = '-7' <?php if(($ai["timezone"]) == "-7"): ?>selected="selected"<?php endif; ?> >巴黎</option>
              <option value = '-6' <?php if(($ai["timezone"]) == "-6"): ?>selected="selected"<?php endif; ?> >雅典</option>
              <option value = '-5' <?php if(($ai["timezone"]) == "-5"): ?>selected="selected"<?php endif; ?> >莫斯科</option>
               <option value = '-4' <?php if(($ai["timezone"]) == "-4"): ?>selected="selected"<?php endif; ?> >阿布扎比</option>
                  <option value = '-3' <?php if(($ai["timezone"]) == "-3"): ?>selected="selected"<?php endif; ?> >伊斯兰堡</option>
                  <option value = '-2' <?php if(($ai["timezone"]) == "-2"): ?>selected="selected"<?php endif; ?> >孟达卡</option>
                  <option value = '-1' <?php if(($ai["timezone"]) == "-1"): ?>selected="selected"<?php endif; ?> >曼谷</option>
                  <option value = '0' <?php if(($ai["timezone"]) == "0"): ?>selected="selected"<?php endif; ?> >北京</option>
                  <option value = '1' <?php if(($ai["timezone"]) == "1"): ?>selected="selected"<?php endif; ?> >东京</option>
                  <option value = '2' <?php if(($ai["timezone"]) == "2"): ?>selected="selected"<?php endif; ?> >墨尔本</option>
                   <option value = '3' <?php if(($ai["timezone"]) == "3"): ?>selected="selected"<?php endif; ?> >惠灵顿</option>
                  <option value = '4' <?php if(($ai["timezone"]) == "4"): ?>selected="selected"<?php endif; ?> >阿皮亚</option>
                  <option value = '5' <?php if(($ai["timezone"]) == "5"): ?>selected="selected"<?php endif; ?> >夏威夷</option>
                  <option value = '6' <?php if(($ai["timezone"]) == "6"): ?>selected="selected"<?php endif; ?> >阿拉斯加</option>
                   <option value = '7' <?php if(($ai["timezone"]) == "7"): ?>selected="selected"<?php endif; ?> >旧金山</option>
                   <option value = '8' <?php if(($ai["timezone"]) == "8"): ?>selected="selected"<?php endif; ?> >丹佛</option>
                   <option value = '9' <?php if(($ai["timezone"]) == "9"): ?>selected="selected"<?php endif; ?> >墨西哥城</option>
                   <option value = '10' <?php if(($ai["timezone"]) == "10"): ?>selected="selected"<?php endif; ?> >亚特兰大</option>
                </select></td>
              <td class=""></td>
            </tr>
			 <tr>
              <td height="30" align="right" >屏蔽IP： </td>
              <td class="huise_font"><textarea class="input-xlarge " name="ai[pip]" cols="60" rows="8"><?php echo ($ai["pip"]); ?></textarea></td>
            </tr>

			 <tr>
              <td height="30" align="right" >用户白名单：</td>
              <td class="huise_font"><textarea class="input-xlarge " name="ai[pname]" cols="60" rows="8"><?php echo ($ai["pname"]); ?></textarea></td>
            </tr>
            <tr class="hide"><!--隐藏表格，用来增加插件新功能-->
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
        <p class="border_top"> <a class="btn btn-primary btn-small" onClick="formSubmit();"><?php echo (L("save_settings")); ?></a> </p>
        <div class="copyright"></div>
</div>
      <!--end Right Content-->  
</form>

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