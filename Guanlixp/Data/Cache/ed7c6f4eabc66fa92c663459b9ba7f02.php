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
        <table class="table set_table">

  <tr>
    <td width="12%" height="30" align="right" valign="middle"> 管理帐号：</td>
    <td width="88%" valign="middle" class="huise_font"><input name="adminname" type="text" id="adminname" size="50" class="inputclass inputtitle" value="<?php echo ($vo["adminname"]); ?>"/></td>
  </tr>

 
  <tr>
    <td height="30" align="right" valign="middle">管理密码：</td>
        <td valign="middle" class="huise_font"><input name="password" id="password" type="text" size="50" class="inputclass"> </td>
  </tr>
 
  
  <tr>
    <td height="30" align="right" valign="middle">帐户权限：</td>
    <td valign="middle" class="huise_font">
	<select name="cata" id="cata">
				<option value='0' <?php if($vo["cata"] == 0): ?>selected='selected'<?php endif; ?>>选择权限</option>
			  
                <?php if(is_array($categame)): $i = 0; $__LIST__ = $categame;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$categame): $mod = ($i % 2 );++$i;?><option value='<?php echo ($categame["id"]); ?>'  <?php if($categame["id"] == $vo['cata']): ?>selected='selected'<?php endif; ?>><?php echo ($categame["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

            </select>
	</td>
  </tr>

  <tr>
    <td height="30" align="right" valign="middle">添加日期：</td>
    <td valign="middle" class="huise_font"><input name="lastlogintime" type="text" id="lastlogintime" size="20" value="<?php echo date("Y-m-d H:i:s");?>"  class="inputclass"/></td>
  </tr>
  <tr>
  
    <td height="50" colspan="2" align="center" valign="middle">       <input name="adminid" type="hidden" id="adminid" value="<?php echo ($vo["adminid"]); ?>"/>
	<input name="adminpassword" type="hidden" id="adminpassword" value="<?php echo ($vo["adminpassword"]); ?>"/>
	<input type="submit" class="btn btn-primary btn-small" name="Submit" id="submit" value="确认提交"></td>
  </tr>
</table>
  </form>
  


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