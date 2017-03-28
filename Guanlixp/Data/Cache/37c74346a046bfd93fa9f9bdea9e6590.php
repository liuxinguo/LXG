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
        alert("请填写标识！");
        $("#title").focus();
        return false;
    }
    if(!trim($("#content").val())) {
        alert("请填写标题！");
        $("#content").focus();
        return false;
    }
    if(!trim($("#guide").val())) {
        alert("请填写描述！");
        $("#guide").focus();
        return false;
    }
}

var URL = '__URL__';
var APP	 =	 '__APP__';
var TPL = '__TPL____MANAGETPL__';

//初始化编辑
var editor;
KindEditor.ready(function(K) {
        editor = K.create('#guide', {
            cssPath : '__ADMIN__/kindeditor/plugins/code/prettify.css',
			themeType : 'simple',
            uploadJson : '__ADMIN__/kindeditor/php/upload_json.php?dir=article',
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
            html = K('#guide').val(); // KindEditor Node API
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
        <td height="30" width="200" align="right" valign="middle">游戏列表：</td>
        <td class="huise_font">
            <select onChange="gotoserver()" disabled="disabled">
                <option value='0' <?php if($vo['gid'] == 0): ?>selected='selected'<?php endif; ?>>全部游戏</option>
                <?php if(is_array($gamelist)): $i = 0; $__LIST__ = $gamelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value='<?php echo ($v["id"]); ?>' <?php if($v["id"] == $vo['gid']): ?>selected='selected'<?php endif; ?>><?php echo ($v["gamename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </td>
    </tr>

  <tr>
    <td height="30" align="right" valign="middle">新手卡分类标识：</td>
    <td valign="middle" class="huise_font"><input name="title" id="title" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($vo["title"]); ?>" />
	用来标识什么类型的新手卡,比如 新手卡.至尊新手卡.多玩大礼包等
	</td>
  </tr>  

  <tr>
    <td height="30" align="right" valign="middle">新手卡分类名称：</td>
    <td valign="middle" class="huise_font"><input name="content" id="content" type="text" size="50" class="inputclass inputtitle" value="<?php echo ($vo["content"]); ?>" /></td>
  </tr>  
  
  <tr>
    <td height="30" align="right" valign="middle">新手卡分类描述：</td>
    <td  valign="middle" class="huise_font"><textarea id="guide" name="guide"  style="width:350px;height:150px;visibility:hidden;"><?php echo ($vo["guide"]); ?></textarea></td>
  </tr>
  <tr>
    <td height="50" colspan="2" align="center" valign="middle">
        <input name="id" type="hidden" id="id" size="20" value="<?php echo ($vo["id"]); ?>"/>
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