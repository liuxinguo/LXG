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
</head>
<body>
<div class="content">
        <div class="page-header">
          <h3 class="fl"><?php echo ($act_title); ?></h3>  
          <div class="user_message fr"><i class="icon-wrench"></i><?php echo (L("configuring_site")); ?></div>
          <div class="cl"></div>
        </div>
  <table class="table set_table">
  <form action="__URL__/<?php echo ($act); ?>" method="post" name="Form1" onSubmit="return check()">
  <tr>
    <td width="12%" height="30" align="right" valign="middle">主题名称：</td>
    <td width="88%" valign="middle" class="huise_font"><input name="name" type="text" id="name" size="50"  class="inputclass inputtitle"/></td>
  </tr>
  <tr>
    <td width="12%" height="30" align="right" valign="middle">标签：</td>
    <td width="88%" valign="middle" class="huise_font"><input name="bs" id="bs" type="text" class="inputclass"></td>
  </tr>
  <tr>
    <td width="12%" height="30" align="right" valign="middle">路径：</td>
    <td width="88%" valign="middle" class="huise_font"><input name="lujing" type="text" id="lujing" size="50" class="inputclass inputtitle"/></td>
  </tr>
    <tr>
    <td width="12%" height="30" align="right" valign="middle">自定义属性1：</td>
    <td width="88%" valign="middle" class="huise_font"><input name="key1" type="text" id="wanjas" size="50" class="inputclass inputtitle"/></td>
  </tr>
  
  <tr>
    <td height="30" align="right" valign="middle">自定义属性2：</td>
    <td valign="middle" class="huise_font"><input name="key2" type="text" size="50" class="inputclass inputtitle"></td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">自定义属性3：</td>
    <td valign="middle" class="huise_font"><input name="key3" type="text" size="50" class="inputclass inputtitle"></td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">自定义属性4：</td>
    <td valign="middle" class="huise_font"><input name="key4" type="text" size="50" class="inputclass inputtitle"></td>
  </tr>
  <tr>
    <td height="30" align="right" valign="middle">备注：</td>
    <td valign="middle" class="huise_font"><textarea name="beizhu" cols="50" rows="3" class="inputclass inputtitle"></textarea></td>
  </tr>
  <tr>
    <td height="50" colspan="2" align="center" valign="middle">
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